<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserSkillsNotEmpty()
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
        $users = $response->json();

        foreach ($users as $user) {
            $this->assertNotEmpty($user['description']);
        }
    }
}
