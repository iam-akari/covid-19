<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_posts;
use App\Http\Requests\PostRequest;

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

    /** 登録画面を表示する
    *  @return view
    */
    public function showCrete() {
      return view('post.form');
    }

    /** サイトを投稿する
    *  @return view
    */
    public function exeStore(PostRequest $request) {
      //ブログのデータを受け取る
      $inputs = $request->all();
      \DB::beginTransaction();

      try {
        //ブログを登録
        User_posts::create($inputs);
        \DB::commit();
      } catch(\Throwable $e) {
          \DB::rollback();
          abort(500);
      }
      \Session::flash('err_msg','ブログを登録しました。');
      return redirect(route('Uposts'));
    }

}
