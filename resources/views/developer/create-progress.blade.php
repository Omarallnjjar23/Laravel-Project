
@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow card p-4">
        <h2 class="text-primary">Create Progress for {{ $project->system_name }}</h2>

        <form action={{"/developer/projects/$project->id/progress/store"}} method="post">
            @csrf

            <div class="mb-3">
                <label for="progress_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="progress_date" name="progress_date" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" maxlength="100" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Ahead of Schedule">Ahead of Schedule</option>
                    <option value="On Schedule">On Schedule</option>
                    <option value="Delayed">Delayed</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Add Progress</button>
        </form>
    </div>
@endsection
