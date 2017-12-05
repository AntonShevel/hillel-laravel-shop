<?php

namespace LaravelShop\Console\Commands;

use Illuminate\Console\Command;
use Vinkla\Instagram\Instagram;

class FetchInstagramImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch images from instagram and store them locally';

    /**
     * @var Instagram
     */
    private $instagram;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $instagram = new Instagram(config('instagram.token'));
        $images = $instagram->get();

            dd($images);
        // create Model -> InstagramMedia/InstagramPhoto/etc..
        // create Migration: instagram_id, url, created_at/updated_at
        // insert only images which are not stored in the DB
        // SELECT * FROM instagram_images WHERE instagram_id in (1637793246514871962_1077834087, 1234... );

        // get images from instagram
        // save them to public/img/instagram

        $this->info('success');
    }
}
