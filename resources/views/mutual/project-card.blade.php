<div class="col mb-4">
    <div class="card h-100 shadow">
        {{-- <div class="card-body bg-white">
            <h5 class="card-title"><strong>{{ $project->system_name }}</strong></h5>
            <ul class="list-group list-group-flush">
            </ul>
                <li class="list-group-item">
                    <strong>Status:</strong> {{ $project->status }}.
                </li>
                <li class="list-group-item">
                    <strong>Start Date:</strong> {{ $project->start_date }}.
                </li>
                <li class="list-group-item">
                    <strong>Duration:</strong> {{ $project->duration }} days.
                </li>
                <li class="list-group-item">
                    <strong>End Date:</strong> {{ $project->end_date }}.
                </li>
                <li class="list-group-item">
                    <strong>Leader:</strong> {{ $project->leaderdeveloper->name }}.
                </li>
            </ul>
        </div> --}}
        <div class="card-body bg-white">
            <h5 ><strong>{{ $project->system_name }}</strong></h5>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Status</th>
                        <td>{{ $project->status }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Start Date</th>
                        <td>{{ $project->start_date }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Duration</th>
                        <td>{{ $project->duration }} days</td>
                    </tr>
                    <tr>
                        <th scope="row">End Date</th>
                        <td>{{ $project->end_date }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Leader</th>
                        <td>{{ $project->leaderdeveloper->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @can('isManager')
            <div class="card-footer gap-2 d-flex">
                <a href={{ "/manager/projects/$project->id" }} class="btn btn-primary">View Details</a>
                @if ($project->status == 'Completed' && $project->approved == 0)
                    <a href={{ "/manager/approve-project/$project->id" }} class="btn btn-success ">Approve</a>
                @endif
            </div>
        @endcan

        @can('isDeveloper')
            <div class="card-footer">
                <a href={{ "/developer/projects/$project->id" }} class="btn btn-primary">View Details</a>
            </div>
        @endcan
    </div>
</div>
