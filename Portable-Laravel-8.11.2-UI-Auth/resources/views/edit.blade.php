@extends('parent')
@section('main')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <div align="right">
        <a href="{{ route('crud.index') }}" class="btn btn-danger">Back</a>
    </div>
    <br />
    <form method="post" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-4 text-right">Title</label>
            <div>
                <input type="text" name="title" value="{{ $data->title }}" class="form-control input-lg" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 font-weight-bold">Select Profile Image</label>
            <div class="col-md-8">
                <input type="file" name="image" />
                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
            </div>
        </div>
        <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
        </div>
    </form>
@endsection