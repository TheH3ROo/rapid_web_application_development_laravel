@extends("layouts.app")
@section("title") Articles @endsection
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
        <a href="{{route('articles.create')}}" class="btn btn-success "> Add New </a>
        @endauth
    </div>
</div>
<table class="table table-striped">
    <thead>
        <th> Id </th>
        <th> Title </th>
        <th> Description </th>
        <th> Action </th>
    </thead>
    <tbody>
        @if(count($articles) > 0)
            @foreach($articles as $article)
                <tr>
                    <td> {{$article->id}} </td>
                    <td> {{$article->title}} </td>
                    <td> {{$article->description}} </td>
                    @auth
                    <td>
                        <?php if (Auth::user()->name==$article->creator || Auth::user()->role==1){?>
                            <form action="{{route('articles.destroy', $article->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('articles.edit', $article->id)}}" class="btn btn-sm btn-success"> Edit </a>
                                <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                        <?php } ?> 
                                <a href="{{route('articles.show', $article->id)}}" class="btn btn-sm btn-info"> View </a>
                            </form>
                    </td>
                    @endauth
                    @guest
                    <td>
                            @csrf
                            <a href="{{route('articles.show', $article->id)}}" class="btn btn-sm btn-info"> View </a>
                        </form>
                    </td>
                    @endguest
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
</div>
<div class="center">    
    {!! $articles->links() !!}
</div>
@endsection