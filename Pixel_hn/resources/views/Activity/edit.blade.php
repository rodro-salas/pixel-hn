@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit an activity
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
      <form method="post" action="{{ route('activities.update', $activity->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="activity_name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $activity->name }}"/>
          </div>
          <div class="form-group">
              <select class="form-control text-center" style="width: 100%" name="activity_statuses_id">
                <option value="">Select an option</option>
                  @foreach($activities_status as $activity_status)
                     <option @if($activity_status->id == $activity->activity_statuses_id) selected='selected' @endif value="{{$activity_status->id}}">{{$activity_status->name}}</option>
                  @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection