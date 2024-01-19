<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;


    public function test_can_see_all_projects()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
    }
}
