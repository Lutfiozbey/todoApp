<?php
namespace App\Console\Commands;

use App\Services\TaskService\TaskService;
use App\Services\TodoService\TodoService;
use Illuminate\Console\Command;

class FetchTasks extends Command
{
    protected $signature = 'fetch:tasks';
    protected $description = 'Fetch tasks from the specified provider and store in the database';

    /**
     * @throws \Exception
     */
    public function handle(): void
    {
        $tasks       = config('task.tasks');
        $taskService = new TaskService();
        collect($tasks)->map(function (string $task) use ($taskService)
        {
            $taskService->addProvider($task);
        });


        $this->info('Tasks fetched and stored successfully.');
    }
}
