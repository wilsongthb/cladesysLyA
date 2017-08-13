
<li><a href="{{ url('/logistic') }} "><fa class="fa fa-book"></fa> LOGISTIC </a></li>
<li class="dropdown">
    {{--  enfoque inicial  --}}
    <a id="nav_focus" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-database"></i> Utilitarios <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('/logistic/packings') }}" target="_blank"><i class="fa fa-bars"></i> Empaquetado</a></li>
        <li><a href="{{ url('/logistic/categories') }}" target="_blank"><i class="fa fa-bars"></i> Categorias</a></li>
        <li><a href="{{ url('/logistic/brands') }}" target="_blank"><i class="fa fa-bars"></i> Marcas</a></li>
        <li><a href="{{ url('/logistic/measurements') }}" target="_blank"><i class="fa fa-bars"></i> Unidades de Medida</a></li>
        <li><a href="{{ url('/logistic/locations') }}" target="_blank"><i class="fa fa-bars"></i> Localizaciones</a></li>
        {{--  <li><a href="{{ url('/logistic/tickets') }}"><i class="fa fa-bars"></i> Boletos</a></li>  --}}
        <li role="separator" class="divider"></li>
        <li><a href="{{ url('/logistic/products') }}"><i class="fa fa-cogs"></i> Productos</a></li>
        <li><a href="{{ url('/logistic/suppliers') }}"><i class="fa fa-cogs"></i> Proveedores</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-alt"></i> Proceso de Compra <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('/logistic/requeriments') }} "><i class="fa fa-circle"></i> Requerimientos</a></li>
        <li><a href="{{ url('/logistic/quotations') }} "><i class="fa fa-circle"></i> Cotización</a></li>
        <li><a href="{{ url('/logistic/purchase_orders') }} "><i class="fa fa-circle"></i> Orden de Compra</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-tasks"></i> Kardex <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('/logistic/inputs') }} "><i class="fa fa-chevron-right"></i> Ingresos</a></li>
        <li><a href="{{ url('/logistic/outputs') }} "><i class="fa fa-chevron-left"></i> Salidas</a></li>
        <li><a href="{{ url('/logistic/inventory') }} "><i class="fa fa-book"></i> Inventario</a></li>
        <li><a href="#"><i class="fa fa-bar-chart"></i> Reportes</a></li>
    </ul>
</li>
<li>
    <a href="{{ url('/logistic/dev') }} "><i class="fa fa-plus"></i> Developer</a>
</li>