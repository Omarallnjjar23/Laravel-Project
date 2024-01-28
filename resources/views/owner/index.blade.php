@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <h1 class="text-primary">Welcome, {{ $owner->name }}</h1>
        </div>

        <div class="d-flex align-items-center justify-content-between  mt-3">
            <h2 class="mb-4 text-primary">Systems List</h2>
            <div class="d-flex align-items-center justify-content-center gap-4">
                <a href="/owner/show-requests" class=" mb-4 btn btn-outline-primary">
                    View Requests
                </a>
                {{-- <a href="owner/profile" class="mb-4 btn btn-outline-primary">View Profile</a> --}}
            </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table">
                <tr>
                    {{-- <th scope="col">ID</th> --}}
                    <th scope="col">System Name</th>
                    <th scope="col">System Version</th>
                    <th scope="col">View</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($systems->reverse() as $system)
                    <tr>
                        {{-- <td>{{ $system->id }}</td> --}}
                        <td>{{ $system->system_name }}</td>
                        <td>{{ $system->version }}</td>
                        <td>
                            <a href={{"/owner/systems/$system->id"}} class="btn btn-primary text-white btn-sm">
                                View
                            </a>
                        </td>
                        <td>
                            <a href={{"/owner/enhance-request/$system->id"}} class="btn btn-primary text-white btn-sm">
                                Enhance
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>
@endsection
