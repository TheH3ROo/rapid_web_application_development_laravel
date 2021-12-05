@extends("layouts.app")
@section("title") Show Article @endsection
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('articles.index')}}" class="btn btn-danger"> Back to Articles </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title"> Show Article </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title"> Title </label>
                        <input type="text" readonly name="title" class="form-control" id="title" value="@if(!empty($article)) {{$article->title}} @endif">
                    </div>
                    <div class="form-group">
                        <label for="description"> Description </label>
                        <textarea class="form-control" readonly name="description" id="description">@if(!empty($article)) {{$article->description}} @endif</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection