<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {
    use HasFactory, UuidTrait;

    // não fica auto incremental
    public $incrementing = false;
    // seta que vai ser uuid
    protected $keyType = 'uuid';

    protected $fillable = [
        'name',
        'url',
        'description',
        'video',
        'module_id'
    ];

    public function module() {
        return $this->belongsTo( Module::class );
    }

    public function Support() {
        return $this->hasMany( Support::class );
    }
}
