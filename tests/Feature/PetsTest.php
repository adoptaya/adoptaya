<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PetsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_index_masterclass()
    {
        // Given
        $masterclass = User::all();

        // When
        $response = $this->get(route('welcome', $masterclass->toArray()));

        // Then
        $response->assertStatus(200)
                 ->assertViewIs('welcome');
    }
}
