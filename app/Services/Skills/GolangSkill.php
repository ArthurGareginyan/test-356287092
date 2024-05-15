<?php

namespace App\Services\Skills;

class GolangSkill extends SkillDecorator
{
    public function getSkills(): array
    {
        return array_merge($this->user->getSkills(), ['golang']);
    }
}
