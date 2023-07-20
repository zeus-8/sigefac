<div class="card-body">
    <div class="row">
        <div class="col-4">
            <div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }}">
                {!! Form::label('razon_social', 'Razón Social') !!}
                {!! Form::text('razon_social', null, ['class' => 'form-control', 'placeholder' => 'Razón Social']) !!}
                <small class="text-danger">{{ $errors->first('razon_social') }}</small>
            </div>
        </div>
        <div class="col-8">
            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                {!! Form::label('direccion', 'Direccion') !!}
                {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                <small class="text-danger">{{ $errors->first('direccion') }}</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                {!! Form::label('telefono', 'Teléfono') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
                <small class="text-danger">{{ $errors->first('telefono') }}</small>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                {!! Form::label('mail', 'Email') !!}
                {!! Form::text('mail', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                <small class="text-danger">{{ $errors->first('mail') }}</small>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group{{ $errors->has('contacto') ? ' has-error' : '' }}">
                {!! Form::label('contacto', 'Contacto') !!}
                {!! Form::text('contacto', null, ['class' => 'form-control', 'placeholder' => 'Contacto']) !!}
                <small class="text-danger">{{ $errors->first('contacto') }}</small>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group{{ $errors->has('telefono_contac') ? ' has-error' : '' }}">
                {!! Form::label('telefono_contac', 'Teléfono de Contacto') !!}
                {!! Form::text('telefono_contac', null, ['class' => 'form-control', 'placeholder' => 'Teléfono de Contacto']) !!}
                <small class="text-danger">{{ $errors->first('telefono_contac') }}</small>
            </div>
        </div>
    </div>
</div>
