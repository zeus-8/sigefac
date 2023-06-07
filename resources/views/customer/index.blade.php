@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    @include('customer.partials.table')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop


