<div>
<table class="table table-striped">
    <thead>
        <tr>
        @foreach($columnNames as $columnName)
            <th scope="col">{{$columnName}}</th>
        @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            @foreach($user as $field)
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
