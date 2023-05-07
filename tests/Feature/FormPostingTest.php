<?php

namespace Tests\Feature;

use Tests\TestCase;

class FormPostingTest extends TestCase
{
    public function test_easy_form_submit_success()
    {
        $response = $this->call('POST', '/easy', array(
            '_token' => csrf_token(),
            'romanNumeral' => 'm'
        ));
        $this->assertEquals(200, $response->getStatusCode());
        $response->assertSeeText('Roman Numeral Letter M is 1000');
    }

    public function test_easy_form_submit_error_empty_input()
    {
        $response = $this->call('POST', '/easy', array(
            '_token' => csrf_token(),
            'romanNumeral' => ''
        ));
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_easy_form_submit_error_invalid_character()
    {
        $response = $this->call('POST', '/easy', array(
            '_token' => csrf_token(),
            'romanNumeral' => 'w'
        ));
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_easy_form_submit_error_two_characters()
    {
        $response = $this->call('POST', '/easy', array(
            '_token' => csrf_token(),
            'romanNumeral' => 'ii'
        ));
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_advanced_form_submit_success()
    {
        $response = $this->call('POST', '/advanced', array(
            '_token' => csrf_token(),
            'romanNumeral' => 'xvii'
        ));
        $this->assertEquals(200, $response->getStatusCode());
        $response->assertSeeText('Roman Numeral String XVII is 17');
    }

    public function test_advanced_form_submit_error_empty_input()
    {
        $response = $this->call('POST', '/advanced', array(
            '_token' => csrf_token(),
            'romanNumeral' => ''
        ));
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_advanced_form_submit_error_invalid_character()
    {
        $response = $this->call('POST', '/advanced', array(
            '_token' => csrf_token(),
            'romanNumeral' => 'w'
        ));
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_advanced_form_submit_error_invalid_character_order()
    {
        $response = $this->call('POST', '/advanced', array(
            '_token' => csrf_token(),
            'romanNumeral' => 'iivv'
        ));
        $this->assertEquals(302, $response->getStatusCode());
    }


}
