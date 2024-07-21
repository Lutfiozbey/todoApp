<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Developer;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $developers = [
            ['name' => 'DEV1', 'capacity' => 1],
            ['name' => 'DEV2', 'capacity' => 2],
            ['name' => 'DEV3', 'capacity' => 3],
            ['name' => 'DEV4', 'capacity' => 4],
            ['name' => 'DEV5', 'capacity' => 5],
        ];

        foreach ($developers as $developer) {
            Developer::create($developer);
        }
    }
}
