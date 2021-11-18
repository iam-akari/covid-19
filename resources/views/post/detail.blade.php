@extends('layout')
@section('title','詳細')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
  <h2>{{ $user_posts->content }}</h2>
</div>

</div>
@endsection
