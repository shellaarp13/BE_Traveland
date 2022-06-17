<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Admins;
use App\Models\Destinasis;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\TourGuides;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        //Seeding User 
        echo "Seeding User\n";
        $userTemporary = [];
        for ($i = 0; $i < 10; $i += 1) {
            $user = User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->password())
            ]);
            array_push($userTemporary, $user);
        }

        //Admin 
        echo "Seeding Admin\n";
        $adminTemporary = [];
        for ($i=0; $i < 3; $i += 1){
            $admin = Admins::create([
                'email' => $faker->email(),
                'name' => $faker->name(),
                'password' => Hash::make($faker->password())
            ]);
            array_push($adminTemporary, $admin);
        }

        //Destinasi
        echo "Seeding Destinasi\n";
        $destinasiTemporary = [];
        for ($i = 0; $i < 10; $i += 1){
            $destinasi = Destinasis::create([
                'name' => $faker->name(),
                'location' => $faker->sentence(10),
                'open' => $faker->date(),
                'describe' => $faker->paragraph(10)
            ]);
            array_push($destinasiTemporary, $destinasi);
        }

        //Order
        echo "Seeding Order\n";
        $orderTemporary = [];
        for ($i = 0; $i < 10; $i += 1){
            $order = Orders::create([
                'date'  => $faker->date(),
                'total' => $faker->randomFloat(5),
                //'user_id' => $userTemporary[array_rand($userTemporary)]->id,
               // 'destinasi_id' => $destinasiTemporary[array_rand($destinasiTemporary)]->id,
                'tour_guide' => $faker->name()
            ]);
        array_push($orderTemporary, $order);
        }

         //Order Details 
         echo "Seeding Order Detail\n";
         $orderdetailTemporary = [];
         for ($i = 0; $i < 10; $i += 1){
             $orderdetail = OrderDetails::create([
                 'quantity' => $faker->randomFloat(5),
                 'payment_method' => $faker->sentence(2),
                 //'order_id' => $orderTemporary[array_rand($orderTemporary)]->id
             ]);
         array_push($orderdetailTemporary, $orderdetail);
         }
         
        //Tour Guide
        echo "Seeding TourGuide\n";
        $tourguideTemporary = [];
        for ($i = 0; $i < 10; $i += 1){
            $tourguide = TourGuides::create([
                'username' => $faker->userName(),
                'password' => Hash::make($faker->password()),
                'name' => $faker->name(),
                'fee' => $faker->randomFloat(50, 100),
                'profile' => $faker-> sentence(),
                'available' => $faker -> boolean(),
                //'destinasi_id' => $destinasiTemporary[array_rand($destinasiTemporary)]->id
            ]);
        array_push($tourguideTemporary, $tourguide);
        }
    }
}