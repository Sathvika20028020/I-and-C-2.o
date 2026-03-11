<?php

namespace App\Services;

use Illuminate\Contracts\Console\Kernel;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class QueueRunner
{
    public function runWorkerOnce()
    {
        $kernel = app(Kernel::class);
        $input = new ArrayInput([
            'command' => 'queue:work',
            '--stop-when-empty' => true, // process all and stop
        ]);
        $output = new BufferedOutput();

        $kernel->handle($input, $output);

        return $output->fetch();
    }
}