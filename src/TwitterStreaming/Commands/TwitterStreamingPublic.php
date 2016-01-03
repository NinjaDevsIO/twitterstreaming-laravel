<?php
namespace TwitterStreaming\Commands;

use Illuminate\Console\Command;

use TwitterStreaming\Tracker;
use TwitterStreaming\Endpoints;

class TwitterStreamingPublic extends Command
{
    protected $endpoint = 'public';

    protected $type = 'filter';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitterstreaming:public {--type=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve tweets using Public endpoint';

    /**
     * Create a new command instance.
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
    public function handle()
    {
        $this->info(sprintf('Retrieving tweets using %s endpoint', $this->endpoint));
    }
}