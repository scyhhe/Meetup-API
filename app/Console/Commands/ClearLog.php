<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ClearLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears the laravel log';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $disk;

    public function __construct(Filesystem $disk)
    {
        parent::__construct();

        $this->disk = $disk;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $log = $this->getLogFilePath();

        if (!$log) return 'No log file found';
        $clear_log = $this->disk->put($log, '');
        if (!$clear_log) return 'Couldn\'t clear log. It may be already empty';
        return 'Log cleared successfully';
    }

    public function getLogFilePath()
    {
        return storage_path('logs/laravel.log');
        // return $this->disk->name(storage_path('logs/laravel.log'));
    }
}
