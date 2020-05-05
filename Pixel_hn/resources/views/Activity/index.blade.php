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

  <a class="btn btn-primary" href="{{route('activities.create')}}">+ New activity</a>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Name</td>
          <td colspan="2">Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
        <tr>
            <td>{{$activity->id}}</td>
            <td>{{$activity->name}}</td>
            <td><a href="{{ route('activities.edit', $activity->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('activities.destroy', $activity->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection