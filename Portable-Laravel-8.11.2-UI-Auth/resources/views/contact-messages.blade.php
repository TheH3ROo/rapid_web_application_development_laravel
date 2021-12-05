@extends("layouts.app")
@section("title") Contact messages @endsection
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="articles">
<div class="row mb-4">
    <div class="col-xl-6">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">× </button>
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('failed'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">× </button>
                {{Session::get('failed')}}
            </div>
        @endif 
    </div>
</div>
<table class="table table-striped">
    <thead>
        <th> First name </th>
        <th> Last name </th>
        <th> Email </th>
        <th> Message </th>
    </thead>
    <tbody>
        @if(count($contacts) > 0)
            @foreach($contacts as $data)
                <tr>
                    <td> {{$data->firstname}} </td>
                    <td> {{$data->lastname}} </td>
                    <td> {{$data->email}} </td>
                    <td> {{$data->message}} </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
</div>
@endsection