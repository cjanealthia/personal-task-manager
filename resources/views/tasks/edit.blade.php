@extends('layouts.app')
@section('title', 'Edit Task | TaskFlow')

@section('content')
<div class="form-page">
    <a href="{{ route('tasks.index') }}" class="back-link">← Back to Tasks</a>
    <div class="form-card">
        <div class="form-title">
            <p class="eyebrow">EDIT TASK</p>
            <h1>Update Task</h1>
            <p>Change the task information below and save your updates.</p>
        </div>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="task_name">Task Name <span>*</span></label>
                <input type="text" id="task_name" name="task_name"
                       value="{{ old('task_name', $task->task_name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="status">Status <span>*</span></label>
                    <select id="status" name="status" required>
                        <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date <span>*</span></label>
                    <input type="date" id="due_date" name="due_date"
                           value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" required>
                </div>
            </div>

            <div class="form-buttons">
                <a href="{{ route('tasks.index') }}" class="secondary-button">Cancel</a>
                <button type="submit" class="primary-button">Update Task</button>
            </div>
        </form>
    </div>
</div>
@endsection
