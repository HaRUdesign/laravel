<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id')->comment('ID');
            $table->string('post_name',24)->comment('名前');
            $table->string('post_type')->comment('定例・ワンポイント');
            $table->string('post_day')->comment('イベント日');

            $table->string('post_category')->comment('カテゴリー');
            $table->string('post_img')->comment('画像');
            $table->string('post_status')->comment('ステータス');
            $table->string('post_fee')->comment('料金');
            $table->string('post_point')->comment('注意点');
            $table->string('post_cancel')->comment('キャンセルポリシー');

            $table->softDeletes()->comment('削除日時 : 削除・退会を行った日時この値がnullでなかったら、削除を行ったとみなす');
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
        Schema::dropIfExists('posts');
    }
}
