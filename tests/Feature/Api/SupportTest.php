<?php

namespace Tests\Feature\Api;

use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupportTest extends TestCase
{
    use UtilisTrait;
    public function test_get_my_supports_unathenticated()
    {
        $response = $this->getJson('/my-supports');

        $response->assertStatus(401);
    }

    public function test_get_my_supports()
    {
        $user = $this->createUser();
        $Authorizationtoken =  [ 'Authorization' => "Bearer {$user->createToken('teste')->plainTextToken}"];
   
        Support::factory()->count(50)->create(['user_id' => $user->id]);
        Support::factory()->count(50)->create();
       
        $response = $this->getJson( "/my-supports",$Authorizationtoken);

        $response->assertStatus(200);
    }
}
