@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (count($posts) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $post->id }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ str_limit($post->content, $limit = 200, $end = '...') }}</td>
                                        <td>
                                            <img src="{{ $post->featured }}" alt="{{ $post->title }}" class="img-thumbnail" style="height: 80px;"/>
                                        </td>
                                        <td>{{ $post->Category->name }}</td>
                                        <td>
                                            <a href="{{ route('postEdit', ['id' => $post->id]) }}"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('postDelete', ['id' => $post->id]) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt " style="color: #ff5f5f;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                    <span><strong>No Posts! </strong>Please create a new.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
