<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model {
    use HasFactory, UuidTrait;

    protected $table = 'supports';

    // não fica auto incremental
    public $incrementing = false;
    // seta que vai ser uuid
    protected $keyType = 'uuid';

    protected $fillable = [

        'status',
        'description',
        'lesson_id',
        'user_id'
    ];

    public $statusOptions = [
        'P'=> 'Pendente, Aguardando Professor',
        'A'=> 'Aguardando Aluno',
        'C'=> 'Finalizado',

    ];

    public function lesson() {
        return $this->belongsTo( Lesson::class );
    }

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function replies() {
        return $this->hasMany( ReplySupport::class );
    }
}
