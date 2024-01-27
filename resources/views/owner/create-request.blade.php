@extends('layouts.app')

@section('content')
    <div class="container w-50">
        <div class="card shadow bg-white">
            <div class="card-header text-primary">
                <h5 class="mb-0">Create New Request</h5>
            </div>
            <div class="card-body">
                <form action="/owner/store-request" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="systemName" class="form-label">System Name</label>
                        <input type="text" class="form-control" name="system_name" placeholder="Enter System Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="systemDescription" class="form-label">System Description</label>
                        <textarea class="form-control" name="system_description" placeholder="Enter System Description" maxlength="255" required rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="development_methodology" class="form-label">Development Methodology</label>
                        <input type="text" class="form-control" id="development_methodology" name="development_methodology" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="system_platform" class="form-label">System Platform</label>
                        <select class="form-select" id="system_platform" name="system_platform" required>
                            <option value="web-based"  selected >web-based</option>
                            <option value="mobile">mobile</option>
                            <option value="stand-alone-system"> stand-alone system</option>
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="deployment_type" class="form-label">Deployment Type</label>
                        <select class="form-select" id="deployment_type" name="deployment_type" required>
                            <option value="cloud"  selected >cloud</option>
                            <option value="on-premises">on-premises</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Create Request</button>
                </form>
            </div>
        </div>
    </div>
@endsection
