<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('category')->count() === 0) {
            $categories = [
                [
                    'name' => 'Woman',
                    'parent_id' => null,
                ],
                [
                    'name' => 'Men',
                    'parent_id' => null,
                ],
                [
                    'name' => 'Bands',
                    'parent_id' => null,
                ],
                [
                    'name' => 'Clothing',
                    'parent_id' => 1,
                ],
                [
                    'name' => 'Clothing',
                    'parent_id' => 2,
                ],
                [
                    'name' => 'Dresses',
                    'parent_id' => 4,
                ],
                [
                    'name' => 'Shoes',
                    'parent_id' => 2,
                ],
                [
                    'name' => 'Jackets',
                    'parent_id' => 4,
                ],
                [
                    'name' => 'T-shirts',
                    'parent_id' => 5,
                ],
                [
                    'name' => 'Architects',
                    'parent_id' => 3,
                ],
            ];

            foreach ($categories as $category) {
                Category::create($category);
            }
        } else {
            echo "Cannot seed - table is not empty.";
        }
    }
}
