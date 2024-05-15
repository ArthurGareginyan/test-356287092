<?php

namespace App\Services\Skills;

class PhpSkill extends SkillDecorator
{
    public function getSkills(): array
    {
        return array_merge($this->user->getSkills(), ['php']);
    }
}
