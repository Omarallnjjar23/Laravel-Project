@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1 class="text-primary mb-4">System Details</h1>

        <div class="card shadow">
            <div class="card-body">
                <h2 class="card-title text-dark">{{ $system->system_name }}</h2>

                <table class="table table-bordered mt-4">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-muted">Version</th>
                            <td>{{ $system->version }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">Development Methodology</th>
                            <td>{{ $system->development_methodology }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">System Platform</th>
                            <td>{{ $system->system_platform }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">Deployment Type</th>
                            <td>{{ $system->deployment_type }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="/owner" class="btn btn-outline-primary">Back to Systems</a>
                </div>
            </div>
        </div>
    </div>
@endsection
