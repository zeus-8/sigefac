@extends('adminlte::page')

@section('title', 'Borrados')

@section('content_header')
    <h1>Lista de Borrados</h1>
@stop

@section('content')
    @include('trash.partials.contadores')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop


