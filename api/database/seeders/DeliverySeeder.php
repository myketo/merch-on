<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('delivery')->count() === 0) {
            $deliveries = [
                [
                    'name' => 'Standard',
                    'description' => '4-10 business days',
                    'price' => 5.00,
                ],
                [
                    'name' => 'Express',
                    'description' => '2-5 business days',
                    'price' => 16.00,
                ],
            ];

            foreach ($deliveries as $delivery) {
                Delivery::create($delivery);
            }
        } else {
            echo "Cannot seed - table is not empty.";
        }
    }
}
