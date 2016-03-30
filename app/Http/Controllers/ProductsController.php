<?php

namespace Treinamento\Http\Controllers;

use Illuminate\Http\Request;

use Treinamento\Http\Requests;
use Treinamento\Http\Controllers\Controller;
use Treinamento\Product;
use Util;

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
        $products = $this->product->orderby('id', 'desc')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
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
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>Util::toFloat($request->price),
            'featured'=>($request->has('featured')) ? true : false,
            'recommend'=>($request->has('recommend')) ? true : false,
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
    public function edit($id)
    {
        $product = $this->product->find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {

        // dd( $request->recommend );
        $product = $this->product->find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = Util::toFloat($request->price);
        $product->featured = ($request->has('featured') || $request->featured == 1) ? true : false;
        $product->recommend = ($request->has('recommend') || $request->recommend == 1) ? true : false;
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

}
