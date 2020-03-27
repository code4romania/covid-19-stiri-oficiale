<?php

namespace App\Console\Commands;

use App\Decision;
use App\News;
use App\Video;
use Illuminate\Console\Command;

class RebuildSearchIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:rebuild';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuilds the search index for all models';

    protected $models = [
        Decision::class,
        News::class,
        Video::class,
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(): void
    {
        collect($this->models)
            ->each(function ($model): void {
                $this->call('scout:flush', ['model' => $model]);
                $this->call('scout:import', ['model' => $model]);
            });
    }
}
