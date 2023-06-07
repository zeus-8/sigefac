@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Cliente</h1>
@stop

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="card-title"><strong>{{$customer->codigo_cliente}} - {{$customer->razon_social}} </strong></h2>
                </div>

                {!! Form::model($customer, ['route' => ['customer.update', $customer->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                    @include('customer.partials.form')
                    <div class="card-footer">
                        {{-- {!! Form::reset("Borrar", ['class' => 'btn btn-info']) !!} --}}
                        {!! Form::submit('Moldificar', ['class' => 'btn btn-primary']) !!}
                        <a href="{{route('customer.index')}}" class="btn btn-danger">Cancelar</a>
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
