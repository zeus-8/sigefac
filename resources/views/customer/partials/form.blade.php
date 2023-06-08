<div class="card-body">
    <div class="row justify-content-md-center">
        <div class="col-5">
            <div class="form-group{{ $errors->has('tipo_doc') ? ' has-error' : '' }}">
                {!! Form::label('tipo_doc', '') !!}
                {!! Form::select('tipo_doc', [
                    'sin_documento' => 'Sin Documento',
                    'ruc' => 'Ruc',
                    'dni' => 'DNI',
                ], null, ['id' => 'tipo_doc', 'class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('tipo_doc') }}</small>
            </div>
        </div>
        <div class="col-5">
            <div class="form-group{{ $errors->has('documento_cliente') ? ' has-error' : '' }}">
                {!! Form::label('documento_cliente', 'Ruc ó Documento') !!}
                {!! Form::text('documento_cliente', null, ['class' => 'form-control', 'placeholder' => 'Ruc ó Documento']) !!}
                <small class="text-danger">{{ $errors->first('documento_cliente') }}</small>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-10">
            <div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }}">
                {!! Form::label('razon_social', 'Razón Social') !!}
                {!! Form::text('razon_social', null, ['class' => 'form-control', 'placeholder' => 'Razón Social']) !!}
                <small class="text-danger">{{ $errors->first('razon_social') }}</small>
            </div>
        </div>
        <div class="col-10">
            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                {!! Form::label('direccion', 'Direccion') !!}
                {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Direccion']) !!}
                <small class="text-danger">{{ $errors->first('direccion') }}</small>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-5">
            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                {!! Form::label('telefono', 'Telefono') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Telefono']) !!}
                <small class="text-danger">{{ $errors->first('telefono') }}</small>
            </div>
        </div>
        <div class="col-5">
            <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                {!! Form::label('mail', 'Email') !!}
                {!! Form::text('mail', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                <small class="text-danger">{{ $errors->first('mail') }}</small>
            </div>
        </div>

    </div>
    <hr>
    <div class="row justify-content-md-center">
        <div class="col-10">
            <div class="row">
                <div class="col-4">
                    <div class="form-group{{ $errors->has('contacto') ? ' has-error' : '' }}">
                        {!! Form::label('contacto', 'Contacto') !!}
                        {!! Form::text('contacto', null, ['class' => 'form-control', 'placeholder' => 'Contacto']) !!}
                        <small class="text-danger">{{ $errors->first('contacto') }}</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group{{ $errors->has('telef_contac') ? ' has-error' : '' }}">
                        {!! Form::label('telef_contac', 'Telefono de Contacto') !!}
                        {!! Form::text('telef_contac', null, ['class' => 'form-control', 'placeholder' => 'Telefono de Contacto']) !!}
                        <small class="text-danger">{{ $errors->first('telef_contac') }}</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group{{ $errors->has('punto_partida') ? ' has-error' : '' }}">
                        {!! Form::label('punto_partida', 'Punto de Partida') !!}
                        {!! Form::text('punto_partida', 'CAL. COMANDANTE CANGA 210', ['class' => 'form-control', 'placeholder' => 'Punto de Partida']) !!}
                        <small class="text-danger">{{ $errors->first('punto_partida') }}</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group{{ $errors->has('punto_llegada') ? ' has-error' : '' }}">
                        {!! Form::label('punto_llegada', 'Punto de Llegada') !!}
                        {!! Form::text('punto_llegada', null, ['class' => 'form-control', 'placeholder' => 'Punto de Llegada']) !!}
                        <small class="text-danger">{{ $errors->first('punto_llegada') }}</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group{{ $errors->has('placa') ? ' has-error' : '' }}">
                        {!! Form::label('placa', 'Placa') !!}
                        {!! Form::text('placa', 'A6V671', ['class' => 'form-control', 'placeholder' => 'Placa']) !!}
                        <small class="text-danger">{{ $errors->first('placa') }}</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group{{ $errors->has('documento_chofer') ? ' has-error' : '' }}">
                        {!! Form::label('documento_chofer', 'Dni del Chofer') !!}
                        {!! Form::text('documento_chofer', '002248112', ['class' => 'form-control', 'placeholder' => 'Dni del Chofer']) !!}
                        <small class="text-danger">{{ $errors->first('documento_chofer') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
