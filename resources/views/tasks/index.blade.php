@extends('layouts.app')
@section('title', 'My Tasks | TaskFlow')

@section('content')
<section class="hero">
    <div>
        <p class="eyebrow">PERSONAL TASK MANAGER</p>
        <h1>My Tasks</h1>
        <p class="hero-text">Keep your school work and daily tasks organized in one simple place.</p>
    </div>
    <a href="{{ route('tasks.create') }}" class="primary-button">+ Add New Task</a>
</section>

<section class="stats-grid">
    <div class="stat-card"><div class="stat-icon blue">✓</div><div><p>Total Tasks</p><h2>{{ $total }}</h2></div></div>
    <div class="stat-card"><div class="stat-icon orange">!</div><div><p>Pending</p><h2>{{ $pending }}</h2></div></div>
    <div class="stat-card"><div class="stat-icon green">✓</div><div><p>Completed</p><h2>{{ $completed }}</h2></div></div>
</section>

<div class="section-heading">
    <div><h2>Task List</h2><p>{{ $total }} {{ $total == 1 ? 'task' : 'tasks' }} in your manager</p></div>
</div>

@if($tasks->isEmpty())
    <div class="empty-card">
        <div class="empty-icon">✓</div>
        <h3>No tasks yet</h3>
        <p>Start by adding your first task.</p>
        <a href="{{ route('tasks.create') }}" class="primary-button">Create First Task</a>
    </div>
@else
    <section class="task-list">
        @foreach($tasks as $task)
            <article class="task-card {{ $task->status === 'Completed' ? 'is-completed' : '' }}">
                <div class="task-content">
                    <div class="task-heading">
                        <h3>{{ $task->task_name }}</h3>
                        <span class="status {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                            <span class="status-dot"></span>{{ $task->status }}
                        </span>
                    </div>
                    <p class="task-description">{{ $task->description ?: 'No description provided.' }}</p>
                    <div class="task-meta">📅 Due {{ $task->due_date->format('M d, Y') }}</div>
                </div>

                <div class="task-actions">
                    <form action="{{ route('tasks.status', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @if($task->status === 'Pending')
                            <input type="hidden" name="status" value="Completed">
                            <button class="action-button complete">✓ Complete</button>
                        @else
                            <input type="hidden" name="status" value="Pending">
                            <button class="action-button pending-action">↩ Pending</button>
                        @endif
                    </form>

                    <a href="{{ route('tasks.edit', $task) }}" class="action-button edit">Edit</a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button class="action-button delete">Delete</button>
                    </form>
                </div>
            </article>
        @endforeach
    </section>
@endif
@endsection
