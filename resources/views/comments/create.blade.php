@extends('layouts.app')

@section('title', 'Create Comment')

@section('content')
   <form method="POST" action="{{ route('comments.store') }}">
    @csrf
    <p>Name: <input type="text" name="name" 
    value="{{ old('name') }}"></p>
    <p>Type: <input type="text" name="type" 
    value="{{ old('name') }}"></p>
    <p>Description: <textarea name="description" ></textarea
    value="{{ old('name') }}"></p>
    <p>Day: <input type="text" name="day" 
    value="{{ old('name') }}"></p>
    <p>Date: <input type="date" name="date" 
    value="{{ old('name') }}"></p>
    <input type="submit" value="Submit"><b>
    <a href="{{ route('comments.index') }}">Cancel</a>
    
    </form>
    
@endsection









                            

             
