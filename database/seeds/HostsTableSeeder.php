<?php

use Illuminate\Database\Seeder;
use App\Models\Host;
use Illuminate\Support\Facades\Hash;

class HostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DatabaseSeeder.phpを使用せず単体で実行する場合必要
        // Eloquent::unguard();

        // 全部消す 　
        Host::truncate();

        // 開発用のユーザー追加
        Host::create([
            'host_name' => 'haru',
            'host_mail' => 'haru@2haus.jp',
            'host_pass' => Hash::make('pass'),

        ]);
    }
}
