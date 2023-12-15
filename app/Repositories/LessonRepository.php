<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Models\View;
use App\Repositories\Traits\RepositoryTrait;

class Lessonrepository {
    use RepositoryTrait;
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

    public function markLessonView(string $lessonId)
    {
        $user = $this->getUserAuth();
        $views =$user->views()->where(['lesson_id'=> $lessonId])->first();

        if($views)
        {
            return $views->update([
                'qty' => $views->qty + 1
            ]);
        }
        return $user->views()->create([
            
            'lesson_id'=> $lessonId
        ]);

    }
    
}