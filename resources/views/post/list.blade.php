<!-- 投稿記事を表示するためのファイル -->
@extends('layout')
@section('title','副反応投稿一覧')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
  <h2>投稿一覧</h2>
  <table class="table table-striped">
      <tr>
          <th>記事番号</th>
          <th>日付</th>
          <th>内容</th>

      </tr>
      <tr>
      @foreach($user_posts as $user_post)
          <td>{{ $user_post->id }}</td>
          <td>{{ $user_post->created_at }}</td>
          <td>{{ $user_post->content }}</td>

          <td></td>
      </tr>
      @endforeach
  </table>
</div>
</div>
@endsection
