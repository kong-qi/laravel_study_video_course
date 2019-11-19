@extends('layouts.bootstrap')
@section('content')
    <div class="container">
        <h3>添加</h3>

        <div class="btn-group mb-3">
            <a href="{{ route('article.index') }}" class="btn btn-info">返回</a>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('article.store') }}" method="post">

            @csrf

            <table class="table table-bordered">
            <tr>

                <td>标题</td>
                <td><input type="text" name="name" class="form-control" placeholder="请输入标题"/></td>

            </tr>
            <tr>

                <td>作者</td>
                <td>
                    <select name="author" id="" class="form-control">
                        <option value="小明">小明</option>
                        <option value="小八">小八</option>
                        <option value="猪骨">猪骨</option>
                    </select>
                </td>

            </tr>
            <tr>

                <td>内容</td>
                <td><textarea name="content" placeholder="请输入正文" id="" cols="30" rows="10" class="form-control"></textarea></td>

            </tr>
            <tr>
                <td colspan="2"><button type="submit" class="btn btn-primary">提交</button></td>
            </tr>

        </table>
        </form>
    </div>
@endsection
@section('foot_js')

@endsection
