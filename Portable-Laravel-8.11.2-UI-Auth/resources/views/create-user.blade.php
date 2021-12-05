@extends("layouts.app")
@section("title") Users @endsection
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="articles">
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('users.index')}}" class="btn btn-danger"> Back to users </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="card shadow">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">× </button>
                            {{Session::get('success')}}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">× </button>
                            {{Session::get('failed')}}
                        </div>
                    @endif
                    <div class="card-header">
                        <h4 class="card-title"> Create User </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Name </label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                            {!!$errors->first("name", "<span class='text-danger'>:message </span>")!!}
                        </div>
                        <div class="form-group">
                            <label for="email"> Email address </label>
                            <input class="form-control" name="email" id="email" value="{{old('email')}}">
                            {!!$errors->first("email", "<span class='text-danger'>:message </span>") !!}
                        </div>
                        <div class="form-group">
                            <label for="role"> Role </label>
                            <input class="form-control" name="role" id="role"value="{{old('role')}}">
                            {!!$errors->first("role", "<span class='text-danger'>:message </span>") !!}
                        </div>
                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" class="form-control" name="password" id="password"value="{{old('password')}}">
                            {!!$errors->first("password", "<span class='text-danger'>:message </span>") !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection