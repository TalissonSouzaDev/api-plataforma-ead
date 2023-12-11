<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;
use App\Repositories\ReplySupportRepository;
use Illuminate\Http\Request;

class ReplySupportController extends Controller {
    protected $repository;

    public function __construct( ReplySupportRepository $ReplySupportRepository ) {
        $this->repository = $ReplySupportRepository;

    }

    public function createReply( StoreReplySupport $request, $SupportId ) {
        $reply = $this->repository->createReplyToSupportId( $SupportId, $request->validate() );

        return new ReplySupportResource( $reply );

    }
}
