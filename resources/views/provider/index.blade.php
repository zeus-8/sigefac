@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Lista de Proveedores</h1>
@stop

@section('content')
    @include('provider.partials.table')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop


