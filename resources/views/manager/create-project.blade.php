@extends('layouts.app')

    @section('content')
    <div class="container bg-white p-4 card shadow">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-primary pb-2">Create Project</h1>
            <a href={{"/manager/requests/$id"}} class="btn btn-outline-primary pb-2">Back to The Request</a>
        </div>

        <form action={{"/manager/store-project/$id"}} method="POST">
            @csrf

            <div class="mb-3">
                <label for="owner" class="form-label">System Name</label>
                <input type="text" class="form-control" id="system_name" name="system_name" value="{{$request->system_name}}" required>
            </div>

            <div class="mb-3">
                <label for="owner" class="form-label">System Owner</label>
                <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{$request->owner->name}}" required>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in days)</label>
                <input type="number" class="form-control" id="duration" name="duration" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>

            {{-- <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" readonly required>
                    <option value="Ahead of Schedule">Ahead of Schedule</option>
                    <option value="On Schedule">On Schedule</option>
                    <option value="Delayed">Delayed</option>
                    <option value="Completed">Completed</option>
                </select>
            </div> --}}

            <div class="mb-3">
                <label for="developers" class="form-label">Learder Developer</label>
                <select class="form-select" id="leader_developer_id" name="leader_developer_id" required>
                    @foreach($developers as $developer)
                        <option value="{{ $developer->id }}" @if($loop->first) selected @endif>{{ $developer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 assign-container">
                <label class="form-label">Assign Developers</label>
                @foreach($developers as $developer)
                    <div class="form-check">
                        <input class="form-check-input assign-developer" type="checkbox" name="developers[]" value="{{ $developer->id }}" id="developer{{ $developer->id }}">
                        <label class="form-check-label" for="developer{{ $developer->id }}">
                            {{ $developer->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="development_methodology" class="form-label">Development Methodology</label>
                <input type="text" class="form-control" id="development_methodology" value="{{$request->development_methodology}}" name="development_methodology" required>
            </div>

            <div class="mb-3">
                <label for="system_platform" class="form-label">System Platform</label>
                <select class="form-select" id="system_platform" name="system_platform" required>
                    <option value="web-based" @if($request->system_platform === 'web-based') selected @endif>
                        Web-based
                    </option>
                    <option value="mobile" @if($request->system_platform === 'mobile') selected @endif>
                        Mobile
                    </option>
                    <option value="stand-alone-system" @if($request->system_platform === 'stand-alone-system') selected @endif>
                        Stand-alone System
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="deployment_type" class="form-label">Deployment Type</label>
                <select class="form-select" id="deployment_type" name="deployment_type" required>
                    <option value="cloud" @if($request->deployment_type === 'cloud') selected @endif>
                        cloud
                    </option>
                    <option value="on-premises" @if($request->deployment_type === 'on-premises') selected @endif>
                        on-premises
                    </option>
                </select>
            </div>


            <button type="submit" class="btn btn-success">Create Project</button>
        </form>
    </div>

    
    @endsection
    