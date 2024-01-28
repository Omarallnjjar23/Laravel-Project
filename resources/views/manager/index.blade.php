@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <h1 class="text-primary">Welcome, {{ $manager->name }}</h1>
        </div>
        
        <div class="d-flex align-items-center gap-3 justify-content-between mb-4">
            <h2 class="text-primary">Requests List</h2>
            <div class="d-flex gap-3">
                <a href="manager/projects" class="btn btn-outline-primary">View Projects</a>
                {{-- <a href="manager/profile" class="btn btn-outline-primary">View Profile</a> --}}
            </div>
        </div>

        <div>
            <div class="card-body">
                <table class="table table-bordered table-hover shadow ">
                    <thead class="table-info">
                        <tr>
                            <th>Owner Name</th>
                            <th>System Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests->reverse() as $request)
                            <tr>
                                <td>{{ $request->owner->name }}</td>
                                <td>{{ $request->system_name }}</td>
                                <td>
                                    <a href={{"/manager/requests/$request->id"}} class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No requests available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
