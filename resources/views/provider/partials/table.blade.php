{{-- <pre>
    @php
        var_dump($products);
    @endphp
</pre> --}}
<div class="row justify-content-md-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">

              <a href="{{ URL::to('provider/create') }}" class="btn btn-success float-right"><i class="fas fa-user-plus"> Nuevo Producto</i></a> <br><br>
            </div>
            <div class="card-body">
                <table id="products" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>codigo</th>
                            <th>Razón Social</th>
                            <th>Email</th>
                            <th class="text-center">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $provider)
                            <tr>
                                <td>{{$provider->codigo_proveedor}}</td>
                                <td>{{$provider->razon_social}}</td>
                                <td>{{$provider->mail}}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" onclick="sendCode({{$provider->id}})"><i class=" fas fa-eye"></i></button>
                                    <a href="{{ route('provider.edit', $provider->id)}}" class="btn btn-warning btn-sm"><i class=" fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="eliminar({{$provider->id}})"><i class=" fas fa-trash"></i></button>
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

            var url = '/provider/show';

            $.ajax({
                url: url,
                type: 'GET',
                data:{
                    id:id,
                },
                success: function(data) {
                    //console.log(data);
                    var template =`
                    <dl class="row">
                        <dt class="col-sm-5 text-right">Codigo:</dt>
                        <dd class="col-sm-7 text-left"><b>${data.codigo_proveedor}</b></dd>
                        <dt class="col-sm-5 text-right">Razón Social:</dt>
                        <dd class="col-sm-7 text-left">${data.razon_social}</dd>
                        <dt class="col-sm-5 text-right ">Dirección</dt>
                        <dd class="col-sm-7 text-left">${data.direccion}</dd>
                        <dt class="col-sm-5 text-right">Teléfono</dt>
                        <dd class="col-sm-7 text-left">${data.telefono}</dd>
                        <dt class="col-sm-5 text-right">Email</dt>
                        <dd class="col-sm-7 text-left">${data.mail}</dd>
                    </dl>
                    `;

                    $('.modal-title').empty();
                    $('.modal-body').empty();

                    $('.modal-title').html('<b>'+data.codigo_proveedor+' - '+data.razon_social+'</b>');
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
            var url = '/provider/'+id+'/destroy';

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
                            //console.log(data);
                            Swal.fire(
                                'Eliminado!',
                                'El registro '+data.codigo+' fue eliminado correctamente',
                                'success'
                            ).then(() => {
                                window.location.href = "{{ route('provider.index') }}";
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
