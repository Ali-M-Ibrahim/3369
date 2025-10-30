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

<form action="{{route('customer.store')}}" method="post">
    @csrf
    <label for="first_name">First Name</label>
    <input id="first_name" value="{{old('first_name')}}"  type="text" name="first_name">
    @error('first_name')
        <div class="error">{{$message}}</div>
    @enderror
    <br/>

    <label for="last_name">Last Name</label>
    <input id="last_name"  value="{{old('last_name')}}"  type="text" name="last_name">
    @error('last_name')
    <div class="error">{{$message}}</div>

    @enderror
    <br/>

    <label for="address">Address</label>
    <textarea id="address"  name="address" >{{old('address') }}</textarea>
    @error('address')
    <div class="error">{{$message}}</div>

    @enderror
    <br/>

    <label for="balance">Balance</label>
    <input id="balance" value="{{old('balance')}}"  type="text" name="balance">
    @error('balance')
    <div class="error">{{$message}}</div>
    @enderror
    <br/>

    <input class="btn" type="submit" />
    <a href="{{route('customer.index')}}">back</a>

    <input type="password" name="password" />
    <input type="password" name="password_confirmation" />
    @error('password')
    <div class="error">{{$message}}</div>
    @enderror

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


</form>

</body>
</html>


