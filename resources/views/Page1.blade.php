<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        h1{
            color:red;
        }
    </style>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>
<button onclick="function1()">click me</button>

@for($i=0;$i<10;$i++)
<h1>{{ $i }}</h1>
    @if($i==3)
        @break;
    @else
        <h3>test</h3>
    @endif

@endfor

<script>
    function function1(){
        alert("hello class")
    }
</script>
</body>
</html>


