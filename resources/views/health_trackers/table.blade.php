<div class="table-responsive">
    <table class="table" id="healthTrackers-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Weight</th>
        <th>Blood Pressure</th>
        <th>Diagnosis</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($healthTrackers as $healthTracker)
            <tr>
                <td>{{ $healthTracker->name }}</td>
            <td>{{ $healthTracker->weight }}</td>
            <td>{{ $healthTracker->blood_pressure }}</td>
            <td>{{ $healthTracker->diagnosis }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['healthTrackers.destroy', $healthTracker->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('healthTrackers.show', [$healthTracker->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('healthTrackers.edit', [$healthTracker->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
