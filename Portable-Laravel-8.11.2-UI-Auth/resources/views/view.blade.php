@extends('parent')
@section('main')
    <div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('crud.index') }}" class="btn btn-danger">Back</a>
        </div>
        <br />
        <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
        <h3>Title - {{ $data->title }} </h3>
    </div>
@endsection