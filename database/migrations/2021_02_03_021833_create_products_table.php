<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id')->comment('ID');

            $table->string('product_name')->comment('商品名');

            $table->string('product_category')->comment('カテゴリー');

            $table->string('product_start_hour')->comment('開始(時)');
            $table->string('product_start_minute')->comment('開始(分)');
            $table->string('product_end_hour')->comment('終了(時)');
            $table->string('product_end_minute')->comment('終了(分)');

            $table->text('product_detail',5000)->comment('詳細');

            $table->string('product_img')->comment('画像');

            $table->string('product_fee')->comment('料金');

            $table->string('product_shipping')->comment('送料');

            $table->string('product_quantity')->comment('個数');

            $table->string('product_point')->comment('注意点');
            $table->string('product_cancel')->comment('キャンセルポリシー');
            $table->string('product_status')->comment('ステータス');

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
        Schema::dropIfExists('products');
    }
}
