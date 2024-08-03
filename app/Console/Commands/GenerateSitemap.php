<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$postsitmap = Sitemap::create();
        SitemapGenerator::create('https://guens-education.com')->writeToFile(public_path('sitemap.xml'));
       //$postsitmap->writeToFile(public_path('sitemap.xml'));

    }
}
