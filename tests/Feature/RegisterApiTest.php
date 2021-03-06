<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * @test
     */
    public function should_新しいユーザーを作成して返却する()
    {
        $data = [
            'name' => 'vuesplash user',
            'email' => 'dummy@email.com',
            'password' => 'test1234',
            'password_confirmation' => 'test1234',
        ];

        $response = $this->json('POST', route('register'), $data);

        $user = User::first();
        $this->assertEquals($data['name'], $user->name);
        //var_dump($response);
        echo("\n-------------\n");
        //echo($response->getStatus());
       // echo($user);
        echo("\n-------------\n");
        //echo $response->json();
        $response
            ->assertStatus(201);
            // ->assertJson(['name' => $user->name]);

    }
}