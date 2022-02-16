<?php

namespace Tests\Feature;

use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetTest extends TestCase
{

    use RefreshDatabase;

    public function test_get()
    {
        $pets = Pet::factory(10)->create();

        $response = $this->json('GET', '/api/pets');

        $response->assertStatus(200)
            ->assertJsonCount(10)
            ->assertExactJson($pets->toArray());
    }

    public function test_store()
    {
        $data = [
            'name' => 'pet',
            'race' => 'race',
            'location' => 'location',
            'description' => 'description',
            'img_url' => 'test.jpg',
            'age' => '11',
            'owner' => 'owner',
        ];

        $response = $this->json('POST', '/api/pets', $data);


        $response->assertStatus(201)
            ->assertCreated()
            ->assertJsonFragment(
                [
                    'name' => $data['name'],
                    'race' => $data['race'],
                    'location' => $data['location'],
                    'description' => $data['description'],
                    'img_url' => $data['img_url'],
                    'age' => $data['age'],
                    'owner' => $data['owner'],
                ]
            )
            ->assertJson(
                [
                    'name' => $data['name'],
                    'race' => $data['race'],
                    'location' => $data['location'],
                    'description' => $data['description'],
                    'img_url' => $data['img_url'],
                    'age' => $data['age'],
                    'owner' => $data['owner'],
                ]
            );
    }
}
