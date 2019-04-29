@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (count($users) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <th>{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->admin)
                                                <a href="{{ route('userAdmin', ['id' => $user->id]) }}">Not Admin</a>
                                            @else
                                                <a href="{{ route('userNotAdmin', ['id' => $user->id]) }}">Make Admin</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('tagEdit', ['id' => $user->id]) }}"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('tagDelete', ['id' => $user->id]) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt " style="color: #ff5f5f;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <span><strong>No Users! </strong>Please create a new.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
