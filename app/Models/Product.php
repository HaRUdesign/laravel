<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class Product extends Model
{
    use Notifiable;
    use SoftDeletes;

     protected $dates = ['deleted_at'];
    // 主キーをオーバーライド
    protected $primaryKey = 'product_id';
    // IDが自動増分されない場合

     protected $fillable = [
        'product_name',
        'product_category',

        'product_start_hour',
        'product_start_minute',
        'product_end_hour',
        'product_end_minute',

        'product_detail',

        'product_img',

        'product_fee',

        'product_shipping',

        'product_quantity',

        'product_point',
        'product_cancel',
        'product_status',


    ];
}
