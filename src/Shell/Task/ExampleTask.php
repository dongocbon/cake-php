<?php
namespace App\Shell\Task;

use Queue\Queue\Task\QueueTask;

class ExampleTask extends QueueTask
{
    public function run(array $data, int $jobId): bool
    {
        // Your job logic here
        return true;
    }
}
