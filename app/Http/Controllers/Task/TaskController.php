<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = User::find($id);
        return view('tasks.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'task_prioritization' => 'required',
            'due_date' => 'required',
            'status' => 'required',
        ]);
        $task = new Task();
        $task->name = $request->name;
        $task->user_id = $request->user_id;
        $task->assigned_by_user_id = Auth::user()->id;
        $task->task_prioritization = $request->task_prioritization;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('task-list')->with('message', 'Task Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task, $id)
    {
        $task = Task::find($id);
        return view('tasks.detail')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task, $id)
    {
        $task = Task::find($id);
        return view('tasks.update')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task, $id)
    {
        $request->validate([
            'name' => 'required',
            'task_prioritization' => 'required',
            'due_date' => 'required',
            'status' => 'required',
        ]);
        $task = Task::find($id);
        $task->name = $request->name;
        $task->user_id = $task->user_id;
        $task->assigned_by_user_id = Auth::user()->id;
        $task->task_prioritization = $request->task_prioritization;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('task-list')->with('message', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task-list')->with('message', 'Task Deleted Successfully');
    }

    //Listing My Task Only
    public function myTask($id)
    {
        $tasks = Task::where('user_id', '=', $id, 'and')->orderBy('task_prioritization', 'desc')->get();
        return view('tasks.myTask')->with('tasks', $tasks);
    }
}
