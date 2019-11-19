@extends('errors::minimal')

@section('title', __($exception->getMessage()))
@section('code', '401')
@section('message', __($exception->getMessage()))
