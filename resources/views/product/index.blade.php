@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Lista de Producto</h1>
@stop

@section('content')
    @include('product.partials.table')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop


