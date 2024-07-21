<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Developer;

class PlanningController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
        $tasks = Task::all();

        $plan = $this->planTasks($developers, $tasks);
        $totalWeeks = $this->calculateTotalWeeks($plan, $developers);

        return view('plan', compact('plan', 'totalWeeks', 'developers'));
    }

    private function planTasks($developers, $tasks)
    {
        $tasks = $tasks->map(function($task) {
            $task->workload = $task->duration * $task->difficulty;
            return $task;
        })->sortByDesc('workload');

        $plan = $developers->mapWithKeys(function ($developer) {
            return [$developer->name => collect()];
        });

        $developerWorkload = $developers->mapWithKeys(function ($developer) {
            return [$developer->name => 0];
        });

        foreach ($tasks as $task) {
            $developers = $developers->sortBy(function ($developer) use ($developerWorkload, $task) {
                return $developerWorkload[$developer->name] + $task->workload / $developer->capacity;
            });

            $developer = $developers->first();

            $plan[$developer->name]->push($task);
            $developerWorkload[$developer->name] += $task->workload / $developer->capacity;
        }

        return $plan;
    }

    private function calculateTotalWeeks($plan, $developers)
    {
        return $plan->map(function ($tasks, $developerName) use ($developers) {
            $totalWorkload = $tasks->sum('workload');
            $developer = $developers->firstWhere('name', $developerName);
            return ceil($totalWorkload / ($developer->capacity * 45));
        })->max();
    }
}
