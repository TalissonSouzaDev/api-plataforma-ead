<?php

namespace Tests\Feature\Api;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModuleTest extends TestCase {
    use UtilisTrait;

    public function test_get_modules_unathenticated() {
        $response = $this->getJson( '/course/fake_value/modules' );

        $response->assertStatus( 401 );
    }

    public function test_get_modules_course_not_found() {
        $token =  $this->createTokenUser();
        $response = $this->getJson( '/course/fake_value/modules', $this->defaulHeadersToken( $token ) );

        $response->assertStatus( 404 )
        ->assertJsonCount( 0, 'data' );
    }

    public function test_get_module_course() {
        $course =  Course::factory()->create();
         Module::factory()->count(10)->create( [ 'course_id'=> $course->id ] );
         
        $token =  $this->createTokenUser();
        $response = $this->getJson( "/course/{$course->id}/modules", $this->defaulHeadersToken( $token ) );

        $response->assertStatus( 200 )
        ->assertJsonCount( 10, 'data' );

    }

}
