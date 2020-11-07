<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use function Couchbase\defaultDecoder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     */
    public function show(Product $product)
    {

        //--------//
        $img = file_get_contents($product->image_url);
        $enc_img = base64_encode($img);
        $imginfo = getimagesize('data:application/octet-stream;base64,' . $enc_img);
        $mime = $imginfo['mime'];
        //--------//

        return view('products.show', compact('product', 'mime', 'enc_img'));
    }

}
