<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class Host extends Authenticatable
{
    use Notifiable, Billable;
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    // 主キーをオーバーライド
    // protected $primaryKey = 'host_id';

     protected $fillable = [

        'host_name',
        'host_mail',
        'host_pass',
    ];

  protected $hidden = [
      'host_pass', 'remember_token',
  ];

  protected $casts = [
      'email_verified_at' => 'datetime',
  ];







}
