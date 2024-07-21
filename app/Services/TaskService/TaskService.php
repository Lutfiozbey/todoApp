<?php
  namespace App\Services\TaskService;



use App\Exceptions\TasksServiceException;
use App\Models\Task;

class TaskService
  {
    /**
     * @param $providerId
     * @return void
     * @throws TasksServiceException
     */
    public function addProvider($providerId): void
      {
          try {
              $providerService = ProviderFactory::create($providerId);
              $tasks = $providerService->fetchTasks();

              foreach ($tasks as $task) {
                  Task::updateOrCreate(
                      ['provider' => $task['provider'], 'task_id' => $task['task_id']],
                      ['difficulty' => $task['difficulty'], 'duration' => $task['duration']]
                  );
              }

          } catch (Throwable) {
              throw new TasksServiceException(message: 'InsertProviderException', code: 1000);
          }
      }

  }
