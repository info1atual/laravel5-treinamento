<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use CodeCommerce\ProductImage;
use CodeCommerce\Category;
use Util;
use Storage;
use File;

class ProductsController extends Controller
{

    private $product;
    private $tags;

    public function __construct(Product $product, Tag $tags)
    {
        $this->product = $product;
        $this->tags = $tags;
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
        $tags = $this->tags->lists('name');
        return view('products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ProductRequest $request)
    {
        // dd($request);
        $product = $this->product->create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>Util::toFloat($request->price),
            'featured'=>($request->has('featured')) ? true : false,
            'recommended'=>($request->has('recommended') || $request->recommended == 1) ? true : false,
            ]);
        
        if ($request->has('tags')) {
            $arrayTags = explode(',', $request->tags);
            foreach ($arrayTags as $tag) {
                $t = Tag::create(['name'=>$tag]);
                $product->tags()->attach($t->id);
            }
            
        }
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
        $tags = $this->tags->lists('name');
        $categories = $category->lists('name', 'id');
        return view('products.edit', compact('product', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {
        // dd($request);
        $product = $this->product->find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = Util::toFloat($request->price);
        $product->featured = ($request->has('featured') || $request->featured == 1) ? true : false;
        $product->recommended = ($request->has('recommended') || $request->recommended == 1) ? true : false;
        $product->save();

        if ($request->has('tags')) {
            $tags = $this->tagToArray($request->tags);
            $product->tags()->sync($tags);
        }
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
        $product = $this->product->orderby('id', 'desc')->find($id);
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
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
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

    private function tagToArray($tags)
    {

        $tags = explode(",", $tags);
        $tags = array_map('trim', $tags);

        $tagCollection = [];
        foreach ($tags as $tag) {
            $t = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagCollection, $t->id);
        }

        return $tagCollection;

    }

}
