<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('payment')->count() === 0) {
            $payments = [
                [
                    'name' => 'Blik',
                ],
                [
                    'name' => 'PayPal',
                ],
                [
                    'name' => 'Cash on Delivery (COD)',
                ],
            ];

            foreach ($payments as $payment) {
                Payment::create($payment);
            }
        } else {
            echo "Cannot seed - table is not empty.";
        }
    }
}
