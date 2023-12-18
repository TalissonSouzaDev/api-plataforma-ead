<?php

namespace Tests\Feature\Api;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use UtilisTrait;
   
    public function test_unatheticated()
    {

        $response = $this->getJson('/courses');

        $response->assertStatus(401);
    }

    public function test_get_all_courses()
    {

        $token =  $this->createTokenUser();
        $response = $this->getJson('/courses',$this->defaulHeadersToken($token));

        $response->assertStatus(200);
    }
    public function test_get_all_courses_total()
    {
        $courses=  Course::factory()->count(10)->create();
        $token =  $this->createTokenUser();
        $response = $this->getJson('/courses',$this->defaulHeadersToken($token));

        $response->assertStatus(200)
                  ->assertJsonCount(count($courses),'data');
    }

    public function test_get_single_course_unauthenticated()
    {
        $response = $this->getJson('/course/fake_id');

        $response->assertStatus(401);
    }

    public function test_get_single_course_not_found()
    {
        $token =  $this->createTokenUser();
        $response = $this->getJson("/course/fake_id",$this->defaulHeadersToken($token));

        $response->assertStatus(404);
    }

    public function test_get_course_show()
    {
        $course =  Course::factory()->create();
        $token =  $this->createTokenUser();
        $response = $this->getJson("/course/{$course->id}",$this->defaulHeadersToken($token));

        $response->assertStatus(200);
    }
}
