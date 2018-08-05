@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
@stop

@section('css')
<link href="{{ asset('source/css/main.css') }}" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{ asset('source/image/favicon/cf.jpg') }}">
@stop

@section('js')
@stop
