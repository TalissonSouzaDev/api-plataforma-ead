<?php

namespace App\Repositories;
use App\Models\Support;
use App\Models\User;

class Supportrepository {
    protected $entity;

    public function __construct(Support $support)
    {

        $this->entity = $support;
        
    }

    public function getSupports(array $data = [])
    {
        return $this->getUserAuth()->Support()
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
        })->get();

    }

   private function getUserAuth() : user
   {
    //return auth()->user();
    return User::first();
   }
    
}