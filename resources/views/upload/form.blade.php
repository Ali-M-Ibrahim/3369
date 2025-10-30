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

        input,textarea{
            width: 100%;
        }

        form{
            width: 300px;
            margin: auto;
            padding: 10px;
            margin-top: 50px;
            border:1px solid black
        }

        .btn{
            background: green;
            color: white;
            padding: 10px;
            margin:10px
        }

        .error{
            color:red
        }

    </style>
</head>
<body>

<form action="{{route('method3')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="file">Your File</label>
    <input id="file"  type="file" name="my_file">

    @error('file')
    <div class="error">{{$message}}</div>
    @enderror
    <br/>
    <input type="submit" value="Upload">
</form>
</body>
</html>


