@extends("layouts.app")
@section("title") Show user @endsection
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('users.index')}}" class="btn btn-danger"> Back to users </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title"> Show user </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" readonly name="name" class="form-control" id="name" value="@if(!empty($user)) {{$user->name}} @endif">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input class="form-control" readonly name="email" id="email" value="@if(!empty($user)) {{$user->email}} @endif">
                    </div>
                    <div class="form-group">
                        <label for="role"> Role </label>
                        <input class="form-control" readonly name="role" id="role" value="@if(!empty($user)) {{$user->role}} @endif">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection