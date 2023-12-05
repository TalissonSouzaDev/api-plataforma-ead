<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory,UuidTrait;

 // não fica auto incremental
 public $incrementing = false;
 // seta que vai ser uuid
 protected $keyType = "uuid";

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function module()
    {
        return $this->hasMany(Module::class);
    }
}
