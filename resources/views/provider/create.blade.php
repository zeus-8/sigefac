@extends('adminlte::page')

@section('title', 'Crear Proveedor')

@section('content_header')
    <h1>Proveedor</h1>
@stop

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Crear Proveedor</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'provider.store', 'class' => 'form-horizontal']) !!}

                    @include('provider.partials.form')

                    <div class="card-footer">
                        {{-- {!! Form::reset("Borrar", ['class' => 'btn btn-info']) !!} --}}
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary float-end']) !!}
                        <a href="{{route('provider.index')}}" class="btn btn-danger float-end">Cancelar</a>
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
