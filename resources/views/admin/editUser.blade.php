@extends('mainLayout')

@section('title', 'Edit User Role')

@section('page-content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit User Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="userName" class="form-label">User Name</label>
                                <input type="text" class="form-control-plaintext" id="userName" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="userEmail" class="form-label">E-mail</label>
                                <input type="email" class="form-control-plaintext" id="userEmail" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="userFullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control-plaintext" id="userFullName" value="{{ $user->userInfo->user_firstname . ' ' . $user->userInfo->user_lastname }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="userRole" class="form-label">Role</label>
                            <select class="form-select" id="userRole" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->roles->pluck('id')->contains($role->id) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('usertool') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-control-plaintext {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }
</style>
@endpush