@extends('layouts.index')
@section('title')
Registered Roles
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registered Roles</h4>
            </div>
            <div class="card-body">
                <h4>Edit Role for Registered User</h4>
                <h5>
                    @if ($users->block == '1')
                    <label style="color: #FFF;" class="btn btn-danger">Banned</label>
                    @elseif( $users->block == '0')
                    <label style="color: #FFF;" class="btn btn-info">No Banned</label>
                    @endif

                </h5>
                <form action="/role-register-update/{{ $users->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Username</label>
                        <input type="text" name="username" value="{{ $users->name }}" class="form-control" id="recipient-name">

                    </div>
                    <div class="mb-3">
                        <label for="">Give Role</label>
                        <select name="usertype" id="country-dropdown" class="form-control" style="margin-bottom: 1rem;">
                            <option value="">Role~</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Block user or Unblock user</label>
                        <select name="block" id="country-dropdown" class="form-control" style="margin-bottom: 1rem;">
                            <option value="">Status</option>
                            <option value="1">Block</option>
                            <option value="0">Unblock</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/role-register" class="btn btn-danger">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection
