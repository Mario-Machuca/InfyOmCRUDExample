<div class="table-responsive">
    <table class="table" id="autos-table">
        <thead>
            <tr>
                <th>Marca</th>
        <th>Modelo</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($autos as $autos)
            <tr>
                <td>{{ $autos->Marca }}</td>
            <td>{{ $autos->Modelo }}</td>
            <td>{{ $autos->Descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['autos.destroy', $autos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('autos.show', [$autos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('autos.edit', [$autos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
