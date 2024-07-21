<?php
namespace App\Services\TaskService\DataProviders;

use App\Enums\TasksProviders;
use App\Services\TaskService\ProviderServiceInterface;
use Illuminate\Support\Facades\Http;

class Provider2Service implements ProviderServiceInterface
{
    public function fetchTasks(): array
    {
        $response = Http::get('https://api.mockfly.dev/mocks/4c0ef32a-08db-46a1-8d83-19036c611a4b/provider2');
        $tasks = $response->json();

        return array_map(function ($task) {
            return [
                'task_id' => $task['id'],
                'difficulty' => $task['zorluk'],
                'duration' => $task['sure'],
                'provider' => TasksProviders::PROVIDER2->value
            ];
        }, $tasks);
    }
}
