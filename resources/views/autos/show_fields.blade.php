<!-- Marca Field -->
<div class="form-group">
    {!! Form::label('Marca', 'Marca:') !!}
    <p>{{ $autos->Marca }}</p>
</div>

<!-- Modelo Field -->
<div class="form-group">
    {!! Form::label('Modelo', 'Modelo:') !!}
    <p>{{ $autos->Modelo }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $autos->Descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $autos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $autos->updated_at }}</p>
</div>

