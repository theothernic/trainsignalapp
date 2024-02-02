<?php

namespace App\Jobs\Bluesky;

use App\Models\Account;
use App\Models\AccountContent;
use App\Models\Content;
use Bearlovescode\Bluesky\Models\Dtos\Repo\Post;
use Bearlovescode\Bluesky\Services\RepoService;
use Bearlovescode\Bluesky\Services\ServerService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class PublishBlueskyMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private AccountContent $accountContent
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(
        ServerService $serverService,
        RepoService $repoService
    ): void
    {
        $session = $serverService->createSession(
            $this->accountContent->account->token,
            $this->accountContent->account->secret
        );
        $currentDate = Carbon::now()->format('Y-m-d\TH:i:sp');

        $repoService->setSession($session);

        $post = new Post([
            'text' => $this->accountContent->content->body,
            'createdAt' => $currentDate
        ]);

        // post a message.
        $res = $repoService->createRecord($post);

        $this->accountContent->remote_id = $res->uri;
        $this->accountContent->published_at = $currentDate;
        $this->accountContent->save();
    }
}
