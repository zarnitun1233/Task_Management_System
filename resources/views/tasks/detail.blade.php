@extends('common')

@section('content')


<h3 class="h3">Task Detail Page</h3>
<div class="col-12">
  <table class="table table-striped table-bordered">
    <tr>
      <th>Name</th>
      <td>{{ $task->name }}</td>
    </tr>
    <tr>
      <th>Assigned User</th>
      <td>{{ $task->sentTo->name }}</td>
    </tr>
    <tr>
      <th>Assigned By User</th>
      <td>{{ $task->sentBy->name }}</td>
    </tr>
    <tr>
      <th>Task Prioritization</th>
      @if($task->task_prioritization == 1)
      <td class="responsive alert alert-danger">Yes</td>
      @else <td class="responsive alert alert-secondary">No</td>
      @endif
    </tr>
    <tr>
      <th>Due Date</th>
      <td>{{ $task->due_date }}</td>
    </tr>
    <tr>
      <th>Status</th>
      @if($task->status == 0)
      <td class="alert alert-warning">Not Start Yet</td>
      @elseif($task->status == 1) <td class="alert alert-info">Still In Progress</td>
      @else <td class="alert alert-success">Done</td>
      @endif
    </tr>

  </table>
  <button class="btn btn-secondary" onclick="history.back()">Back</button>
  <a href="{{ route('task-update', $task->id) }}" class="btn btn-primary">Edit</a>
  <form action="{{ route('task-delete', $task->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">Delete</button>
  </form>
</div>

@endsection