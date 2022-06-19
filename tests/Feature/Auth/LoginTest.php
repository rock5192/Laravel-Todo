<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
use RefreshDatabase;

public function test_user_can_login_using_email_and_password()
{

    $user = User::factory()->create();

    $response = $this->postJson(route('user.login'),
        [
       'email' => $user->email,
       'password' => 'password',
        ])
    ->assertOk();

    $this->assertArrayHasKey('token',$response->json());

}

public function test_if_user_email_is_not_matched_return_error()
{
    $this->withExceptionHandling();

//        $user = User::factory()->create();

    $this->postJson(route('user.login'),[
        'email' => 'admin@gmail.com',
        'password' => 'random'
    ])->assertUnauthorized();

}

public function test_if_user_password_is_not_matched_return_error()
{
    $this->withExceptionHandling();

    $user= User::factory()->create();

    $this->postJson(route('user.login'),[
        'email' => $user->email,
        'password' => 'random'
    ])->assertUnauthorized();
}
}
