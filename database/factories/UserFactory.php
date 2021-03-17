<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'user_nickname' => $faker->unique()->lexify($string = '????'),
        'user_familyname' => $faker->lastName,
        'user_firstname' => $faker->firstName(),
        'user_kana_familyname' => $faker->lastKanaName,
        'user_kana_firstname' => $faker->firstKanaName,
        'user_mail' => $faker->unique()->safeEmail,
        'user_pass' => Hash::make('password'),
        'user_sex' => $faker->randomElement(['男性', '女性']),
        'user_tel' => $faker->numberBetween($min = 10000000000, $max = 99999999999),
        'user_address' => $faker->prefecture,
        'user_birthday_year' => $faker->year,
        'user_birthday_month' => $faker->month,
        'user_birthday_day' => $faker->dayOfMonth($max = 'now'),
        'user_newsletter' => $faker->randomElement(['yes', 'no']),
        'user_comment' => $faker->realText(100),
    ];
});
