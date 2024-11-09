<div>
    <h1>This is admin home page </h1>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
        </tr>
        <tbody>
            @foreach ($listUser as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
