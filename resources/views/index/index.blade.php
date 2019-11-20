@extends('layouts.app')
@section('content')

<div class="container">

    <div class="jumbotron">
        <h1 class="display-4">欢迎来到我的博客</h1>
        <p class="lead">这里专注学习视频教程</p>


    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6 col-sm-6">
            <ul class="list-group">
                <li class="list-group-item active">博客文章</li>
                @forelse ($list as $v)
                    <li class="list-group-item"><span class="float-right">{{ $v->created_at }}</span><a href="{{ route('article.show',['article'=>$v->id]) }}">{{ $v->name }}</a></li>

                @empty
                    <p>没有找到数据</p>
                @endforelse

            </ul>
        </div>
        <div class="col-6 col-sm-6">
            <ul class="list-group">
                <li class="list-group-item active">最近评论</li>
                @forelse ($comment as $v)
                    <li class="list-group-item" data-toggle="tooltip" title="来至->{{ $v->from['name']??'' }}">
                        <span class="float-right">{{ $v->created_at }}</span>
                        <a href="{{ route('article.show',['article'=>$v->model_id]) }}#comment{{ $v->id }}">{{ $v->content }}</a>
                    </li>

                @empty
                    <p>没有找到数据</p>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
@section('foot_js')

@endsection
