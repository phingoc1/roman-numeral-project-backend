<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesLoadsTest extends TestCase
{
    public function test_front_page_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_easy_page_loads()
    {
        $response = $this->get('/easy');

        $response->assertStatus(200);
    }

    public function test_advanced_page_loads()
    {
        $response = $this->get('/advanced');

        $response->assertStatus(200);
    }
}
