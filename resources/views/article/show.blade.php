@extends('layouts.bootstrap')
@section('content')
    <div class="container">
        <p><a href="{{ route('article.index') }}" class="btn mb-3 btn-danger">返回</a></p>
        <h1>{{ $show->name }}</h1>

        <p style="font-size: 12px">{{ $show->author }}</p>
        <div class="content">{!! $show->content !!}</div>



    </div>
@endsection
@section('foot_js')

@endsection
