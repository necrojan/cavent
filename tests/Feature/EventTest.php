<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_post_an_event()
    {
        $response = $this->post('/events', [
            'title' => 'example event',
            'start' => Carbon::now(),
            'end' => Carbon::now()
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'title' => 'example event'
        ]);
    }

    /** @test */
    public function it_should_have_a_title()
    {
        $response = $this->post('/events', [
            'title' => '',
            'start' => Carbon::now(),
            'end' => Carbon::now()
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title', [
            'The title field is required.'
        ]);
    }
}
