<div class="card-body">
    <div class="form-group{{ $errors->has('tipo_doc') ? ' has-error' : '' }}">
        {!! Form::label('tipo_doc', '') !!}
        {!! Form::select('tipo_doc', [
            'opcion1' => 'Sin Documento',
            'opcion2' => 'Ruc',
            'opcion3' => 'Documento',
        ], null, ['id' => 'tipo_doc', 'class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('tipo_doc') }}</small>
    </div>
    <div class="form-group{{ $errors->has('documento_cliente') ? ' has-error' : '' }}">
        {!! Form::label('documento_cliente', 'Ruc ó Documento') !!}
        {!! Form::text('documento_cliente', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ruc ó Documento']) !!}
        <small class="text-danger">{{ $errors->first('documento_cliente') }}</small>
    </div>
    <div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }}">
        {!! Form::label('razon_social', 'Razón Social') !!}
        {!! Form::text('razon_social', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Razón Social']) !!}
        <small class="text-danger">{{ $errors->first('razon_social') }}</small>
    </div>
    <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
        {!! Form::label('direccion', 'Direccion') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Direccion']) !!}
        <small class="text-danger">{{ $errors->first('direccion') }}</small>
    </div>
    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
        {!! Form::label('telefono', 'Telefono') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Telefono']) !!}
        <small class="text-danger">{{ $errors->first('telefono') }}</small>
    </div>
    <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
        {!! Form::label('mail', 'Email') !!}
        {!! Form::text('mail', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Email']) !!}
        <small class="text-danger">{{ $errors->first('mail') }}</small>
    </div>
    <div class="form-group{{ $errors->has('contacto') ? ' has-error' : '' }}">
        {!! Form::label('contacto', 'Contacto') !!}
        {!! Form::text('contacto', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Contacto']) !!}
        <small class="text-danger">{{ $errors->first('contacto') }}</small>
    </div>
    <div class="form-group{{ $errors->has('telef_contac') ? ' has-error' : '' }}">
        {!! Form::label('telef_contac', 'Telefono de Contacto') !!}
        {!! Form::text('telef_contac', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Telefono de Contacto']) !!}
        <small class="text-danger">{{ $errors->first('telef_contac') }}</small>
    </div>
</div>
