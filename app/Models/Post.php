<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class Post extends Model
{
    use Notifiable;
    use SoftDeletes;

     protected $dates = ['deleted_at'];
    // 主キーをオーバーライド
    protected $primaryKey = 'post_id';
    // IDが自動増分されない場合

     protected $fillable = [
        'post_name',
        'post_type',
        'post_day',

        'post_category',
        'post_img',
        'post_status',
        'post_fee',
        'post_point',
        'post_cancel',
    ];
}
