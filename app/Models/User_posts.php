<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_posts extends Model
{
    //テーブル名
    protected $table = 'user_posts';

    //可変項目
    protected $fillable =
    [
      'content'
    ];
}
