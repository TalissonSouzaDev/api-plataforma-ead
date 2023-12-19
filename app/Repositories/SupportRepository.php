<?php

namespace App\Repositories;
use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;

class Supportrepository {
    use RepositoryTrait;
    protected $entity;

    public function __construct(Support $support)
    {

        $this->entity = $support;
        
    }


    public function getMySupport()
    {
        $data['user'] =  true;
        return $this->getSupports($data);

    }

    public function getSupports(array $data = [])
    {
        return $this->entity
        ->where(function($query) use ($data){
            if(isset($data['lesson']))
            {
                $query->where("lesson_id",$data['lesson']);
       
            }
            if(isset($data['status']))
            {
                $query->where("status",$data['status']);
       
            }
            if(isset($data['filter']))
            {
                $filter = $data['filter'];
                $query->where("description",'LIKE',"%{$filter}%");
       
            }

            if(isset($data['user']))
            {
                $user = $this->getUserAuth();
                $query->where('user_id',$user);
       
            }
        })
        ->orderBy('updated_at')
        ->get();

    }



    public function createNewSupport(array $data): Support
    {
       $support =  $this->getUserAuth()
        ->Support()
        ->create([
            'lesson_id' => $data['lesson'],
            'description' => $data['description'],
            'status' => $data['status']
           

        ]);

        return $support;
    }


   public function getSupport($id) : Support
   {
    
    return $this->entity->findOrFail($id);
   }
    
}