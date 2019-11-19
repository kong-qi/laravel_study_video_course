@extends('layouts.bootstrap')
@section('content')
    <h3>表单验证</h3>
    <div class="alert alert-danger">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{ route('post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">姓名</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="">密码</label>
            <input type="text" name="pwd" value="{{ old('pwd') }}" class="form-control">
            @error('pwd')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" > 提交</button>
        </div>
    </form>

@endsection
@section('foot_js')

@endsection
