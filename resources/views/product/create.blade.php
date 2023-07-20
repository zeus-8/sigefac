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
                    <h3 class="card-title">Crear Cliente</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'product.store', 'class' => 'form-horizontal']) !!}

                    @include('product.partials.form')

                    <div class="card-footer">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        <a href="{{route('product.index')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop
