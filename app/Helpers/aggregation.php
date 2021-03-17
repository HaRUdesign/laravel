<?php

namespace App\Helpers;

class Aggregation
{
    // 生年月日から年齢を出す
  public static function convertAge($data)
  {
    $now = date("Ymd");
    $birthday = ($data);
    echo floor(($now-$birthday)/10000);
  }
}
