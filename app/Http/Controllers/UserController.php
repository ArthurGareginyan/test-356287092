<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Skills\BaseUser;
use App\Services\Skills\PhpSkill;
use App\Services\Skills\JsSkill;
use App\Services\Skills\GolangSkill;
use App\Services\Skills\JavaSkill;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $skillOptions = ['PhpSkill', 'JsSkill', 'GolangSkill', 'JavaSkill'];

        $usersWithSkills = $users->map(function ($user) use ($skillOptions) {
            $baseUser = new BaseUser();

            // Randomly apply 1 to 4 skills to each user
            $selectedSkills = array_rand(array_flip($skillOptions), rand(1, 4));
            if (is_string($selectedSkills)) {
                $selectedSkills = [$selectedSkills];
            }

            foreach ($selectedSkills as $skill) {
                $className = "App\\Services\\Skills\\$skill";
                $baseUser = new $className($baseUser);
            }

            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'description' => $user->description,
                'skills' => $baseUser->getSkills()
            ];
        });

        return response()->json($usersWithSkills);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'regex:/^\d{1,12}$|^[a-zA-Z]{1,12}$/'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->name . '@example.com',
            'password' => Hash::make('password'),
            'description' => 'Auto-generated user',
        ]);

        return response()->json($user, 201);
    }
}
