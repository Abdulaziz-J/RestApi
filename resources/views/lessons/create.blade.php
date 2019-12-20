@extends('layouts.app')

@section('title', 'Lesson Edits')

@section('content')
    <form method="POST" action="{{ route('lessons.store') }}" enctype="multipart/form-data">
    @csrf
    <p>Name: <input type="text" name="name" 
    value="{{ old('name') }}"></p>
    <p>Description: <textarea name="description" >{{ old('description') }}</textarea
    ></p>
    <p>Day: <input type="text" name="day" 
    value="{{ old('day') }}"></p>
    <p>Date: <input type="date" name="date" 
    value="{{ old('date') }}"></p>
    <p>Date: <input type="file" name="image" 
        value=""></p>
        
    <input type="submit" value="Submit"><b>
    <a href="{{ route('lessons.index') }}">Cancel</a>


    </form>
    
@endsection