<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $healthTracker->name }}</p>
</div>

<!-- Weight Field -->
<div class="col-sm-12">
    {!! Form::label('weight', 'Weight:') !!}
    <p>{{ $healthTracker->weight }}</p>
</div>

<!-- Blood Pressure Field -->
<div class="col-sm-12">
    {!! Form::label('blood_pressure', 'Blood Pressure:') !!}
    <p>{{ $healthTracker->blood_pressure }}</p>
</div>

<!-- Diagnosis Field -->
<div class="col-sm-12">
    {!! Form::label('diagnosis', 'Diagnosis:') !!}
    <p>{{ $healthTracker->diagnosis }}</p>
</div>

