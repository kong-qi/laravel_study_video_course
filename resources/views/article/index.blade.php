@extends('layouts.bootstrap')
@section('content')
    <div class="container">
        <h3>列表</h3>

        <div class="btn-group mt-3 mb-3">
            <a href="{{ route('article.create') }}" class="btn btn-info">添加</a>

        </div>
        @if(session()->get('status'))

            <div class="alert {{ session()->get('status.code')==200?'alert-success':'alert-warning' }}">
                {{ session()->get('status.msg') }}
            </div>


        @endif


        <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>标题</td>
                <td>作者</td>
                <td>查看</td>
                <td>操作</td>
            </tr>
            @forelse ($data as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->author }}</td>
                    <td><a href="{{ route('article.show',['article'=>$v->id]) }}">查看内容</a></td>
                    <td>
                        <a href="{{ route('article.edit',['article'=>$v->id]) }}" class="btn btn-secondary">编辑</a>
                        <form action="{{ route('article.destroy',['article'=>$v->id]) }}" style="display: inline" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="删除"  class="js-del btn btn-danger">
                        </form>
                    </td>
                </tr>
            @empty
                <p>没有找到数据</p>
            @endforelse
        </table>
        <div class="mt-3">{!! $pager !!} </div>
    </div>
@endsection
@section('foot_js')
    <script>
        $(".js-del").click(function(){
            if(window.confirm('确定删除吗?')){
                return true;
            }else
            {
                return false;
            }
        });
    </script>
@endsection
