<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_registration()
    {

        $this->postJson(route('user.register'),[
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
        ->assertCreated()
        ->json();

        $this->assertDatabaseHas('users',['name' => 'admin']);
    }

}
