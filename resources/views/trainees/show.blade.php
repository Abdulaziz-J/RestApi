@extends('layouts.app')

@section('title', 'Trainee Details')

@section('content')
  <ul>
    <li>Name: {{ $trainees->name }}</li>
    <li>Password: {{ $trainees->password }}</li>
    <li>Title: {{ $trainees->type }}</li>
    <li>email: {{ $trainees->email }}</li>
    <li>number: {{ $trainees->number }}</li>
    <li>trainer_id: {{$trainees->trainer_id }}</li>


    
    </ul>
    <p>FIGHT FOR FITNESS!</p>
@endsection