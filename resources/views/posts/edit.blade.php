@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form action="{{ route('postUpdate', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <h5 class="alert-heading"><strong>Veuillez corriger ces champs :</strong></h5>
                                @foreach ($errors->all() as $error)
                                    <p class="mb-0">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="postTitle" placeholder="Enter title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Description</label>
                            <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="featured" name="featured">
                                <label class="custom-file-label" for="featured">Choose photo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category_id">
                                @foreach ($categorires as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected  @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Tags</label>
                            <div class="form-check">
                                @foreach ($tags as $tag)
                                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->name . $tag->id }}" 
                                    @foreach ($post->tags as $tg)
                                        @if ($tag->id == $tg->id)
                                            checked
                                        @endif
                                    @endforeach
                                    >
                                    <label class="form-check-label mr-4" for="{{ $tag->name . $tag->id }}">{{ $tag->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
