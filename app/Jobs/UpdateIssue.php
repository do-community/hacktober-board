<?php

namespace App\Jobs;

use App\Issue;
use App\Services\GithubService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class UpdateIssue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var  Issue */
    protected $issue;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Issue $issue)
    {
        $this->issue = $issue;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(GithubService $github)
    {
        $issue_url = 'https://api.github.com/repos/' . $this->issue->project->full_name . '/issues/' . $this->issue->number;
        $response = $github->getRaw($issue_url);

        if ($response['code'] == 200) {
            $new_data = json_decode($response['body'], true);

            $this->issue->title = $new_data['title'];
            $this->issue->body = $new_data['body'];

            $this->issue->original_updated_at = (new \DateTime($new_data['updated_at']))
                ->format('Y-m-d H:i:s');
            $this->issue->updated_at = Carbon::now();

            if ($new_data['state'] == 'closed') {
                $this->issue->closed = true;
                $this->issue->closed_at = (new \DateTime($new_data['closed_at']))
                    ->format('Y-m-d H:i:s');
            }

            $this->issue->save();
        }
    }
}
