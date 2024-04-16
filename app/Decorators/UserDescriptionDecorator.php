<?php

namespace App\Decorators;

use App\Contracts\UserDescriptionInterface;

abstract class UserDescriptionDecorator implements UserDescriptionInterface
{

    protected $user;

    public function __construct(UserDescriptionInterface $user)
    {
        $this->user = $user;
    }
}
