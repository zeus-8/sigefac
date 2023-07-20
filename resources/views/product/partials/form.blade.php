
<div class="card-body">
    <div class="row">
        <div class="col-2">
            @if ($product !== "")
                <div class="form-group text-right">
                    {!! Form::label('cod_prov', 'Código del Proveedor') !!}
                    <h5>{{ $product->cod_prov }}</h5>
                </div>
            @else
                <div class="form-group{{ $errors->has('cod_prov') ? ' has-error' : '' }}">
                    {!! Form::label('cod_prov', 'Código del Proveedor') !!}
                    {!! Form::text('cod_prov', null, ['class' => 'form-control', 'placeholder' => 'Código del Proveedor']) !!}
                    <small class="text-danger">{{ $errors->first('cod_prov') }}</small>
                </div>
            @endif


        </div>
        <div class="col-2">
            <div class="form-group">
                <label>Proveedor</label>
                <select class="form-control select2" name="provider_id">
                    @foreach ($providers as $provider )
                        <option value="{{$provider->id}}"
                            @if ($product !== "")
                                {{ $provider->id === $product->provider_id ? 'selected' : '' }}
                            @endif >{{$provider->razon_social}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label>Marca</label>
                <select class="form-control select2" name="brand_id">
                    @foreach ($brands as $brand )
                        <option value="{{$brand->id}}"
                            @if ($product !== "")
                                {{ $brand->id === $product->brand_id ? 'selected' : '' }}
                            @endif
                            >{{$brand->brand}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                {!! Form::label('descripcion', 'Descripción del Producto') !!}
                {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción del Producto']) !!}
                <small class="text-danger">{{ $errors->first('descripcion') }}</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="form-group{{ $errors->has('cantidad_u') ? ' has-error' : '' }}">
                <div data-toggle="collapse" href="#collapseExample" class="text-info">
                    {!! Form::label('cantidad_u', 'Cant. x Unidad') !!} <i class="fas fa-question-circle"></i>
                </div>
                {!! Form::text('cantidad_u', 0, ['class' => 'form-control', 'placeholder' => 'Cant.']) !!}
                <small class="text-danger">{{ $errors->first('cantidad_u') }}</small>
            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                <label>Unidad</label>
                <select class="form-control" name="unit_id" id="unit_id">
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->descripcion}}</option>

                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group{{ $errors->has('cantidad_eu') ? ' has-error' : '' }}">
                <div data-toggle="collapse" href="#collapseExample" class="text-info">
                    {!! Form::label('cantidad_eu', 'Cant. en Unidad') !!} <i class="fas fa-question-circle" data-toggle="collapse" href="#collapseExample"></i>
                </div>
                {!! Form::text('cantidad_eu', 0, ['class' => 'form-control', 'placeholder' => 'Cant.']) !!}
                <small class="text-danger">{{ $errors->first('cantidad_eu') }}</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group{{ $errors->has('precio_compra') ? ' has-error' : '' }}">
                {!! Form::label('precio_compra', 'P.U.C.') !!}
                {!! Form::text('precio_compra', null, ['class' => 'form-control', 'placeholder' => 'Precio de Ultima Compra']) !!}
                <small class="text-danger">{{ $errors->first('precio_compra') }}</small>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                {!! Form::label('stock', 'Stock') !!}
                {!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'Stock']) !!}
                <small class="text-danger">{{ $errors->first('stock') }}</small>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group{{ $errors->has('stock_minimo') ? ' has-error' : '' }}">
                {!! Form::label('stock_minimo', 'Stock Minimo') !!}
                {!! Form::text('stock_minimo', null, ['class' => 'form-control', 'placeholder' => 'Stock Minimo']) !!}
                <small class="text-danger">{{ $errors->first('stock_minimo') }}</small>
            </div>
        </div>
        <div class="col-md-2">
                <div class="form-group{{ $errors->has('peso') ? ' has-error' : '' }}">
                {!! Form::label('peso', 'Peso') !!}
                {!! Form::text('peso', null, ['class' => 'form-control', 'placeholder' => 'Peso']) !!}
                <small class="text-danger">{{ $errors->first('peso') }}</small>
            </div>
        </div>
    </div>
    <br>
    <div class="collapse" id="collapseExample">
        <div class="alert alert-info alert-dismissible">
            <h5><i class="icon fas fa-question"></i> Recuerde que!</h5>
            <b>Cant. x Unidad es la cantidad del producto. Ejm. 24 Bolsas</b> <br>
            <b>Cant. en unidad es la cantidad que viene en lo seleccionado. Ejm. 32 por Bolsa</b> <br>
            <b>Ejmpo: <br>
            CAJA DE CLAVOS 10 cajas 100 por caja</b>
        </div>
    </div>
    @if ($product != "")
        <hr>
        <div>
            <table class="table table-sm">
                <tr>
                    <td>Orden</td>
                    <td>Cantidad</td>
                    <td>Precio de Compra</td>
                    <td>Fecha de Compra</td>
                    <td></td>
                </tr>
                @foreach ($tabla as $row)
                    <tr @if ($row->active === 1) class="table-success" @endif>
                        <td> {{$row->orden}} </td>
                        <td> {{$row->cantidad}} </td>
                        <td> {{$row->precio_compra}} </td>
                        <td> {{$row->created_at}} </td>
                        <td>@if ($row->active === 1) Ultima Compra @endif</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
</div>

@section('js')
    <script>
        $(document).ready(function() {

            var product = @json($product);

            if(product !== ""){
                $('#cantidad_u').val(product.cantidad_u);
                $('#cantidad_eu').val(product.cantidad_eu);
                var cantidadU = $('#cantidad_u').val();
                var cantidadEU = $('#cantidad_eu').val();
                var resultado = cantidadU * cantidadEU;

                $('#stock').val(resultado > 0 ? resultado : '').prop('readonly', resultado > 0);
                //$('#cod_prov').prop('readonly', true);
            }


            console.log(product);

            $('.select2').select2()

            $('#cod_prov, #cantidad_u, #cantidad_eu, #precio_compra, #stock, #stock_minimo, #peso').on('input', function(event) {
                var value = $(this).val();

                if (isNaN(value)) {
                    event.preventDefault();
                    $(this).val('');
                }
            });

            $('#cantidad_eu').on('change', function() {
                var cantidadU = $('#cantidad_u').val();
                var cantidadEU = $(this).val();
                var resultado = cantidadU * cantidadEU;

                $('#stock').val(resultado > 0 ? resultado : '').prop('readonly', resultado > 0);

            });
        });
    </script>
@stop



