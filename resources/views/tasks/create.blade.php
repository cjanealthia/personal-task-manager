@extends('layouts.app')
@section('title', 'Add Task | TaskFlow')

@section('content')
<div class="form-page">
    <a href="{{ route('tasks.index') }}" class="back-link">← Back to Tasks</a>
    <div class="form-card">
        <div class="form-title">
            <p class="eyebrow">NEW TASK</p>
            <h1>Add a Task</h1>
            <p>Create a task and keep track of its deadline and status.</p>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="task_name">Task Name <span>*</span></label>
                <input type="text" id="task_name" name="task_name"
                       value="{{ old('task_name') }}"
                       placeholder="Example: Finish Laravel project" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5"
                          placeholder="Add some details about this task...">{{ old('description') }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="status">Status <span>*</span></label>
                    <select id="status" name="status" required>
                        <option value="Pending" {{ old('status', 'Pending') === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Completed" {{ old('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date <span>*</span></label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}" required>
                </div>
            </div>

            <div class="form-buttons">
                <a href="{{ route('tasks.index') }}" class="secondary-button">Cancel</a>
                <button type="submit" class="primary-button">Save Task</button>
            </div>
        </form>
    </div>
</div>
@endsection
