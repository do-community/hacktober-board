<?php

namespace App\Console\Commands;

use App\Issue;
use App\Services\GithubService;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class FetchIssues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hacktober:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Issues from Github and store them on the database.';

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
    public function handle(GithubService $github)
    {
        $this->info('Fetching Issues from Github...');

        $response = $github->getIssues('hacktoberfest');

        if ($response['code'] != 200) {
            $this->error('An error ocurred.');
            exit;
        }

        $json = json_decode($response['body'], true);

        foreach ($json['items'] as $raw_issue) {
            //tries to locate existing issue with this id
            $issue = Issue::find($raw_issue['id']);

            if ($issue === null) {
                $this->info('Creating new Issue: ' . $raw_issue['title']);
                $issue = new Issue();

                //gets author
                $author = User::find($raw_issue['user']['id']);

                if ($author === null) {
                    //creates new user
                    $this->info('Creating new Author: ' . $raw_issue['user']['login']);

                    $author = new User();
                    $author->id = $raw_issue['user']['id'];
                    $author->username = $raw_issue['user']['login'];
                    $author->avatar = $raw_issue['user']['avatar_url'];

                   $author->save();
                }

                $issue->user()->associate($author);

                $issue->id = $raw_issue['id'];
                $issue->number = $raw_issue['number'];
                $issue->title = $raw_issue['title'];
                $issue->body = $raw_issue['body'];
                $issue->original_created_at = (new \DateTime($raw_issue['created_at']))->format('Y-m-d H:i:s');
                $issue->original_updated_at = (new \DateTime($raw_issue['updated_at']))->format('Y-m-d H:i:s');

                $issue->save();
            }
        }

        $this->info("Finished.");
    }
}
