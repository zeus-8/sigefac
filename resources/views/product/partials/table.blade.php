{{-- <pre>
    @php
        var_dump($products);
    @endphp
</pre> --}}
<div class="row justify-content-md-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">

              <a href="{{ URL::to('product/create') }}" class="btn btn-success float-right"><i class="fas fa-user-plus"> Nuevo Producto</i></a> <br><br>
            </div>
            <div class="card-body">
                <table id="products" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Cod Bk</th>
                            <th>Cod Proveedor</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th class="text-center">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->codigo}}</td>
                                <td>{{$product->cod_prov}}</td>
                                <td>{{$product->descripcion}}</td>
                                <td>{{$product->stock}}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm"><i class=" fas fa-plus"></i></a>
                                    <button class="btn btn-primary btn-sm" onclick="sendCode({{$product->id}})"><i class=" fas fa-eye"></i></button>
                                    <a href="{{ route('product.edit', $product->id)}}" class="btn btn-warning btn-sm"><i class=" fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="eliminar({{$product->id}})"><i class=" fas fa-trash"></i></button>
                                    {{-- <a href="{{ route('product.destroy', $product->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@include('product.partials.modal')

@section('js')
    <script>
        $(document).ready(function() {

        });

        function sendCode (id){

            var url = '/product/show';

            $.ajax({
                url: url,
                type: 'GET',
                data:{
                    id:id,
                },
                success: function(data) {
                    console.log(data);
                    var colorClass = null;

                    const formatter = new Intl.NumberFormat('es', {
                        minimumFractionDigits: 3,
                        maximumFractionDigits: 3,
                    });
                    var price = formatter.format(data.precio_compra);

                    if (data.stock <= data.stock_minimo){
                        colorClass = 'text-danger';
                    }else{
                        colorClass='text-success';
                    }

                    var template =`
                    <dl class="row">
                        <dt class="col-sm-5 text-right">Codigo:</dt>
                        <dd class="col-sm-7 text-left">${data.codigo}</dd>
                        <dt class="col-sm-5 text-right">Codigo del Proveedor:</dt>
                        <dd class="col-sm-7 text-left">${data.cod_prov}</dd>
                        <dt class="col-sm-5 text-right">Descripcion:</dt>
                        <dd class="col-sm-7 text-left">${data.descripcion}</dd>
                        <dt class="col-sm-5 text-right ">Cant. x Unidad:</dt>
                        <dd class="col-sm-7 text-left">${data.cantidad_u} falta la unidad</dd>
                        <dt class="col-sm-5 text-right ">Cant. en Unidad:</dt>
                        <dd class="col-sm-7 text-left">${data.cantidad_eu}</dd>
                        <dt class="col-sm-5 text-right ">Stock:</dt>
                        <dd class="col-sm-7 text-left ${colorClass}"><b>${data.stock}</b></dd>
                        <dt class="col-sm-5 text-right">Stock Minimo:</dt>
                        <dd class="col-sm-7 text-left">${data.stock_minimo}</dd>
                    </dl>
                    `;

                    $('.modal-title').empty();
                    $('.modal-body').empty();

                    $('.modal-title').html('<b>'+data.codigo+' - '+data.descripcion+'</b>');
                    $('.modal-body').html(template);


                    $('#show-product').modal('show')
                },
                error: function(xhr, status, error) {
                    // Manejar el error
                }
            });
        }

        $('#products').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        function eliminar(id){
            var url = '/product/'+id+'/destroy';

            Swal.fire({
                title: 'Esta seguro?',
                text: "Se eliminara el producto!",
                showCancelButton: true,
                //confirmButtonColor: '#3085d6',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#28a745',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                //if (result.isConfirmed) {

                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {id:id},
                        success: function (data) {
                            console.log(data);
                            Swal.fire(
                                'Eliminado!',
                                'El registro '+data.codigo+' fue eliminado correctamente',
                                'success'
                            ).then(() => {
                                window.location.href = "{{ route('product.index') }}";
                            });
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.table(jqXHR)
                        }
                    });
                //}
            })
        }
    </script>
@stop
