<?php

namespace App\Services\Skills;

class BaseUser implements Skill
{
    public function getSkills(): array
    {
        return [];
    }
}
