<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NewCustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nayan:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'I am Mohammad Nayan. ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $optionValue = $this->option('example');
        $this->info('Executing my custom command with option: ' . $optionValue);
    }
}
