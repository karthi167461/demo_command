<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerSaveTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->artisan('game:import')
         ->expectsQuestion('Enter A Teams players:', '6,7,8,9,10')
         ->expectsQuestion('Enter B Teams players:', '1,2,3,4,5')
         ->expectsOutput('Added Successfully')
         ->assertExitCode(0);
    }
}
