@extends("layouts.app")
@section("title") Articles @endsection
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="articles">
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('articles.index')}}" class="btn btn-danger"> Back to Articles </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <form action="{{route('articles.store')}}" method="POST">
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
                        <h4 class="card-title"> Create Article </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                            {!!$errors->first("title", "<span class='text-danger'>:message </span>")!!}
                        </div>
                        <div class="form-group">
                            <label for="description"> Description </label>
                            <textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
                            {!!$errors->first("description", "<span class='text-danger'>:message </span>") !!}
                        </div>
                        @auth
                        <div class="form-group" style="display: none">
                            <label for="creator"> Creator </label>
                            <textarea class="form-control" name="creator" id="creator">{{ Auth::user()->name }}</textarea>
                        </div>
                        @endauth
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