@extends('layouts.app')

@section('content')
    <div class="container mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-4 text-primary">Project Details</h1>
            <a href={{"/$path/projects"}} class="btn btn-outline-primary mb-4">Back to Projects</a>
        </div>

        <div class="card shadow bg-white">
            <div class="card-body">
                <h2 class="card-title">{{ $project->system_name }}</h2>

                <table class="table table-bordered mt-4">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-muted">Owner</th>
                            <td>{{ $project->owner_name }}</td>
                        <tr>
                            <th scope="row" class="text-muted">Start Date</th>
                            <td>{{ $project->start_date }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">Duration</th>
                            <td>{{ $project->duration }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">End Date</th>
                            <td>{{ $project->end_date }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">Status</th>
                            <td>{{ $project->status }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">Development Methodology</th>
                            <td>{{ $project->development_methodology }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">System Platform</th>
                            <td>{{ $project->system_platform }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-muted">Deployment Type</th>
                            <td>{{ $project->deployment_type }}</td>
                        </tr>
                    </tbody>
                </table>

                <h3 class="mt-4">Developers</h3>
                <ul class="list-group">
                    @forelse ($project->developers as $developer)
                        <li class="list-group-item">{{ $developer->name }}</li>
                    @empty
                        <li class="list-group-item text-danger">No developers have been assigned yet</li>
                    @endforelse
                </ul>

                <div class="mt-4 d-flex gap-2">
                    <a href={{ "/$path/projects/{$project->id}/progress" }} class="btn btn-outline-primary">Progress</a>
                    @can('isManager')
                        @if($project->status != 'Completed')
                            <a href={{ "/manager/projects/{$project->id}/edit" }} class="btn btn-primary ml-3">Edit Project</a>
                        @endif
                    @endcan
                </div>

            </div>
        </div>
    </div>
@endsection
