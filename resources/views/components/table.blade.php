<div>
<table {{$attributes}}>
    <thead>
        <tr>
        @foreach($columnNames as $columnName)
            <th scope="col">{{$columnName}}</th>
        @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            {{--if using Eloquent --}}
            @if($record instanceof Illuminate\Database\Eloquent\Model)
                @foreach($columnNames as $columnName)
                    @if ($columnName === 'id')
                        <th>{{$record->$columnName}}</th>
                    @else
                        <td>{{$record->$columnName}}</td>
                    @endif
                @endforeach
            @else {{--if using facade DB--}}
                @foreach($record as $field)
                    @if ($loop->first)
                        <th>{{$field}}</th>
                    @else
                        <td>{{$field}}</td>
                    @endif
                @endforeach
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
</div>
