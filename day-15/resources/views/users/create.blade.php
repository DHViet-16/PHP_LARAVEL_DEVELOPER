@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <form method="POST" action="/users">
        @csrf

        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}">

        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">

        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <label for="age">Age</label>
        <input id="age" type="text" name="age" value="{{ old('age') }}">

        @error('age')
            <p>{{ $message }}</p>
        @enderror
        
        <button type="submit">Create</button>
    </form>
@endsection