<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    public function test_user_factory_creates_valid_user(): void
    {
        $user = User::factory()->make();

        $this->assertInstanceOf(User::class, $user);
        $this->assertNotEmpty($user->name, 'User name is empty');
        $this->assertNotEmpty($user->email, 'User email is empty');
    }
}
