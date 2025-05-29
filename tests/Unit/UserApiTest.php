<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_users_list()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => ['id', 'name', 'email', 'status', 'created_at', 'updated_at']
                     ]
                 ]);
    }

    public function test_can_create_user()
    {
        $userData = User::factory()->make()->toArray();
        $userData['password'] = 'secret123'; // plaintext for sending in request

        $response = $this->postJson('/api/users', $userData);

        $response->assertStatus(201)
                 ->assertJsonFragment(['message' => 'User created.']);
        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
        ]);
    }
}
