<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $categories = Category::getAllChildrenIds($categoryId);

        $query = DB::table('product')
            ->select([
                'product.id',
                'product.name',
                'product.price',
                'product_image.filename AS main_image_filename',
                'product_image.description AS main_image_alt'
            ])
            ->join('product_category', 'product.id', 'product_category.product_id')
            ->leftJoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->whereIn('product_category.category_id', $categories)
            ->where('product.active', true)
            ->where('product_image.active', true)
            ->where('product_image.is_main', true)
            ->orderBy('product.id', 'desc')
            ->orderBy('product_image.position')
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
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showForApp(Request $request, int $id)
    {
        $product = Product::where('id', '=', $id)
            ->where('active', '=', true)
            ->firstOrFail();

        $productImages = $product
            ->images()
            ->select(['filename as src', 'description as alt', 'is_main'])
            ->where('active', true)
            ->orderBy('is_main', 'desc')
            ->orderBy('position', 'desc')
            ->limit(3)
            ->get()
            ->toArray();

        $productSkus = $product
            ->skus()
            ->select(['name', 'sku', 'amount', 'active'])
            ->get()
            ->toArray();

        $product = $product->toArray();
        $product['images'] = $productImages;
        $product['skus'] = $productSkus;

        if ($categoryId = $request->input('category_id')) {
            $product['breadcrumbs'] = Category::breadcrumbs($categoryId);
        }

        return response()->json($product);
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
