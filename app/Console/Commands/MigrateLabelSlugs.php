<?php

namespace App\Console\Commands;

use App\Label;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MigrateLabelSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hacktober:update-labels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $labels = Label::all();

        foreach ($labels as $label) {
            $label->slug = Str::slug($label->name);
            $label->save();
        }

        $this->info('Labels updated.');
    }
}
