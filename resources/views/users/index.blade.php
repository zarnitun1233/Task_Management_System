@extends('common')

@section('content')

<div class="col-12">
  <h3 class="h3">User List Page</h3>
  <div style="text-align:right; margin-bottom: 30px; margin-top: -40px;">
    <a href="{{ route('user-create') }}" class="btn btn-sm btn-success float-end text-right">Create</a>
  </div>
  @if(Session::has('message'))
  <div class="alert alert-primary mt-2">
    {{ Session::get('message') }}
  </div>
  @endif
  <table class="table table-striped table-bordered">
    <tr>
      <th>No</th>
      <th>Name</th>
      @if(Auth::user()->id == 1)
      <th class="responsive">Email</th>
      <th class="responsive">Phone</th>
      @endif
      <th>Role</th>
      <th>Actions</th>
    </tr>
    @php
    $id = 1;
    @endphp
    @foreach($users as $user)
    <tr>
      <td>{{ $id++ }}</td>
      <td>{{ $user->name }}</td>
      @if(Auth::user()->id == 1)
      <td class="responsive">{{ $user->email }}</td>
      <td class="responsive">{{ $user->phone }}</td>
      @endif
      @if($user->role == 1)
      <td>Admin</td>
      @else <td>User</td>
      @endif

      <td>

        <a href="{{ route('user-detail', $user->id) }}" class="btn btn-sm btn-primary">More</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection