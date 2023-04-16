<table class="table table-striped table-sm">
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
        @foreach($countries as $record)
            @foreach(array_keys($columnNames) as $rel)
                @if($rel <> 0) 
                    @foreach($record->$rel as $child)
                        <tr>
                            @foreach($columnNames[0] as $columnName)
                                @if ($columnName === 'id')  
                                    <th>{{$record->$columnName}}</th>
                                @else
                                    <td>{{$record->$columnName}}</td>
                                @endif
                            @endforeach
                            @foreach($columnNames[$rel] as $columnName)
                                <td>{{$child->$columnName}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                @endif
            @endforeach
        @endforeach
    </tbody>
</table>