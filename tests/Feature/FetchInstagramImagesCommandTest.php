<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Log;
use Vinkla\Instagram\Instagram;

class FetchInstagramImagesCommandTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testCommand()
    {
        $file = file_get_contents('InstagramImages.txt');
        $file = json_decode($file);

        $this->app->singleton(Instagram::class, function() use($file){
            $instagram = $this->createMock(Instagram::class);
            $instagram
                ->expects($this->once())
                ->method('get')
                ->willReturn( $file );

                return $instagram;
        });


       

        $this->artisan('instagram:fetch');

        foreach ($file as $f) {
            $this->assertDatabaseHas('instagram_images', [
                'instagram_id' => $f->id
                        
            ]);
        }
        
    }
}
