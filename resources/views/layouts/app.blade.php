<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskFlow')</title>
    <link rel="stylesheet" href="{{ asset('css/taskflow.css') }}">
</head>
<body>
<header class="topbar">
    <div class="nav-container">
        <a class="brand" href="{{ route('tasks.index') }}">
            <span class="brand-icon">✓</span> TaskFlow
        </a>
        <a href="{{ route('tasks.create') }}" class="nav-add">+ Add Task</a>
    </div>
</header>

<main class="main-container">
    @if(session('success'))
        <div class="alert success">✓ {{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">
            <strong>Please check the form:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer class="footer">Personal Task Manager • Laravel Mini Project</footer>
</body>
</html>
