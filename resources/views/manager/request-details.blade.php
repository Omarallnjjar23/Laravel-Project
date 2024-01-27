@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1 class="text-primary">Request Details</h1>
            <a href="/manager" class="btn btn-outline-primary">Back to Requests</a>
        </div>

        <div class="card mt-4 shadow bg-white">
            <div class="card-body">
                <h5 class="card-title mb-3">System Name: {{ $request->system_name }}</h5>
                <p class="card-text"><strong>Owner:</strong> {{ $request->owner->name }}</p>
                <p class="card-text"><strong>Type:</strong> {{ $request->type }}</p>
                <p class="card-text"><strong>Development Methodology:</strong> {{ $request->development_methodology }}</p>
                <p class="card-text"><strong>System Platform:</strong> {{ $request->system_platform }}</p>
                <p class="card-text"><strong>Deployment Type:</strong> {{ $request->deployment_type }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $request->description }}</p>
                <a href="{{ url("/manager/create-project/$request->id") }}" class="btn btn-primary btn-sm mt-3">Create Project</a>
            </div>
        </div>
    </div>
@endsection
