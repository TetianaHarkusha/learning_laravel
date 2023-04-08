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
            @foreach($record as $field)
                @if ($loop->first)
                    <th>{{$field}}</th>
                @else
                    <td>{{$field}}</td>
                @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
</div>
