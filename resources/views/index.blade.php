@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 style="font-family:'Times New Roman', Times, serif;font-size:80px; color:rgb(58, 58, 58);" >Welcome to The Project Management System</h1>
        <p class="mt-5">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Get Started</a>
        </p>
    </div>
@endsection
