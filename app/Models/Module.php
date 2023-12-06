<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory,UuidTrait;

     // não fica auto incremental
 public $incrementing = false;
 // seta que vai ser uuid
 protected $keyType = "uuid";

 protected $fillable = [
    'name',
    'course_id'
 ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
