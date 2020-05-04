<!-- Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Marca', 'Marca:') !!}
    {!! Form::text('Marca', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 255]) !!}
</div>

<!-- Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Modelo', 'Modelo:') !!}
    {!! Form::text('Modelo', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 255]) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {!! Form::textarea('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('autos.index') }}" class="btn btn-default">Cancel</a>
</div>
