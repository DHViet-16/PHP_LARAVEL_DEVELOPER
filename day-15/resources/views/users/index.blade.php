{{-- <!DOCTYPE html>
<html>

<head>
    <title>User</title>
</head>

<body>
    <h1>Hello {{ $name }}</h1>
    <p>Age: {{ $age }}</p>
    @if($age >= 18)
        <p>Adult</p>
    @else
        <p>Minor</p>
    @endif
    <p>Skills:</p>
    @foreach($skills as $skill)
        <p> - {{  $skill }}</p>
    @endforeach

</body>

</html> --}}

@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <h1>Hello {{ $name }}</h1>

    <p>Age: {{ $age }}</p>

    @if($age >= 18)
        <p>Adult</p>
    @else
        <p>Minor</p>
    @endif

    <p>Skills:</p>

    @foreach($skills as $skill)
        <p>- {{ $skill }}</p>
    @endforeach

@endsection