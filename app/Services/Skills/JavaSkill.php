<?php

namespace App\Services\Skills;

class JavaSkill extends SkillDecorator
{
    public function getSkills(): array
    {
        return array_merge($this->user->getSkills(), ['java']);
    }
}
