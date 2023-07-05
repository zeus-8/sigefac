{{-- <pre>
    @php
        var_dump($products);
    @endphp
</pre> --}}
<div class="row justify-content-md-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">

              <a href="{{ URL::to('customer/create') }}" class="btn btn-success float-right"><i class="fas fa-user-plus"> Nuevo Cliente</i></a> <br><br>
            </div>
            <div class="card-body">
                <table id="customers" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Documento</th>
                            <th>Razon Social</th>
                            <th>Email</th>
                            <th class="text-center">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{$customer->codigo_cliente}}</td>
                                <td>{{$customer->documento_cliente}}</td>
                                <td>{{$customer->razon_social}}</td>
                                <td>{{$customer->mail}}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" onclick="sendCode({{$customer->id}})"><i class=" fas fa-eye"></i></button>
                                    <a href="{{ route('customer.edit', $customer->id)}}" class="btn btn-warning btn-sm"><i class=" fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="eliminar({{$customer->id}})"><i class=" fas fa-trash"></i></button>
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


@include('customer.partials.modal')

@section('js')
    <script>
        $(document).ready(function() {

        });

        function sendCode (id){

            var url = '/customer/show';

            $.ajax({
                url: url,
                type: 'GET',
                data:{
                    id:id,
                },
                success: function(data) {
                    //console.log(data);
                    var razon           = (data.razon_social === null) ? 'N/A' : data.razon_social;
                    var jQdireccion     = (data.direccion === null) ? 'N/A' : data.direccion;
                    var jQtelefono      = (data.telefono === null) ? 'N/A' : data.telefono;
                    var jQmail          = (data.mail === null) ? 'N/A' : data.mail;
                    var jQcontacto      = (data.contacto === null) ? 'N/A' : data.contacto;
                    var jQtelef_contac  = (data.telef_contac === null) ? 'N/A' : data.telef_contac;
                    var jQpunto_partida = (data.punto_partida === null) ? 'N/A' : data.punto_partida;
                    var jQpunto_llegada = (data.punto_llegada === null) ? 'N/A' : data.punto_llegada;
                    var jQplaca         = (data.placa === null) ? 'N/A' : data.placa;
                    var jQdocumento_chofer = (data.documento_chofer === null) ? 'N/A' : data.documento_chofer;
                    var tipo = null;

                    if (data.tipo_doc === 'sin_documento') {
                        tipo = 'Sin Documento';
                    } else if (data.tipo_doc === 'ruc') {
                        tipo = 'RUC';
                    } else if (data.tipo_doc === 'dni') {
                        tipo = 'DNI';
                    }
                    var documento          = (data.documento_cliente === null) ? tipo + ' - N/A' : tipo + ' - ' + data.documento_cliente;

                    var template =`
                    <dl class="row">
                        <dt class="col-sm-5 text-right">Codigo:</dt>
                        <dd class="col-sm-7 text-left">${data.codigo_cliente}</dd>
                        <dt class="col-sm-5 text-right">Documento:</dt>
                        <dd class="col-sm-7 text-left">${documento}</dd>
                        <dt class="col-sm-5 text-right ">Razon Social:</dt>
                        <dd class="col-sm-7 text-left">${razon}</dd>
                        <dt class="col-sm-5 text-right">Direccion:</dt>
                        <dd class="col-sm-7 text-left">${jQdireccion}</dd>
                        <dt class="col-sm-5 text-right">Telefono:</dt>
                        <dd class="col-sm-7 text-left">${jQtelefono}</dd>
                        <dt class="col-sm-5 text-right">Email:</dt>
                        <dd class="col-sm-7 text-left">${jQmail}</dd>

                        <dt class="col-sm-5 text-right">Contacto:</dt>
                        <dd class="col-sm-7 text-left">${jQcontacto}</dd>
                        <dt class="col-sm-5 text-right">Telefono de Contacto:</dt>
                        <dd class="col-sm-7 text-left">${jQtelef_contac}</dd>
                        <dt class="col-sm-5 text-right">Punto de Partida:</dt>
                        <dd class="col-sm-7 text-left">${jQpunto_partida}</dd>
                        <dt class="col-sm-5 text-right">Punto de Llegada:</dt>
                        <dd class="col-sm-7 text-left">${jQpunto_llegada}</dd>
                        <dt class="col-sm-5 text-right">Placa:</dt>
                        <dd class="col-sm-7 text-left">${jQplaca}</dd>
                        <dt class="col-sm-5 text-right">Documento del Chofer:</dt>
                        <dd class="col-sm-7 text-left">${jQdocumento_chofer}</dd>
                    </dl>
                    `;

                    $('.modal-title').empty();
                    $('.modal-body').empty();

                    $('.modal-title').html('<b>'+data.codigo_cliente+' - '+razon+'</b>');
                    $('.modal-body').html(template);


                    $('#show-customer').modal('show')
                },
                error: function(xhr, status, error) {
                    // Manejar el error
                }
            });
        }

        $('#customers').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });



        function eliminar(id){
            var url = '/customer/'+id+'/destroy';

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
                                'El registro '+data.codigo_cliente+' fue eliminado correctamente',
                                'success'
                            ).then(() => {
                                window.location.href = "{{ route('customer.index') }}";
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
