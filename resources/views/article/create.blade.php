@extends('layouts.app')
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

                    <td>tags标签，','分割，一个分割一个</td>
                    <td><textarea name="tags" placeholder="请输入tags" id="" cols="30" rows="5"
                                  class="form-control"></textarea></td>

                </tr>

                <tr>

                    <td>内容</td>
                    <td><textarea name="content" placeholder="请输入正文" id="" cols="30" rows="10"
                                  class="form-control"></textarea></td>

                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </td>
                </tr>

            </table>
        </form>
    </div>
@endsection
@section('foot_js')

@endsection
