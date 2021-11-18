<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_posts;

class UpostController extends Controller
{
    /** 投稿一覧を表示する
    *  @return view
    */
    public function showList()
    {
        $user_posts = User_posts::all();
        return view('post.list',
        ['user_posts'=>$user_posts]);
    }
}
