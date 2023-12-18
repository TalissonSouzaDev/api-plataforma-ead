<?php

namespace Tests\Feature\Api;

use App\Models\User;

trait UtilisTrait
{
    public function createTokenUser()
    {
        $user =  User::factory()->create();
        $token =  $user->createToken('teste')->plainTextToken;
        return $token;
    }


    public function defaulHeadersToken($token)
    {
        return
        [
            'Authorization' => "Bearer {$token}",
        ];
    }
}