<?php

namespace App\Skills;

use App\Decorators\UserDescriptionDecorator;

class PhpSkill extends UserDescriptionDecorator
{
    public function getDescription(): array
    {
        return array_merge($this->user->getDescription(), ['PHP']);
    }
}
