<?php

namespace App\Console\Commands;

use App\Issue;
use App\Label;
use App\Project;
use App\Services\GithubService;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class FetchIssues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hacktober:fetch {label?} {--L|lang=} {--S|search=} {--P|page=}';

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
        $label = $this->argument('label');
        $language = $this->option('lang');
        $search = $this->option('search');
        $page = $this->option('page');

        $this->info("Fetching Issues from Github...");

        $response = $github->getIssues($search, $label, $language, $page);

        if ($response['code'] != 200) {
            $this->error('An error ocurred: ' . $response['body']);
            exit;
        }

        $json = json_decode($response['body'], true);

        $this->info("Total items received: " . count($json['items']));

        foreach ($json['items'] as $raw_issue) {
            //tries to locate existing issue with this id
            $issue = Issue::find($raw_issue['id']);

            if ($issue === null) {
                $this->info('Creating new Issue: ' . $raw_issue['title']);
                $issue = new Issue();

                /************************************
                 * ISSUE AUTHOR
                 ************************************/
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

                /******************************************
                 * ISSUE PROJECT
                 ******************************************/
                $repository_url = $raw_issue['repository_url'];

                $parsedUrl = parse_url($repository_url);
                $project_name = str_replace('/repos/', '', $parsedUrl['path']);

                //check if project already exists
                $project = Project::where('full_name', $project_name)->first();

                if ($project === null) {
                    //creates new Project
                    $this->info('Creating new Project: ' . $project_name);

                    $project_info = $github->getRaw($repository_url);

                    if ($project_info['code'] == 200) {
                        $project = new Project();
                        $raw_project = json_decode($project_info['body'], true);

                        $project->id = $raw_project['id'];
                        $project->name = $raw_project['name'];
                        $project->description = $raw_project['description'];
                        $project->language = $raw_project['language'];
                        $project->html_url = $raw_project['html_url'];
                        $project->full_name = $raw_project['full_name'];
                        $project->stars = $raw_project['stargazers_count'];

                        $project->save();
                    } else {
                        $this->error('Error fetching project info: ' . $project_info['body']);
                        exit;
                    }
                } else {
                    $this->info('Using Existing Project: ' . $project_name);
                }

                $issue->project()->associate($project);

                /******************************************
                 * ISSUE CONTENT
                 *****************************************/
                $issue->id = $raw_issue['id'];
                $issue->number = $raw_issue['number'];
                $issue->html_url = $raw_issue['html_url'];
                $issue->title = $raw_issue['title'];
                $issue->body = $raw_issue['body'];
                $issue->project_language = $project instanceof Project ? $project->language : null;
                $issue->original_created_at = (new \DateTime($raw_issue['created_at']))->format('Y-m-d H:i:s');
                $issue->original_updated_at = (new \DateTime($raw_issue['updated_at']))->format('Y-m-d H:i:s');
                $issue->save();

                /******************************************
                 * ISSUE LABELS
                 *****************************************/
                $issue_labels = [];
                foreach ($raw_issue['labels'] as $raw_label) {
                    $label_slug = Str::slug($raw_label['name']);

                    $label = Label::where('slug', $label_slug)->first();

                    if ($label === null) {
                        //creates new label
                        $this->info('Creating new Label: ' . $raw_label['name']);

                        $label = new Label();
                        $label->name = $raw_label['name'];
                        $label->slug = $label_slug;
                        $label->save();
                    }

                    $issue_labels[] = $label->id;
                }


                $issue->labels()->sync($issue_labels);
            } else {
                $this->info('Skipping already imported issue: '  . $issue->title);
            }
        }

        $this->info("Finished.");
    }
}
