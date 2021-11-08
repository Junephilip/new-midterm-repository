<div class="table-responsive">
    <table class="table" id="studentInfos-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>Age</th>
        <th>Number</th>
        <th>Course</th>
        <th>Year</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($studentInfos as $studentInfo)
            <tr>
                <td>{{ $studentInfo->name }}</td>
            <td>{{ $studentInfo->lastname }}</td>
            <td>{{ $studentInfo->address }}</td>
            <td>{{ $studentInfo->age }}</td>
            <td>{{ $studentInfo->number }}</td>
            <td>{{ $studentInfo->course }}</td>
            <td>{{ $studentInfo->year }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['studentInfos.destroy', $studentInfo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('studentInfos.show', [$studentInfo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('studentInfos.edit', [$studentInfo->id]) }}" class='btn btn-default btn-xs'>
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
