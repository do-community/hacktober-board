<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LabelsTableSeeder extends Seeder
{
    static $default_labels = [
        'bug',
        'newfeature',
        'beginners',
        'php',
        'front-end',
        'documentation',
        'design',
        'devops',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$default_labels as $label) {
            DB::table('labels')->insert([
                'name' => $label,
            ]);
        }
    }
}
