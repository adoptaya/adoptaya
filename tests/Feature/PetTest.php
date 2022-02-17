<?php

namespace Tests\Feature;

use File;
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

        $response->assertStatus(200);

        $petsCount = count($response['pets']);

        $response->assertTrue(10 === $petsCount);

        // $response->assertCount(10);
            // ->assertExactArray($pets->toArray());
    }

    public function test_store()
    {
        $data = [
            'name' => 'pet',
            'species' => 'species',
            'status' => 'status',
            'location' => 'location',
            'description' => 'description',
            'description_abridged' => 'description_abridged',
            'img_url' => 'tests\images\download.jpg',
            'age' => '11',
            'owner' => 'owner',
            'contact' => '999999999',
        ];

        $response = $this->json('POST', '/api/pets', $data);

        $response->assertStatus(201)
            ->assertCreated()
            ->assertJsonFragment(
                [
                    'name' => $data['name'],
                    'species' => $data['species'],
                    'status' => $data['status'],
                    'location' => $data['location'],
                    'description' => $data['description'],
                    'description_abridged' => $data['description_abridged'],
                    'img_url' => $data['img_url'],
                    'age' => $data['age'],
                    'owner' => $data['owner'],
                ]
            )
            ->assertJson(
                [
                    'name' => $data['name'],
                    'species' => $data['species'],
                    'status' => $data['status'],
                    'location' => $data['location'],
                    'description' => $data['description'],
                    'description_abridged' => $data['description_abridged'],
                    'img_url' => $data['img_url'],
                    'age' => $data['age'],
                    'owner' => $data['owner'],
                    'contact' => $data['contact'],
                ]
            );
    }
}
