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
      //投稿データを受け取る
      $inputs = $request->all();
      \DB::beginTransaction();

      try {
        //投稿する
        User_posts::create($inputs);
        \DB::commit();
      } catch(\Throwable $e) {
          \DB::rollback();
          abort(500);
      }
      \Session::flash('err_msg','投稿しました。');
      return redirect(route('Uposts'));
    }

    /** 編集フォームを表示する
    *  @param int $id
    *  @return view
    */
    public function showEdit($id)
    {
        $user_posts = User_posts::find($id);

        if (is_null($user_posts)) {
          \Session::flash('err_msg','データがありません。');
          return redirect(route('Uposts'));
        }

        return view('post.edit',
        ['user_posts'=>$user_posts]);
    }

    /** サイトを更新する
    *  @return view
    */
    public function exeUpdate(PostRequest $request) {
      //更新データを受け取る
      $inputs = $request->all();
      \DB::beginTransaction();

      try {
        //更新する
        $user_posts = User_posts::find($inputs['id']);
        $user_posts->fill([
          'content' => $inputs['content'],
        ]);
        $user_posts->save();
        \DB::commit();
      } catch(\Throwable $e) {
          \DB::rollback();
          abort(500);
      }
      \Session::flash('err_msg','更新しました。');
      return redirect(route('Uposts'));
    }

    /** ブログ削除
    *  @param int $id
    *  @return view
    */
    public function exeDelete($id)
    {

      if (empty($id)) {
        \Session::flash('err_msg','データがありません。');
        return redirect(route('Uposts'));
      }

      try {
        //削除する
        User_posts::destroy($id);
      } catch(\Throwable $e) {
          abort(500);
      }

      \Session::flash('err_msg','削除しました。');
      return redirect(route('Uposts'));
    }

}
