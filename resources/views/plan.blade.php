<!DOCTYPE html>
<html>
<head>
    <title>To-Do Planner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Roboto', sans-serif;
        }
        .developer-card {
            background-color: #ffffff;
            border: 1px solid #007bff;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
            height: 100%;
        }
        .developer-card:hover {
            transform: translateY(-5px);
        }
        .developer-header {
            background-color: #007bff;
            color: white;
            padding: 0.5rem;
            border-radius: 0.25rem 0.25rem 0 0;
            text-align: center;
            font-weight: 700;
        }
        .developer-body {
            padding: 1rem;
        }
        .task-list {
            list-style: none;
            padding: 0;
        }
        .task-list-item {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            border-radius: 0.25rem;
            transition: background-color 0.2s;
        }
        .task-list-item:hover {
            background-color: #e2e6ea;
        }
        .total-weeks {
            margin-bottom: 2rem;
            font-weight: 700;
        }
        .title {
            text-align: center;
            color: #007bff;
            font-weight: 700;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 title">Weekly Plan</h1>
    <h2 class="mb-4 total-weeks title">Total Minimum Weeks: {{ $totalWeeks }}</h2>
    <div class="row">
        @foreach($plan as $developer => $tasks)
            <div class="col-md-4 mb-2">
                <div class="developer-card">
                    <div class="developer-header">
                        <h4 class="mb-0">{{ $developer }}</h4>
                        @php
                            $totalWorkload = $tasks->sum(function ($task) {
                                return $task->duration * $task->difficulty;
                            });
                            $developerCapacity = $developers->firstWhere('name', $developer)->capacity;
                            $estimatedHours = $totalWorkload / $developerCapacity;
                        @endphp
                        <p>Estimated Hours to Complete: {{ round($estimatedHours, 2) }} hours</p>
                    </div>
                    <div class="developer-body">
                        <p>Total Workload: {{ $totalWorkload }}</p>
                        @if($tasks->count() > 0)
                            <ul class="task-list">
                                @foreach($tasks as $task)
                                    <li class="task-list-item">
                                        Task ID: {{ $task->id }}, Difficulty: {{ $task->difficulty }}, Duration: {{ $task->duration }} hours
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No tasks assigned</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
