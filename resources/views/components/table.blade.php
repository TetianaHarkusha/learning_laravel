<div>
<table {{$attributes}}>
    <thead>
        <tr>
        @foreach($columnNames as $key => $value)
            @foreach($value as $columnName)
                @if($key === 0) 
                    <th scope="col">{{$columnName}}</th>
                @else
                    <th scope="col">{{$key . '.' . $columnName}}</th>
                @endif
            @endforeach
        @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            {{--if using Eloquent --}}
            @if($record instanceof Illuminate\Database\Eloquent\Model)
                @foreach($columnNames as $key => $value)
                    @foreach($value as $columnName)  
                        @if($key === 0)
                            @if ($columnName === 'id')  
                                <th>{{$record->$columnName}}</th>
                            @else
                                <td>{{$record->$columnName}}</td>
                            @endif
                        @else
                            <td>{{$record->$key->$columnName}}</td>
                        @endif
                    @endforeach
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
