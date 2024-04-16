<?php

namespace App\Skills;

use App\Decorators\UserDescriptionDecorator;

class JsSkill extends UserDescriptionDecorator
{
    public function getDescription(): array
    {
        return array_merge($this->user->getDescription(), ['JavaScript']);
    }
}
