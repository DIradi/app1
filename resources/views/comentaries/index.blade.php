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
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Ubication ID</td>
          <td>Client ID</td>
          <td>Description</td>
          <td>Payment</td>
          <td>Email</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($comentaries as $comentary)
        <tr>
            <td>{{$comentary->id}}</td>
            <td>{{$comentary->ubication_id}}</td>
            <td>{{$comentary->client_id}}</td>
            <td>{{$comentary->description}}</td>
            <td>{{$comentary->payment}}</td>
            <td>{{$comentary->email}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <button class="btn" type="button">Back</button>
<div>
@endsection