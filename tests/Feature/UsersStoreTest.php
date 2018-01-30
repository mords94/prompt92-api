<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @group Integration.User.Store
     *
     * @return void
     */
    public function testUserStoreSuccess()
    {
        $user = [
            'name' => "Test User",
            'date_of_birth' => Carbon::now()->subYears(18)->toDateTimeString(),
        ];

        $response = $this->post('/api/users', $user);

        $response->assertStatus(201);

        $response->assertJsonFragment($user);

        $this->assertDatabaseHas('users', $user);
    }

    /**
     * @group Integration.User.Store
     *
     * @return void
     */
    public function testUserStoreWrongDateFormat()
    {
        $user = [
            'name' => "Test User",
            'date_of_birth' => '2345678',
        ];

        $response = $this->post('/api/users', $user);

        $response->assertStatus(422);

        $this->assertDatabaseMissing('users', $user);
    }
}
