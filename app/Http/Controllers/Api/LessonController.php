<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Repositories\Lessonrepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $repository;
    public function __construct(Lessonrepository $lessonrepository)
    {
        $this->repository = $lessonrepository;
        
    }

    public function index($courseid)
    {
    
        return LessonResource::collection($this->repository->getLessonByModuleId($courseid));
    }


    public function show($id)
    {
        return new LessonResource($this->repository->getLesson($id));
    }
}
