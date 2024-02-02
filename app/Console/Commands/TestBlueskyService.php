<?php

namespace App\Console\Commands;

use App\Services\BlueskyService;
use Bearlovescode\Bluesky\Services\RepoService;
use Bearlovescode\Bluesky\Services\ServerService;
use Illuminate\Console\Command;

use Bearlovescode\Bluesky\Models\Service\Configuration as BlueskyConfiguration;

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

    public function __construct(
        private readonly ServerService $serverService,
        private readonly RepoService $repoService
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // set up
        $tempIdentifier = 'trainsignal.app';
        $tempPassword = 'izgv-5tbl-oppv-pwxz';

        // authenticate
        $session = $this->serverService->createSession($tempIdentifier, $tempPassword);

        $this->repoService->setSession($session);


        // post a test message.

        // cleanup.
    }
}
