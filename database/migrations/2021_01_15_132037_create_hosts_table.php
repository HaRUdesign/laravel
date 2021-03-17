<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('host_name')->comment('名前');
            $table->string('host_mail')->unique()->comment('メール');
            $table->string('host_pass')->comment('パスワード');
            $table->timestamp('email_verified_at')->nullable();
            $table->dateTime('last_login_at')->nullable()->comment('ログイン日時');
            $table->softDeletes()->comment('削除日時 : 削除・退会を行った日時この値がnullでなかったら、削除・退会を行ったとみなす');
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hosts');
    }
}
