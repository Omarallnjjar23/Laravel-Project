@extends('layouts.app') 

@section('content')
    <div class="container vh-100 w-100">

        <div class="d-flex justify-content-between align-items-center mb-4">
            @can('isManager')
                <h1 class="text-primary">View Projects</h1>
                <a href="/manager" class="btn btn-outline-primary">Back to Request</a>
            @endcan

            @can('isDeveloper')
                <h2 class="mb-4 text-primary ">Projects for {{ $developer->name }}</h2>
                <a href="/developer/profile" class="mb-4 btn btn-outline-primary">View Profile</a>
            @endcan
        </div>

        <form action={{"/$path/projects/search"}} method="GET" class="mb-3">
            <div class="input-group">
                @csrf
                <input type="text" class="form-control bg-white " placeholder="Search projects..." name="query">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="active-tab" data-bs-toggle="tab" href="#activeProjects">Active Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" data-bs-toggle="tab" href="#completedProjects">Completed Projects</a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="activeProjects">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse ($activeProjects?->reverse() as $project)
                        @include('mutual.project-card', ['project' => $project])
                    @empty
                        <div class="col">
                            <div class="alert alert-info" role="alert">
                                No projects yet.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="tab-pane fade" id="completedProjects">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse ($completedProjects->reverse() as $project)
                        @include('mutual.project-card', ['project' => $project])
                    @empty
                        <div class="col">
                            <div class="alert alert-info" role="alert">
                                No projects yet.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
