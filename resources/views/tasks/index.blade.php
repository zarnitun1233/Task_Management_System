@extends('common')

@section('content')

<div class="col-12">
  <h3 class="h3">Task List Page</h3>
  <div style="text-align:right; margin-bottom: 30px; margin-top: -40px;">
    <a href="{{ route('choose-user') }}" class="btn btn-sm btn-success float-end text-right">Create</a>
  </div>
  @if(Session::has('message'))
  <div class="alert alert-primary mt-2">
    {{ Session::get('message') }}
  </div>
  @endif
  <table class="table table-striped table-bordered">
    <tr>
      <th>No</th>
      <th>Task</th>
      <th class="responsive">Assigned User</th>
      <th class="responsive">Assigned by User</th>
      <th class="responsive">Task Prioritization</th>
      <th class="responsive">Due Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
    @php
    $id = 1;
    @endphp
    @foreach($tasks as $task)
    <tr>
      <td>{{ $id++ }}</td>
      <td>{{ $task->name }}</td>
      <td class="responsive">{{ $task->sentTo->name }}</td>
      <td class="responsive">{{ $task->sentBy->name }}</td>

      @if($task->task_prioritization == 1)
      <td class="responsive alert alert-danger">Yes</td>
      @else <td class="responsive alert alert-secondary">No</td>
      @endif
      <td class="responsive">{{ $task->due_date }}</td>
      @if($task->status == 0)
      <td class="alert alert-warning text-center">Not Start Yet</td>
      @elseif($task->status == 1) <td class="alert alert-info text-center">Still In Progress</td>
      @else <td class="alert alert-success text-center">Done</td>
      @endif
      <td>
        <a href="{{ route('task-detail', $task->id) }}" class="btn btn-sm btn-primary">More</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection