<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('product_category')->count() === 0) {
            $productCategories = [
                [
                    'product_id' => 1,
                    'category_id' => 3,
                ],
                [
                    'product_id' => 2,
                    'category_id' => 9,
                ],
                [
                    'product_id' => 3,
                    'category_id' => 8,
                ],
                [
                    'product_id' => 4,
                    'category_id' => 3,
                ],
                [
                    'product_id' => 5,
                    'category_id' => 4,
                ],
                [
                    'product_id' => 6,
                    'category_id' => 9,
                ],
                [
                    'product_id' => 7,
                    'category_id' => 7,
                ],
                [
                    'product_id' => 8,
                    'category_id' => 7,
                ],
                [
                    'product_id' => 9,
                    'category_id' => 3,
                ],
                [
                    'product_id' => 10,
                    'category_id' => 3,
                ],
                [
                    'product_id' => 11,
                    'category_id' => 3,
                ],
                [
                    'product_id' => 12,
                    'category_id' => 3,
                ],
                [
                    'product_id' => 13,
                    'category_id' => 3,
                ],
                [
                    'product_id' => 14,
                    'category_id' => 3,
                ],
                [
                    'product_id' => 15,
                    'category_id' => 3,
                ],
            ];

            foreach ($productCategories as $productCategory) {
                ProductCategory::insert($productCategory);
            }
        } else {
            echo "Cannot seed - table is not empty.";
        }
    }
}
