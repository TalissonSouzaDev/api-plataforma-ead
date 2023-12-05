<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Resources\ModuleResource;
use App\Repositories\Modulerepository;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $repository;
    public function __construct(Modulerepository $Modulerepository)
    {
        $this->repository = $Modulerepository;
        
    }

    public function index($courseId)
    {
        
        $module = $this->repository->getModuleCourseById($courseId);
        return ModuleResource::collection($module);

    }
}
