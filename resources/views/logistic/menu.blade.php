<li><a href="{{ url('/logistic') }} "><fa class="fa fa-book"></fa> LOGISTIC </a></li>
<li class="dropdown">
    {{--  enfoque inicial  --}}
    <a id="nav_focus" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-database"></i> Utilitarios <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('/logistic/packings') }}"><i class="fa fa-bars"></i> Empaquetado</a></li>
        <li><a href="{{ url('/logistic/categories') }}"><i class="fa fa-bars"></i> Categorias</a></li>
        <li><a href="{{ url('/logistic/brands') }}"><i class="fa fa-bars"></i> Marcas</a></li>
        <li><a href="{{ url('/logistic/measurements') }}"><i class="fa fa-bars"></i> Unidades de Medida</a></li>
        {{--  <li><a href="{{ url('/logistic/tickets') }}"><i class="fa fa-bars"></i> Boletos</a></li>  --}}
        <li role="separator" class="divider"></li>
        <li><a href="{{ url('/logistic/ng/products') }}"><i class="fa fa-cogs"></i> Productos</a></li>
        <li><a href="{{ url('/logistic/ng/suppliers') }}"><i class="fa fa-cogs"></i> Proveedores</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proceso de Compra <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="#">Requerimientos</a></li>
        <li><a href="#">Evaluacion</a></li>
        <li><a href="#">Orden de Compra</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kardex <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('/logistic/ng/inputs') }} ">Ingresos</a></li>
        <li><a href="{{ url('/logistic/ng/outputs') }} ">Salidas</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Reportes</a></li>
    </ul>
</li>
<!-- <li>
    <a href="{{ url('/logistic/locations') }}">Localizaciones</a>
</li> -->
