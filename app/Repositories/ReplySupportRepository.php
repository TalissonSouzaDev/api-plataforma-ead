<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;

class ReplySupportRepository {
    use RepositoryTrait;
    protected $entity;

    public function __construct( ReplySupport $ReplySupport )
 {

        $this->entity = $ReplySupport;

    }

    public function createReplyToSupportId( string $supportid, array $data )
 {
    $support = app(Supportrepository::class)->getSupport($supportid);
        $reply =  $this->entity
        ->replies()
        ->create( [
            'description' => $data[ 'description' ],
            'user_id'=> $this->getUserAuth()->id,
            'support_id' => $support->id

        ] );

        return $reply;
    }



}