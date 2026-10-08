@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <h1>User Profile</h1>
    <p>Name: {{ $name }}</p>
    <p>Age: {{ $age }}</p>
    
@endsection