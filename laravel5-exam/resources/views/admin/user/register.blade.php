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
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th scope="col">№</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Usertype</th>
                            <th scope="col">Block user</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        </thead>
                        <tbody>
                            @foreach ($users_arr as $users)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->usertype }}</td>

                                <td>
                                    @if ($users->block == '1')
                                    <label style="color: #FFF;" class="btn btn-danger">Block</label>
                                    @elseif( $users->block == '0')
                                    <label style="color: #FFF;" class="btn btn-info">UnBlock</label>
                                    @endif
                                </td>
                                <td>
                                    <form action="/role-delete/{{ $users->id}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="/role-edit/{{ $users->id}}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection
