<?php

namespace App\Console\Commands;

use App\Jobs\UpdateIssue;
use Illuminate\Console\Command;
use App\Issue;
use Illuminate\Support\Carbon;

class ScheduleUpdates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hacktober:scheduler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch Update Jobs for Issues older than 2 days';

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
    public function handle()
    {
        $this->info("Issues Fetch");
        $updates = 0;

        //$update_frequency = Carbon::

        $issues = Issue::whereDate('updated_at', '<', Carbon::yesterday()->toDateString())->get();
        //$issues = Issue::take(20)->get();

        foreach ($issues as $issue) {
            $this->info("Scheduling for update: $issue->title");
            UpdateIssue::dispatch($issue);
            $updates++;
        }

        $this->info("Finished: $updates issues scheduled for update.");
    }
}
