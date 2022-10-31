@extends('layouts.master')

@section('page_title', 'Edit Task ')
@section('title', 'Task Edit')
@section('main_item', 'Task ')
@section('sub_item', 'Task Edit')
@section('page-title-breadcrumb', 'Task ')



@section('content')
    <br>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-3"></p>
                <form method="POST" action="{{ route('tasks.update' ,$task) }}" enctype="multipart/form-data" id="form-data"
                    class="form-parsley">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-weight: bold">Title *</label>
                              <textarea name="title" class="form-control" id="title" cols="30" rows="2" required>{{$task->title}}</textarea>
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-weight: bold">Description </label>
                              <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{$task->description}}</textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-weight: bold">Piority *</label>
                                <select name="piority_id"  class="form-control" id="" required>
                                    @if($task->piority_id == 1)
                                    <option value="1">Top (Only For A Task)</option>
                                    <option value="2">High</option>
                                    <option value="3">Medium</option>
                                    <option value="4"> Low</option>
                                    @elseif($task->piority_id == 2)
                                    <option value="2">High</option>
                                    <option value="1">Top (Only For A Task)</option>
                                    <option value="3">Medium</option>
                                    <option value="4"> Low</option>

                                    @elseif($task->piority_id == 3)
                                    <option value="3">Medium</option>
                                    <option value="4"> Low</option>
                                    <option value="2">High</option>
                                    <option value="1">Top (Only For A Task)</option>
                                    @else
                                    <option value="4"> Low</option>
                                    <option value="3">Medium</option>
                                    <option value="2">High</option>
                                    <option value="1">Top (Only For A Task)</option>
                                    @endif

                                </select>
                            </div>
                            @error('piority_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-weight: bold" for="date-format" style="font-weight: bold">Planed Completed Date *</label>
                                <input type="datetime-local" class="form-control mdate" value="{{$task->planned_end_date}}" placeholder="" id="mdate" name="planned_end_date"
                                    required="required">
                            </div>
                            @error('planned_end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-weight: bold">Assignee </label>
                                <select name="user_id"  class="form-control" id="">
                                    <option value="{{$task->user->id}}">{{$task->user->name}}</option>
                                    @foreach ($users as $user )
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn"> Save
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <!--end card-body-->
    </div>
    </div>
@endsection
@section('scripts')
<script>
       $(document).ready(function() {

        $(".mdate").val(new Date().toJSON().slice(0,19));
       });


</script>

@endsection
