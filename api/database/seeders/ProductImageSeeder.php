<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('product_image')->count() === 0) {
            $productImages = [
                [
                    'product_id' => 1,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 2,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 3,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 4,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 5,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 6,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 7,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 8,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 9,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 10,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 11,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 12,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 13,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 14,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
                [
                    'product_id' => 15,
                    'filename' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
                    'description' => 'asdasdasdasdasdasdasdasdsadasdasasasdasasdasdasdasdasdasdassdasd',
                    'active' => 1,
                    'position' => 1,
                    'is_main' => 1,
                ],
            ];

            foreach ($productImages as $productImage) {
                ProductImage::create($productImage);
            }
        } else {
            echo "Cannot seed - table is not empty.";
        }
    }
}
