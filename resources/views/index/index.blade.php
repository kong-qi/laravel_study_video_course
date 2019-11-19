@extends('layouts.bootstrap')
@section('content')
    <h3>本节课：{{ $title }}</h3>
    @include('index.item')

@endsection
@section('foot_js')

@endsection
