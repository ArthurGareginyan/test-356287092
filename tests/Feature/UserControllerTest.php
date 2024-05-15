<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\UserSeeder;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Seed the database with users
        $this->seed(UserSeeder::class);
    }

    public function testUserListContainsSkills()
    {

        // Make a request to the users endpoint
        $response = $this->get('/users');

        // Check that the response is successful
        $response->assertStatus(200);

        // Check that the response contains users with skills
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'email',
                'description',
                'skills',
            ],
        ]);

        // Check that each user has a non-empty skills array
        $users = $response->json();
        foreach ($users as $user) {
            $this->assertNotEmpty($user['skills']);
        }
    }
}
