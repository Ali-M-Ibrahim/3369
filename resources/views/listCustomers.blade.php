<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        h1{
            color:red;
        }
        table,th, tr, td{
            border:1px solid black
        }
    </style>
</head>
<body>
<h1>{{$title}}</h1>
<a href="{{route('add-customer')}}">+ Add</a>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Balance</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($mylist as $obj)
        <tr>
            <td>{{$obj->id}}</td>
            <td>{{$obj->first_name}}</td>
            <td>{{$obj->last_name}}</td>
            <td>{{$obj->balance}}</td>
            <td>{{$obj->address}}</td>
            <td>
                <a href="{{route('single-customer',['id'=>$obj->id])}}"> View</a>
                <a href="{{route('delete-customer',['id'=>$obj->id])}}">Delete</a>
                <a href="{{route('edit-customer',['id'=>$obj->id])}}">Edit</a>

                <form action="{{route('delete-customer2',['id'=>$obj->id])}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="delete" />
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>


</table>


</body>
</html>


