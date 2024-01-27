@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between ">
            <h2 class="mb-4 text-primary">Requests List</h2>
            <div class="mb-4 d-flex justify-content-end mt-3">
                <a href="/owner" class="btn btn-outline-primary">View Systems</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead class="table">
                <tr>
                    <th scope="col">System Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">dev methodology</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Deployment type</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests->reverse() as $request)
                    <tr>
                        <td>{{ $request->system_name }}</td>
                        <td style="max-width: 350px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $request->description }}</td>
                        <td>{{ $request->type }}</td>
                        <td>{{ $request->development_methodology }}</td>
                        <td>{{ $request->system_platform }}</td>
                        <td>{{ $request->deployment_type }}</td>
                        <td>
                            @if($request->status == 'pending')
                                <span style="color: rgb(216, 29, 29)">Pending</span>
                            @else
                                <span class="badge p-2 bg-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            @if($request->status == 'pending')
                                <a href={{"/owner/delete-request/$request->id"}} class="btn btn-danger btn-sm">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/owner/create-request" class="btn btn-outline-primary">Create Request</a>

    </div>
@endsection
