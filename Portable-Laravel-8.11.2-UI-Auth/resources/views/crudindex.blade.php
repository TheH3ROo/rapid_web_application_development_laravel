@extends('parent')
@section('main')
<!--
<h1>Style-1:</h1>
<div align="right">
    <a href="{{ route('crud.create') }}" class="btn btn-primary">Add +</a>
</div>
<div class="row">
    @foreach($images as $row)
        <div class="col-md-6 col-lg-4 col-xl-3">
          <a href="{{ route('crud.show', $row->id) }}">
              <img src="{{ URL::to('/') }}/images/{{ $row->image }}"  style="width:100%" >
          </a>
          <div class="caption">
            <p><strong>Title: </strong>{{ $row->title}}</p>
          </div>
          <form action="{{ URL::route('crud.destroy',$row->id) }}" method="POST">
            <a href="{{ route('crud.show', $row->id) }}" class="btn btn-info">View </a>
            <a href="{{ route('crud.edit', $row->id) }}" class="btn btn-success">Edit </a>          
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger">Delete </button>
          </form>                
        </div>
    @endforeach
</div>
{{ $images->links('pagination::bootstrap-4') }}

<h1>Style-2:</h1>
-->
@auth
<div align="right">
    <a href="{{ route('crud.create') }}" class="btn btn-success">Add +</a>
</div>
@endauth
<table class="table table-bordered table-striped">
    <tr>
        <th width="10%">Image</th>
        <th width="30%">Title</th>
        <th width="20%">Action</th>
    </tr>
    @foreach($images as $row)
    <tr>
        <td ><a href="{{ route('crud.show', $row->id) }}"><img src="{{ URL::to('/') }}/images/{{ $row->image }}"  width="100" /></a></td>
        <td>{{ $row->title }}</td>
        <td>
        @auth
        <?php if (Auth::user()->name==$row->creator || Auth::user()->role==1){?>
        <form action="{{ URL::route('crud.destroy',$row->id) }}" method="POST">
          <a href="{{ route('crud.edit', $row->id) }}" class="btn btn-success">Edit </a>
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn btn-danger">Delete </button>
          <?php } ?>
          @endauth
          <a href="{{ route('crud.show', $row->id) }}" class="btn btn-info">View </a>
        </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $images->links('pagination::bootstrap-4') }}
@endsection

