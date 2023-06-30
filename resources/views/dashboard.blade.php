@extends('common')

@section('content')
<nav class="main-header navbar navbar-expand navbar-light w-100" style="margin-left:0; margin-top: -50px; border-bottom: 0;">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if($tasks)
        @if(count($tasks))
        <span class="badge badge-warning navbar-badge">
          {{ count($tasks) }}
        </span>
        @endif
        @endif
      </a>
      @if(count($tasks))
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">{{ count($tasks) }} Notifications</span>
        <div class="dropdown-divider"></div>
        @foreach($tasks as $task)
        <a href="{{ route('my-task', Auth::user()->id) }}" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> New Tasks arrived
          <span class="float-right text-muted text-sm"></span>
        </a>
        @endforeach
        @endif
    </li>
  </ul>
</nav>
<div class="col-12">
  <h3 class="h3">Welcome to Your Dashboard</h3>
</div>
@endsection