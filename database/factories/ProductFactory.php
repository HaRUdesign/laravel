<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->realText(20),

        'product_category' =>$faker->randomElement($array = ['雑貨', 'ファッション','食品']),

        'product_start_hour' =>$faker->numberBetween(0,12),
        'product_start_minute' =>$faker->numberBetween(00,59),
        'product_end_hour' =>$faker->numberBetween(0,12),
        'product_end_minute' =>$faker->numberBetween(00,59),

        'product_detail' => $faker->realText(3000),

        'product_img' => ('/storage/post_img/10_20210201102603.jpg'),

        'product_fee'=>$faker->numberBetween(1,9999999),

        'product_shipping'=>$faker->numberBetween(0,1000),

        'product_quantity'=>$faker->numberBetween(1,100),

        'product_point'=>$faker->realText(255),
        'product_cancel'=>$faker->realText(255),
        'product_status' =>$faker->randomElement($array = ['販売中', 'リクエスト','終了']),

        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get())
    ];
});
