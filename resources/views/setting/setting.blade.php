@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit informations website</div>

                <div class="card-body">
                    <form action="{{ route('settingUpdate') }}" method="POST">
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
                            <label for="name">Blog name</label>
                        <input type="text" class="form-control" id="blogname" name="blogname" value="{{ $settings->blog_name }}" aria-describedby="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="name">Blog email</label>
                            <input type="text" class="form-control" id="blogemail" name="blogemail" value="{{ $settings->blog_email }}" aria-describedby="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                                <label for="name">Blog phone</label>
                                <input type="text" class="form-control" id="blogphone" name="blogphone" value="{{ $settings->blog_phone }}" aria-describedby="phone" placeholder="Enter phone">
                            </div>
                        <div class="form-group">
                            <label for="name">Blog address</label>
                            <input type="text" class="form-control" id="blogaddress" name="blogaddress" value="{{ $settings->blog_address }}" aria-describedby="address" placeholder="Enter address">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
