<?php

namespace App\Services\Skills;

class JsSkill extends SkillDecorator
{
    public function getSkills(): array
    {
        return array_merge($this->user->getSkills(), ['js']);
    }
}
