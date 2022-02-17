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

        $this->assertCount(10, $response['pets']);

    }

    public function test_store()
    {
        $data = [
            'name' => 'pet',
            'species' => 'species',
            'status' => 'status',
            'location' => 'location',
            'description' => 'description',
            'descriptionabridged' => 'descriptionabridged',
            'img' => 'testimage.jpg',
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
                    'descriptionabridged' => $data['descriptionabridged'],
                    'img' => $data['img'],
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
                    'descriptionabridged' => $data['descriptionabridged'],
                    'img' => $data['img'],
                    'age' => $data['age'],
                    'owner' => $data['owner'],
                    'contact' => $data['contact'],
                ]
            );

    }

}
