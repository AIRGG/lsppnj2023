@extends('lsp.layout.main-layout')
@section('custom-css')
@endsection
@section('title', 'Dashboard')

@section('content')
    Dashboard User:
    {{ auth()->guard('user')->user()->nama_user }}
@endsection

@section('custom-js')
@endsection
