<?php

namespace App\Console\Commands;


use App\Jobs\Bluesky\PublishBlueskyMessage;
use App\Models\AccountContent;
use Illuminate\Console\Command;


class TestBlueskyService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:bluesky';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $message = AccountContent::first();

        PublishBlueskyMessage::dispatch($message);
    }
}
