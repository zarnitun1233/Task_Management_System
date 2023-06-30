@extends('common')

@section('content')
<div class="col-12">
  <h2 class="h2">Update User Form</h2>
  <form action="{{ route('user-update', $user->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" value="{{ $user->name }}">
      @if ($errors->first('name'))
      <div class="alert alert-warning mt-2">{{ $errors->first('name') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" value="{{ $user->email }}">
      @if ($errors->first('email'))
      <div class="alert alert-warning mt-2">{{ $errors->first('email') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="phone" name="phone" class="form-control" value="{{ $user->phone }}">
      @if ($errors->first('phone'))
      <div class="alert alert-warning mt-2">{{ $errors->first('phone') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="role">Role</label>
      <select name="role" class="form-control">
        <option value="0">User</option>
        <option value="1">Admin</option>
      </select>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" value="{{ old('password') }}">
      @if ($errors->first('password'))
      <div class="alert alert-warning mt-2">{{ $errors->first('password') }}</div>
      @endif
    </div>
    <input type="submit" value="Update" class="btn btn-sm btn-primary">
  </form>
</div>
@endsection