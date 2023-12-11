<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Requests\StoreSupport;
use App\Http\Resources\ReplySupportResource;
use App\Http\Resources\SupportResource;
use App\Repositories\Supportrepository;
use Illuminate\Http\Request;

class SupportController extends Controller {
    protected $repository;

    public function __construct( Supportrepository $supportrepository ) {
        $this->repository = $supportrepository;

    }

    public function index(Request $request) {

        return SupportResource::collection( $this->repository->getSupports( $request->all() ) );
    }

    public function store( StoreSupport $request ) {
        $support = $this->repository->createNewSupport( $request->validated() );

        return new SupportResource( $support );
    }


    public function mySupports(Request $request) {

        return SupportResource::collection( $this->repository->getMySupport( $request->all() ) );
    }


}
