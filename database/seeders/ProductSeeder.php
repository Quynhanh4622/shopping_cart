<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'id'=> 1,
                'name' => 'ao blayzer',
                'price' => 3000,
                'Thumbnail' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1NSEqtPkUfjokYcgIS8nIdGiLLcy9iG12SQ&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 2,
                'name' => 'ao chong nang',
                'price' => 5200,
                'Thumbnail' => 'https://product.hstatic.net/1000311467/product/az8-7_73521700589745f0a0bc882503d1feb9_master.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 3,
                'name' => 'quan ong rog',
                'price' => 2000,
                'Thumbnail' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1NSEqtPkUfjokYcgIS8nIdGiLLcy9iG12SQ&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 4,
                'name' => 'quan sooc',
                'price' => 2500,
                'Thumbnail' => 'data:image/jpeg;base64,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',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 5,
                'name' => 'ao khoac',
                'price' => 2000,
                'Thumbnail' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1NSEqtPkUfjokYcgIS8nIdGiLLcy9iG12SQ&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 6,
                'name' => 'ao so mi',
                'price' => 3500,
                'Thumbnail' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzFcudH62UyAU-zk7duEHYc8eCOtJNdMFxXQ&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id'=> 7,
                'name' => 'ao form',
                'price' => 5400,
                'Thumbnail' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1NSEqtPkUfjokYcgIS8nIdGiLLcy9iG12SQ&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 8,
                'name' => 'ao da',
                'price' => 5000,
                'Thumbnail' => 'https://product.hstatic.net/1000247297/product/1000-1_bf98f041b2d04ae2add99849f11fc341_master.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 9,
                'name' => 'ao blayzer',
                'price' => 4000,
                'Thumbnail' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1NSEqtPkUfjokYcgIS8nIdGiLLcy9iG12SQ&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 10,
                'name' => 'ao ba lo',
                'price' => 3500,
                'Thumbnail' => 'data:image/jpeg;base64,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',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
