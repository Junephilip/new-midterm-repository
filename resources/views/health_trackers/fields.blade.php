<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Blood Pressure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blood_pressure', 'Blood Pressure:') !!}
    {!! Form::text('blood_pressure', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Diagnosis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diagnosis', 'Diagnosis:') !!}
    {!! Form::text('diagnosis', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>