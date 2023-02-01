<?php

namespace Database\Seeders;

use App\Models\ProductSku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productId = 1;
        $amount = 12;

        if (DB::table('product_sku')->count() === 0) {
            $productSkus = [];

            for ($i = 0; $i < $amount; $i++) {
                $productSkus[] = [
                    'product_id' => $productId,
                    'name' => ProductSku::SIZE_NAMES[rand(0, count(ProductSku::SIZE_NAMES) - 1)],
                    'sku' => strtoupper(Str::random(6)),
                    'amount' => rand(0, 30),
                    'active' => rand(1, 100) >= 50,
                ];
            }

            foreach ($productSkus as $productSku) {
                ProductSku::create($productSku);
            }
        } else {
            echo "Cannot seed - table is not empty.";
        }
    }
}
