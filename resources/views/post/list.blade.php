<!-- 投稿記事を表示するためのファイル -->
@extends('layout')
@section('title','副反応投稿一覧')
@section('content')
<div class="row">
<div class="col-md-12 col-md-offset-2">
  <h2>投稿一覧</h2>
  @if (session('err_msg'))
    <p class="text-danger">{{ session('err_msg') }}</p>
  @endif
  <table class="table table-striped">
      <tr>
          <th>記事番号</th>
          <th>日付</th>
          <th>内容</th>
          <th></th>
          <th></th>
          <th></th>

      </tr>
      <tr>
      @foreach($user_posts as $user_post)
          <td>{{ $user_post->id }}</td>
          <td>{{ $user_post->created_at }}</td>
          <td>{{ $user_post->content }}</td>
          <td><button type="button" class="btn btn-primary" onclick="location.href='/user_post/{{ $user_post->id }}'">詳細</button></td>
          <td><button type="button" class="btn btn-primary" onclick="location.href='/user_post/edit/{{ $user_post->id }}'">編集</button></td>
          <form method="POST" action="{{ route('delete',$user_post->id) }}" onSubmit="return checkDelete()">
          @csrf
          <td><button type="submit" class="btn btn-primary" onclick="">削除</button></td>
         </form>
      </tr>
      @endforeach
  </table>
</div>
</div>
<script>
function checkDelete(){
if(window.confirm('削除してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
