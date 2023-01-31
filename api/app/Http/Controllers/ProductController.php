<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexByCategory(Request $request, int $categoryId)
    {
//        Example cache time: 14400 (4h)

        $limit = $request->input('limit') ?? 30;

        $query = Category::findOrFail($categoryId)
            ->products()
            ->select([
                'product.name',
                'product.price',
                'product_image.filename AS main_image_filename',
                'product_image.description AS main_image_alt'
            ])
            ->leftJoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->where('product.active', true)
            ->where('product_image.active', true)
            ->where('product_image.is_main', true)
            ->orderBy('product.id', 'desc')
            ->orderBy('product_image.position', 'asc')
            ->orderBy('product_image.id', 'desc');

        $totalAmount = $query->count();
        $result = $query->simplePaginate($limit)->toArray();
        $result['total'] = $totalAmount;
        $result['total_pages'] = ceil($totalAmount / $result['per_page']);

        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
