<div class="card-body">
    <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
        {!! Form::label('descripcion', 'Descripcion del Producto') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Descripcion del Producto']) !!}
        <small class="text-danger">{{ $errors->first('descripcion') }}</small>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('precio_compra') ? ' has-error' : '' }}">
                {!! Form::label('precio_compra', 'Precio de Compra') !!}
                {!! Form::text('precio_compra', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Precio de Compra']) !!}
                <small class="text-danger">{{ $errors->first('precio_compra') }}</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                {!! Form::label('stock', 'Stock') !!}
                {!! Form::text('stock', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Stock']) !!}
                <small class="text-danger">{{ $errors->first('stock') }}</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('stock_minimo') ? ' has-error' : '' }}">
                {!! Form::label('stock_minimo', 'Stock Minimo') !!}
                {!! Form::text('stock_minimo', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Stock Minimo']) !!}
                <small class="text-danger">{{ $errors->first('stock_minimo') }}</small>
            </div>
        </div>
    </div>






