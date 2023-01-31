<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $categories = Category::query()
            ->orderBy('id', 'asc')
            ->get();

        return response()->json($categories);
    }

    public function indexMain()
    {
        $mainCategories = Category::query()
            ->where('parent_id', 'IS', null)
            ->get();

        return response()->json($mainCategories);
    }

    public function navigationTree($mainAmount = 3, $amount = 3, $subAmount = 6)
    {
        $mainCategories = Cache::get('navigationTree');
        if (!$mainCategories) {
            $mainCategories = Category::query()
                ->select(['id', 'name'])
                ->where('parent_id', '=', null)
                ->limit($mainAmount)
                ->get();

            foreach ($mainCategories as $mainIndex => $mainCategory) {
                $categories = Category::query()
                    ->select(['id', 'name'])
                    ->where('parent_id', '=', $mainCategory['id'])
                    ->limit($amount)
                    ->get()
                    ->toArray();

                foreach ($categories as $index => $category) {
                    $subCategories = Category::query()
                        ->select(['id', 'name'])
                        ->where('parent_id', '=', $category['id'])
                        ->limit($subAmount)
                        ->get()
                        ->toArray();

                    $categories[$index]['subcategories'] = $subCategories;
                }

                $mainCategories[$mainIndex]['categories'] = $categories;
            }

            Cache::put('navigationTree', $mainCategories, 86400); // 1 day
        }

        return response()->json($mainCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            Validator::validate($request->all(), Category::$rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => 'false',
                'errors' => [
                    $e->getMessage(),
                ],
            ], 400);
        }

        $category = Category::create($request->all());

        return response()->json([
            'success' => 'true',
            'category' => $category->attributesToArray(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        /** @var Category $category */
        $category = Category::findOrFail($id);
        $category->fill($request->all());

        try {
            Validator::validate($category->attributesToArray(), Category::$rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => 'false',
                'errors' => [
                    $e->getMessage(),
                ],
            ], 400);
        }

        $category->update($request->all());
        return response()->json([
            'success' => 'true',
            'category' => $category->attributesToArray(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
