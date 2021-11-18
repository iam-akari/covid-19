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

    /** 投稿詳細を表示する
    *  @param int $id
    *  @return view
    */
    public function showDetail($id)
    {
        $user_posts = User_posts::find($id);

        if (is_null($user_posts)) {
          \Session::flash('err_msg','データがありません。');
          return redirect(route('Uposts'));
        }

        return view('post.detail',
        ['user_posts'=>$user_posts]);
    }

}
