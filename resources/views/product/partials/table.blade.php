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
                            <th>codigo</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th class="text-center">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->codigo}}</td>
                                <td>{{$product->descripcion}}</td>
                                <td>{{$product->stock}}</td>
                                <td class="text-center">
                                    {!! Form::hidden('id', $product->id) !!}
                                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#show-product"><i class=" fas fa-eye"></i></a>
                                    <a href="{{ route('product.edit', $product->id)}}" class="btn btn-warning btn-sm"><i class=" fas fa-edit"></i></a>
                                    <a href="{{ route('product.destroy', $product->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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
           // $('#show-product').on('show.bs.modal', function (event) {
                var token = $('input[name="_token"]').val();
                var url = '/product/show';

                $.ajax({
                    url: url,
                    type: 'GET',
                    data:{
                        id:1,
                        _token: token
                    },
                    success: function(response) {
                       alert('respose');
                    },
                    error: function(xhr, status, error) {
                        // Manejar el error
                    }
                });
           // });
        });

        $('#products').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        // function eliminar(){
        //     Swal.fire({
        //         title: 'Esta seguro?',
        //         text: "Se eliminara el producto!",
        //         showCancelButton: true,
        //         //confirmButtonColor: '#3085d6',
        //         confirmButtonColor: '#d33',
        //         cancelButtonColor: '#28a745',
        //         confirmButtonText: 'Si, eliminar!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             Swal.fire(
        //                 'Eliminado!',
        //                 'El registro fue eliminado correctamente',
        //                 'success'
        //             )
        //         }
        //     })

        // }
    </script>
@stop
