@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Ubication
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('ubications.update', $ubication->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value={{ $ubication->name }} />
        </div>
        <div class="form-group">
          <label for="price">Latitude:</label>
          <input type="text" class="form-control" name="latitude" value={{ $ubication->latitude }} />
        </div>
        <div class="form-group">
          <label for="quantity">Longitude:</label>
          <input type="text" class="form-control" name="longitude" value={{ $ubication->longitude }} />
        </div>
        <div class="form-group">
          <label for="quantity">Description:</label>
          <input type="text" class="form-control" name="description" value={{ $ubication->description }} />
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection