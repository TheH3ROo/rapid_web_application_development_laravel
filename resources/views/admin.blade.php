@extends("layouts.app")
@section("title") Manage users @endsection
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

    <div class="col-xl-6 text-right">
        @auth
        <a href="{{route('users.create')}}" class="btn btn-success "> Add New </a>
        @endauth
    </div>
</div>
<table class="table table-striped">
    <thead>
        <th> ID </th>
        <th> Name </th>
        <th> Email address </th>
        <th> Role </th>
        <th> Action </th>
    </thead>
    <tbody>
        @if(count($users) > 0)
            @foreach($users as $user)
                <tr>
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->role}} </td>
                    @auth
                    <td>
                        <?php if (Auth::user()->role==1){?>
                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-success"> Edit </a>
                                <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                        <?php } ?> 
                        <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-info"> View </a>
                        </form>
                    </td>
                    @endauth
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
</div>
<div class="center">    
    {!! $users->links() !!}
</div>
@endsection