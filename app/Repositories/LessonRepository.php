<?php

namespace App\Repositories;

use App\Models\Lesson;

class Lessonrepository {
    protected $entity;

    public function __construct(Lesson $lesson)
    {

        $this->entity = $lesson;
        
    }

    public function getLessonByModuleId(string $moduleId)
    {
        return $this->entity->where('module_id',$moduleId)->get();

    }

    public function getLesson(string $identity)
    {
        return $this->entity->findOrFail($identity);
    }
    
}