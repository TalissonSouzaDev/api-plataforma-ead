<?php

namespace App\Repositories;

use App\Models\Module;

class Modulerepository {
    protected $entity;

    public function __construct(Module $module)
    {

        $this->entity = $module;
        
    }

    public function getModuleCourseById(string $identity)
    {
        return $this->entity->where('course_id',$identity)->get();

    }

    public function getCourse(string $identity)
    {
        return $this->entity->where('course_id',$identity)->get();
    }
    
}