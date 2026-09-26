<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderByRaw("CASE WHEN status = 'Pending' THEN 0 ELSE 1 END")
            ->orderBy('due_date')
            ->get();

        $total = $tasks->count();
        $pending = $tasks->where('status', 'Pending')->count();
        $completed = $tasks->where('status', 'Completed')->count();

        return view('tasks.index', compact('tasks', 'total', 'pending', 'completed'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'required|date',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task added successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'required|date',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate(['status' => 'required|in:Pending,Completed']);

        $task->update(['status' => $request->status]);

        return redirect()->route('tasks.index')->with('success', 'Task status updated.');
    }
}
