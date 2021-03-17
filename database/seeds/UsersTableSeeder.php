<?php


use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // 全部消す 　
        User::truncate();

       factory(User::class, 500)->create();
    }
}
