<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::updateOrCreate([
            'page_title' => 'about us',
            'page_slug' => 'about-us',
            'excerpt' => 'This is about us page',
            'body' => 'This is long description of about us page',
            'meta_title' => 'about us know more about us',
            'meta_keywords' => 'know more, about us, get in touch',
            'meta_description' => 'This is a about page by leting you know about us',
            'status' => true
        ]);
    }
}
