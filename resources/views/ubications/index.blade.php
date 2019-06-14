@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped table-bordered">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Latitude</td>
          <td>Longitude</td>
          <td>Description</td>
          <td colspan="5" align="center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($ubications as $ubication)
        <tr>
            <td>{{$ubication->id}}</td>
            <td>{{$ubication->name}}</td>
            <td>{{$ubication->latitude}}</td>
            <td>{{$ubication->longitude}}</td>
            <td>{{$ubication->description}}</td>
            <td align="center"><a href="{{ route('ubications.edit',$ubication->id)}}" class="btn btn-primary">Edit</a></td>
            <td align="center">
                <form action="{{ route('ubications.destroy', $ubication->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td align="center"><a href="{{ route('comentaries.index',$ubication->id)}}" class="btn btn-info">Comentaries</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection