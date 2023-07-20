<div class="row">
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3> {{ $product }} </h3>
                <h4>Productos</h4>
            </div>
            <div class="icon">
                <i class="fas fa-barcode"></i>
            </div>
            <a onclick="restore('product')" class="small-box-footer">
                Detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3> {{ $customer }} </h3>
                <h4>Clientes</h4>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a onclick="restore('customer')" class="small-box-footer">
                Detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3> {{ $provider }} </h3>
                <h4>Proveedores</h4>
            </div>
            <div class="icon">
                <i class="fas fa-truck"></i>
            </div>
            <a onclick="restore('provider')" class="small-box-footer">
                Detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>--</h3>

                <p>---</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
                -- <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@section('js')
    <script>
        function restore(restore) {

            var url = '/'+restore+'/restore';
            console.log(url);

            $.ajax({
                type: "GET",
                url: url,
                data:{
                    search:restore,
                },
                success: function (data) {
                    //Do anything
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.table(jqXHR)
                }
            });
        }
    </script>
@stop
