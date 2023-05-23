@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h1>Producto</h1>
@stop

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'product.store', 'class' => 'form-horizontal']) !!}
                   
                    @include('product.partials.form')

                    <div class="d-flex justify-content-end">
                        {{-- {!! Form::reset("Borrar", ['class' => 'btn btn-info']) !!} --}}
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        <a href="{{route('product.index')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
