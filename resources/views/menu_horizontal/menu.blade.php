<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="{{ action('EntradasController@index') }}">Inici</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=" {{ action('EntradasController@formulario_cliente') }} ">Crear client</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=" {{ action('EntradasController@formulario_tratamiento') }} ">Crear Tractament</a>
  </li>
</ul>