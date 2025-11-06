@extends('layouts.app')

@section('content')
    <h1>I am first page</h1>
@endsection


@section('custom-css')
    <style>
        h1{
            color: red !important;
        }
    </style>
@endsection


@section('custom-js')

    <script>
        console.log("hello");
    </script>
@endsection
