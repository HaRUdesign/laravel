<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post_name' => $faker->realText(20),
        'post_type' =>$faker->randomElement($array = ['定例', 'ワンポイント']),
        'post_day' =>$faker->randomElement($array = ['いつでもOK','毎週水曜日夜間', '隔週土曜日', '隔週日曜日']),

         'post_category' =>$faker->randomElement($array = ['ART&ILLUST', 'DESIGN']),

        'post_img' => ('/storage/post_img/10_20210201102603.jpg'),

        'post_status' =>$faker->randomElement($array = ['開催中', 'リクエスト','終了']),

        'post_fee'=>$faker->numberBetween(1,9999999),
        'post_point'=>$faker->realText(255),
        'post_cancel'=>$faker->realText(255),

        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get())
    ];
});
