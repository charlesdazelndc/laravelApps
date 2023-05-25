<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        
        $data['products'] = Product::with('product_variansts','product_varianst_prices')->get();
        dd($data);

//      $data = Product::select('products.title as product_name,products.description as desc,
//      variants.title as varian','t1.price as v1price','t2.price as v2price','t3.price as v3price','t1.stock as v1stock','t2.stock as v2stock','t3.stock as v3stock')
//     ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
//     ->join('variants', 'product_variants.variant_id', '=', 'variants.id')
//     ->leftjoin('product_variant_prices as t1', 't1.product_variant_one', '=', 'product_variants.id')
//     ->leftjoin('product_variant_prices as t2', 't2.product_variant_two', '=', 'product_variants.id')
//     ->leftjoin('product_variant_prices as t3', 't3.product_variant_three','=', 'product_variants.id')
//     ->get();

// //  print_r($data);
// // Access the data
// foreach ($data as $item) {
//     $productName = $item->product_name;
//     $productDesc = $item->desc;
//     $variantName = $item->varian;
//     $price_v1 = $item->v1price;
//     $price_v2 = $item->v2price;
//     $price_v3 = $item->v3price;

//     $stock_v1 = $item->v1stock;
//     $stock_v2 = $item->v2stock;
//     $stock_v3 = $item->v3stock;

//     // Use the data as needed
//     echo "Product: $productName ($productDesc), Variant: $variantName, Price: $price_v1".'<br>';
//     // exit;
// }
       return view('products.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants = Variant::all();
        return view('products.edit', compact('variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
