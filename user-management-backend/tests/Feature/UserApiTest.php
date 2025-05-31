<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_user()
    {
        $data = [
            'firstName' => 'John',
            'lastName'  => 'Doe',
            'email'     => 'john@example.com',
        ];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                    'firstName' => 'John',
                    'email' => 'john@example.com',
                 ]);

        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

    /** @test */
    public function cannot_create_user_with_duplicate_email()
    {
        User::factory()->create(['email' => 'john@example.com']);

        $data = [
            'firstName' => 'Jane',
            'lastName'  => 'Doe',
            'email'     => 'john@example.com',
        ];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('email');
    }

    /** @test */
    public function can_get_all_users()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }


    /** @test */
    public function can_get_single_user()
    {
        $user = User::factory()->create();

        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['email' => $user->email]);
    }

    /** @test */
    public function can_update_user()
    {
        $user = User::factory()->create();

        $data = ['firstName' => 'UpdatedName'];

        $response = $this->putJson("/api/users/{$user->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['firstName' => 'UpdatedName']);

        $this->assertDatabaseHas('users', ['id' => $user->id, 'firstName' => 'UpdatedName']);
    }

    /** @test */
    public function can_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'User deleted successfully']);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
