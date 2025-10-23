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

    </style>
</head>
<body>

<form action="{{route('customer.store')}}" method="post">
    @csrf
    <label for="first_name">First Name</label>
    <input id="first_name" type="text" name="first_name">
    <br/>

    <label for="last_name">Last Name</label>
    <input id="last_name" type="text" name="last_name">
    <br/>

    <label for="address">Address</label>
    <textarea id="address" name="address" ></textarea>
    <br/>

    <label for="balance">Balance</label>
    <input id="balance" type="number" name="balance">
    <br/>

    <input class="btn" type="submit" />
    <a href="{{route('customer.index')}}">back</a>

</form>

</body>
</html>


