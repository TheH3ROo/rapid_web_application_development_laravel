@extends('parent')
@section('main')
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <div align="right">
        <a href="{{ route('crud.index') }}" class="btn btn-danger">Back</a>
    </div>
    <form method="post" action="{{ route('crud.store') }}" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-4 text-right">Title</label>
            <div>
                <input type="text" name="title" class="form-control input-lg" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 font-weight-bold">Select Profile Image</label>
            <div class="col-md-8">
                <input type="file" name="image" />
            </div>
        </div>
        @auth
        <div class="form-group" style="display: none">
            <label for="creator"> Creator </label>
            <textarea class="form-control" name="creator" id="creator">{{ Auth::user()->name }}</textarea>
        </div>
        @endauth
        <div class="form-group text-center">
            <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
        </div>
    </form>
@endsection