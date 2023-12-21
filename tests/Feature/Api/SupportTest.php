<?php

namespace Tests\Feature\Api;

use App\Models\Lesson;
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

    public function test_get_supports_unathenticated()
    {
        $response = $this->getJson('/supports');

        $response->assertStatus(401);
    }

    // public function test_get_supports()
    // {
    //     Support::factory()->count(50)->create();
           
    //     $token =  $this->createTokenUser();
    //     $response = $this->getJson( "/supports", $this->defaulHeadersToken( $token ) );
       

    //     $response->assertStatus(200)->assertJsonCount(50,'data');
    // }

    // public function test_get_supports_filter_lesson()
    // {
    //     $lesson=  Lesson::factory()->create();
    //     Support::factory()->count(10)->create(['lesson_id'=>$lesson->id]);
    //     Support::factory()->count(50)->create();

    //     $payload = ['lesson' => $lesson->id];
           
    //     $token =  $this->createTokenUser();
    //     $response = $this->Json( 'GET',"/supports",$payload, $this->defaulHeadersToken( $token ) );
       

    //     $response->assertStatus(200)->assertJsonCount(10,'data');
    // }
}
