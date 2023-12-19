<?php

namespace Tests\Feature\Api;

use App\Models\Module;
use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LessonTest extends TestCase {
    use UtilisTrait;

    public function test_get_lesson_unathenticated() {
        $response = $this->getJson( '/modules/fake_value/lessons' );

        $response->assertStatus( 401 );
    }

    public function test_get_lesson_of_modules_not_found() {
        $token =  $this->createTokenUser();
        $response = $this->getJson( '/modules/fake_value/lessons', $this->defaulHeadersToken( $token ) );

        $response->assertStatus( 200 )
        ->assertJsonCount( 0, 'data' );
    }

     public function test_get_lesson_of_modules_total() {
         $module =  Module::factory()->create();
          Lesson::factory()->count(10)->create( [ 'module_id'=> $module->id ] );
         
         $token =  $this->createTokenUser();
         $response = $this->getJson( "/modules/{$module->id}/lessons", $this->defaulHeadersToken( $token ) );

         $response->assertStatus( 200 )
         ->assertJsonCount( 10, 'data' );

     }

     public function test_get_single_lesson_unauthenticated() {

        $response = $this->getJson( "/lessons/fake_value");
        $response->assertStatus( 401 );
       

    }

    public function test_get_single_lesson_not_found() {
        $token =  $this->createTokenUser();
        $response = $this->getJson( "/lessons/fake_value",$this->defaulHeadersToken( $token ));
        $response->assertStatus( 404 );
       

    }

    public function test_get_single_lesson() {
        $module =  Module::factory()->create();
         $Lesson = Lesson::factory()->create( [ 'module_id'=> $module->id ] );
        
        $token =  $this->createTokenUser();
        $response = $this->getJson( "/lessons/{$Lesson->id}", $this->defaulHeadersToken( $token ) );

        $response->assertStatus( 200 );

    }

}
