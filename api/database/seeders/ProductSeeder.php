<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('product')->count() === 0) {
            $loremIpsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt lacus non luctus ornare. Nullam gravida quis eros quis aliquet. In non ipsum at nibh tempor aliquam. Phasellus molestie tristique odio, vel volutpat tellus tristique eget. Nam ornare viverra ex ultricies commodo. Aliquam eu sem vitae tortor placerat efficitur eu commodo elit. Nulla non ex quis elit facilisis accumsan sit amet iaculis mi. Maecenas elementum, nisl eget auctor vehicula, quam arcu consectetur augue, vitae consequat mauris ex volutpat nunc. Suspendisse id arcu tortor. Donec ac convallis felis. Praesent convallis sagittis libero.

Duis consequat convallis tincidunt. Nulla id ex nec augue vulputate venenatis at et quam. Proin pharetra lorem id viverra tempus. Praesent sed lorem sed magna cursus posuere ut in orci. Sed tristique blandit nibh, et vulputate ligula hendrerit sit amet. Vestibulum ac tellus suscipit augue tempor iaculis. Aenean eu tempus leo. Fusce accumsan enim luctus, fermentum leo non, scelerisque ligula.

Nunc odio leo, varius id massa non, congue tincidunt quam. Pellentesque ac placerat elit. Sed mi arcu, molestie condimentum risus eget, tristique rutrum quam. Fusce ac est aliquam libero efficitur sagittis id ut arcu. Nullam tristique eget orci ac consectetur. Vivamus enim leo, venenatis pellentesque est vel, lacinia euismod diam. Quisque vulputate posuere tortor, non tempus urna sagittis ac. Proin mollis porta neque eu aliquet. Fusce sed mi consequat, imperdiet lectus a, pretium odio. Pellentesque ex nunc, malesuada sit amet lacinia id, feugiat nec ante. Ut ultricies mi posuere sapien cursus auctor. Aliquam dignissim ultricies elit. Integer id nunc vitae ante gravida feugiat ac vestibulum arcu. In euismod eros quis vehicula ullamcorper.';

            $products = [
                [
                    'name' => 'Metallica - Master Of Puppets - Jacket',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 79.99,
                    'discount' => 0,
                ],
                [
                    'name' => 'Classic white T-Shirt',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 20.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'Casual Jacket',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 99.99,
                    'discount' => 0,
                ],
                [
                    'name' => 'Sleep Token - Whale - T-Shirt',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 50.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'Bluzka damska KILLSTAR - QUARTZ NIGHT',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 70.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'koszulka QUEEN - BOHEMIAN RHAPSODY SUNSET',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 80.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'Trampki VANS - 106 HI RED TRUE WHITE',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 20.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'Glany STEEL - YELLOW/RED/BLACK (10 dziurek)',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 129.99,
                    'discount' => 0,
                ],
                [
                    'name' => 'Wisiorek FIVE FINGER DEATH PUNCH - 5FDP KNUCKLE DUSTER',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 50.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'RISE AGAINST: WOLVES (CD)',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 10.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'OZZY OSBOURNE: PATIENT NUMBER 9 (2LP VINYL)',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 59.99,
                    'discount' => 0,
                ],
                [
                    'name' => 'Naszywka ALICE IN CHAINS - LOGO',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 5.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'Architects - Gold Symbol - T-Shirt',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 15.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'Architects - Fading Repeater Natural - Longsleeve',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 30.00,
                    'discount' => 0,
                ],
                [
                    'name' => 'Naszywka termiczna GUNS N\' ROSES - LOGO',
                    'description' => $loremIpsum,
                    'active' => 1,
                    'price' => 5.00,
                    'discount' => 0,
                ],
            ];

            foreach ($products as $product) {
                Product::create($product);
            }
        } else {
            echo "Cannot seed - table is not empty.";
        }
    }
}
