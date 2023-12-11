<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplySupport extends Model {
    use HasFactory, UuidTrait;

    protected $table = 'reply_support';

    // não fica auto incremental
    public $incrementing = false;
    // seta que vai ser uuid
    protected $keyType = 'uuid';

    public $touches = ['support'];

    protected $fillable = [
        'description',
        'support_id',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function support() {
        return $this->belongsTo( Support::class );
    }
}
