@extends('common')

@section('content')


<h3 class="h3">{{ $user->name }}'s Profile</h3>
<div class="col-12">
  <table class="table table-striped table-bordered">
    <!--<tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>-->
    <tr>
      <th>Name</th>
      <td>{{ $user->name }}</td>
    </tr>
    @if(Auth::user()->id == 1 or Auth::user()->id == $user->id)
    <tr>
      <th>Email</th>
      <td>{{ $user->email }}</td>
    </tr>
    <tr>
      <th>Phone</th>
      <td>{{ $user->phone }}</td>
    </tr>
    @endif
    <tr>
      <th>Role</th>
      @if($user->role == 1)
      <td>Admin</td>
      @else <td>User</td>
      @endif
    </tr>
  </table>
  <button class="btn btn-secondary" onclick="history.back()">Back</button>
  <a href="{{ route('task-create', $user->id) }}" class="btn btn-success">Assign Task</a>
  @if(Auth::user()->id == 1 or Auth::user()->id == $user->id)
  <a href="{{ route('user-update', $user->id) }}" class="btn btn-primary">Edit</a>
  <form action="{{ route('user-delete', $user->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">Delete</button>
  </form>
  @endif
</div>

@endsection