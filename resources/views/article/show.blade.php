@extends('layouts.app')
@section('content')
    <div class="container">
        <p><a href="{{ route('index') }}" class="btn mb-3 btn-danger">返回</a></p>
        <h1 style="font-size: 20px">{{ $show->name }}</h1>

        <p style="font-size: 12px">作者：{{ $show->author }}，发表于{{ $show->created_at }},{{ $show->updated_at?'更新于'.$show->updated_at:'' }}</p>
        <p>标签:{{ implode(',',$show->tags()->pluck('name')->toArray() )}}</p>
        <hr>
        <div class="content" style="font-size: 14px">{!! $show->content !!}</div>

    </div>
    <div class="container mt-3" >
        <h4>发表评论</h4>
        @include('layouts.tips')
        <form action="{{ route('comment.store') }}" method="post">
            <input type="hidden" name="model_type" value="article">
            <input type="hidden" name="model_id" value="{{ $show->id }}">
            @csrf
            <textarea name="content" class="form-control" id="" cols="30" rows="5"></textarea>
            <div>
                <button type="submit" class="btn btn-secondary mt-2">发表评论</button>
            </div>
        </form>
    </div>
    <div class="container">
        @forelse ($list as $k=>$v)
            <dl class="mt-3 mb-3">
                <dt><a name="comment{{ $v->id }}">#{{ $k+1+1*(request()->input('page',1)-1) }}楼 </a><span class="float-right" style="color: #999;font-size: 12px">{{ $v->created_at }}</span>{{ $v->user['name'] }}：</dt>
                <dd>{{ $v->content }}</dd>
            </dl>
            <hr>
        @empty
            <p>没有找到数据</p>
        @endforelse

        <hr>
        <div class="page mt-3">{!! $pager !!}</div>
    </div>
@endsection
@section('foot_js')

@endsection
