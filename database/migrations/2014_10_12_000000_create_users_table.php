<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('user_mail')->comment('メール');
            $table->string('user_pass')->comment('パスワード');
            $table->string('user_familyname')->comment('姓');
            $table->string('user_firstname')->comment('名');
            $table->string('user_kana_familyname')->comment('姓(カナ)');
            $table->string('user_kana_firstname')->comment('名(カナ)');
            $table->string('user_nickname')->unique()->nullable()->comment('ニックネーム');
            $table->string('user_sex')->comment('性別');
            $table->string('user_tel')->comment('電話番号');
            $table->string('user_address')->comment('住所');
            $table->string('user_birthday_year')->comment('生年月日(年)');
            $table->string('user_birthday_month')->comment('生年月日(月)');
            $table->string('user_birthday_day')->comment('生年月日(日)');
            $table->string('user_newsletter')->comment('ニュースレターチェック');
            $table->longText('user_comment')->nullable()->comment('コメント');
            $table->string('user_icon')->nullable()->comment('アイコン');
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
        Schema::dropIfExists('users');
    }
}
