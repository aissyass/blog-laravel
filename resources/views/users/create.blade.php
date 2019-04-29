@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    <form action="{{ route('userStore') }}" method="POST">
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
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
