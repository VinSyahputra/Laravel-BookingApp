<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_as_admin_can_see_admin_feature()
    {
        $user = User::factory()->make([
            'name' => 'user test',
            'username' => 'usertest9',
            'contact' => '00000000',
            'password' => bcrypt('usertest'),
            'is_admin' => 0,
        ]);


        $hasUser = $user ? true : false;
        $this->assertTrue($hasUser);

        $response = $this->actingAs($user)->get('/dashboard')->assertSeeText('Users');
        $response->assertStatus(200);
    }

    public function test_is_user_auth(){
        $user = User::factory()->make([
            'name' => 'user test',
            'username' => 'usertest',
            'contact' => '00000000',
            'password' => bcrypt('usertest'),
            'is_admin' => 0,
        ]);
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user)->get('/dashboard')->assertSeeText('Booking Room');

        // check if user is guest
        // $this->assertGuest();
    }
}
