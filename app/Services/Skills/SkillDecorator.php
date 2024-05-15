<?php

namespace App\Services\Skills;

abstract class SkillDecorator implements Skill
{
    protected $user;

    public function __construct(Skill $user)
    {
        $this->user = $user;
    }

    abstract public function getSkills(): array;
}
