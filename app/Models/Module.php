<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

     // não fica auto incremental
 public $incrementing = false;
 // seta que vai ser uuid
 protected $keyType = "uuid";

 protected $fillable = [
    'name'
 ];

 public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
