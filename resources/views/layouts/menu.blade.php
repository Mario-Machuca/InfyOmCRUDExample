<li class="{{ Request::is('notas*') ? 'active' : '' }}">
    <a href="{{ route('notas.index') }}"><i class="fa fa-edit"></i><span>Notas</span></a>
</li>

<li class="{{ Request::is('autos*') ? 'active' : '' }}">
    <a href="{{ route('autos.index') }}"><i class="fa fa-edit"></i><span>Autos</span></a>
</li>

