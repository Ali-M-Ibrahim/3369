<table>
    <thead>
    <tr>
        <th>name</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $img)

        <tr>
            <td>{{$img->name}}</td>
            <td><img src="{{asset($img->path)}}" style="width: 150px; height: 150px" /> </td>
        </tr>
    @endforeach
    </tbody>
</table>
