@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    @if (count($categories) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('categoryEdit', ['id' => $category->id]) }}"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('categoryDelete', ['id' => $category->id]) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt " style="color: #ff5f5f;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <span><strong>No Categories! </strong>Please create a new.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
