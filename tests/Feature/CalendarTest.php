<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CalendarTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_see_the_calendar_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/calendar');

        $response->assertStatus(200);
        $response->assertViewIs('calendar.index');
    }
}
