<?php
namespace App\Services\TaskService;

use App\Enums\TasksProviders;
use App\Services\TaskService\DataProviders\Provider1Service;
use App\Services\TaskService\DataProviders\Provider2Service;
use Exception;

class ProviderFactory
{
    /**
     * @throws Exception
     */
    public static function create($providerId): ProviderServiceInterface
    {
        return match ($providerId) {
            TasksProviders::PROVIDER1->value => new Provider1Service(),
            TasksProviders::PROVIDER2->value => new Provider2Service(),
            default => throw new Exception("Unsupported provider ID: $providerId"),
        };
    }
}
