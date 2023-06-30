@extends('common')

@section('content')
<div class="col-12">
  <h2 class="h2">Update Task Form</h2>
  <form action="{{ route('task-update', $task->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" value="{{ $task->name }}">
      @if ($errors->first('name'))
      <div class="alert alert-warning mt-2">{{ $errors->first('name') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="task_prioritization">Task Prioritization</label>
      <select name="task_prioritization" class="form-control">
        <option value="1">Yes</option>
        <option value="0">No</option>
      </select>
    </div>
    <div class="form-group">
      <label for="due_date">Due Date</label>
      <input type="date" name="due_date" class="form-control" value="{{ date('Y-m-d',strtotime($task->due_date)) }}">
      @if ($errors->first('due_date'))
      <div class="alert alert-warning mt-2">{{ $errors->first('due_date') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" class="form-control">
        <option value="0">Not Start Yet</option>
        <option value="1">Still In Progress</option>
        <option value="2">Done</option>
      </select>
    </div>
    <input type="submit" value="Update" class="btn btn-sm btn-primary">
  </form>
</div>
@endsection