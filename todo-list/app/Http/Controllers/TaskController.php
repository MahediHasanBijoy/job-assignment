<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // All tasks
        $tasks = Task::all();

        return view('task.index', ['tasks'=> $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Input validation
        $request->validate([
            'task' => 'required|max:50',
        ]);

        // Store task
        Task::create([
            'task' => $request->task,
        ]);

        return back()->with('success', 'Task created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // single task
        $task = Task::find($id);

        return view('task.edit', ['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Input validation
        $request->validate([
            'task' => 'required|max:50',
        ]);

        // Update task
        $task = Task::find($id);
        $task->update([
            'task' => $request->task,
        ]);

        return redirect()->route('task.index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete task
        Task::find($id)->delete();

        return redirect()->route('task.index')->with('success', 'Task deleted successfully');
    }
}
