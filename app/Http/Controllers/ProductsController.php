<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Category;
use Util;
use Storage;
use File;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

class ProductsController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->product->with('category')->orderby('id', 'desc')
            ->paginate(15);
        // dd($products);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ProductRequest $request)
    {
        // dd($request->recommended);
        $product = $this->product->create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>Util::toFloat($request->price),
            'featured'=>($request->has('featured')) ? true : false,
            'recommended'=>($request->has('recommended') || $request->recommended == 1) ? true : false,
            ]);
        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Category $category)
    {
        $product = $this->product->find($id);
        $categories = $category->lists('name', 'id');
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {

        $product = $this->product->find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = Util::toFloat($request->price);
        $product->featured = ($request->has('featured') || $request->featured == 1) ? true : false;
        $product->recommended = ($request->has('recommended') || $request->recommended == 1) ? true : false;
        $product->save();
        return redirect()->route('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();
        return redirect()->route('products');
    }

    public function images($id)
    {
        $product = $this->product->find($id);
        // dd($product);
        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->product->find($id);
        return view('products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create([
            'product_id'=>$id,
            'extension'=>$extension
            ]);
        // Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        $diretorio = 'treinamento/img/products';
        Storage::disk('s3')->put($diretorio.DIRECTORY_SEPARATOR.$image->id.'.'.$extension, File::get($file));
        // $s3 = \Storage::disk('s3');
        // $filePath = $diretorio . DIRECTORY_SEPARATOR . $image->id.'.'.$extension;
        // $s3->put($filePath, file_get_contents($file), 'public');

        return redirect()->route('products.images', ['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        if (File::exists(public_path().'/uploads'.'/'.$image->id.'.'.$image->extension)) {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
            $product = $image->product;
        }
        $image->delete();            
        return redirect()->route('products.images', ['id'=>$image->product->id]);
    }
}
