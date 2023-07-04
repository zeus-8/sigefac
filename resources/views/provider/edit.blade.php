@extends('adminlte::page')

@section('title', 'Editar Proveedor')

@section('content_header')
    <h1>Proveedor</h1>
@stop

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="card-title"><strong>{{$provider->codigo}}</strong></h2>
                </div>


                {!! Form::model($provider, ['route' => ['provider.update', $provider->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                    @include('provider.partials.form')
                    <div class="card-footer">
                        {{-- {!! Form::reset("Borrar", ['class' => 'btn btn-info']) !!} --}}
                        {!! Form::submit('Moldificar', ['class' => 'btn btn-primary']) !!}
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
