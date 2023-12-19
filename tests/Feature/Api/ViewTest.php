<?php

namespace Tests\Feature\Api;

use App\Models\Module;
use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase {
    use UtilisTrait;

    public function test_get_make_viewed_unathenticated() {
        $response = $this->postJson( '/lesson/viewed' );
        $response->assertStatus( 401 );
    }

    public function test_get_make_viewed_error_valiador() {
        $payload = [];
        $token =  $this->createTokenUser();
        $response = $this->postJson( '/lesson/viewed',$payload, $this->defaulHeadersToken( $token ) );

        $response->assertStatus( 422 );
    }

    public function test_get_make_viewed_invalide_lesson() {
        $payload = [ 'lesson' => 'fake_lesson'];
        $token =  $this->createTokenUser();
        $response = $this->postJson( '/lesson/viewed',$payload, $this->defaulHeadersToken( $token ) );

        $response->assertStatus( 422 );
    }

    public function test_get_make_viewed() {
        $module =  Module::factory()->create();
        $lesson = Lesson::factory()->create( [ 'module_id'=> $module->id ] );
        $payload = ['lesson' => $lesson->id];
        $token =  $this->createTokenUser();
        $response = $this->postJson( '/lesson/viewed',$payload, $this->defaulHeadersToken( $token ) );

        $response->assertStatus( 200 );
    }


}
