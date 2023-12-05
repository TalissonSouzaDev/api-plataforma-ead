<?php

namespace App\Repositories;

use App\Models\Course;

class Courserepository {
    protected $entity;

    public function __construct(Course $course)
    {

        $this->entity = $course;
        
    }

    public function getAllCourses()
    {
        return $this->entity->get();

    }

    public function getCourse(string $identity)
    {
        return $this->entity->findOrFail($identity);
    }
    
}