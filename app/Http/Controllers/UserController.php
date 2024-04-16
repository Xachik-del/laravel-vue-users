<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use App\Skills\GoSkill;
use App\Skills\JavaSkill;
use App\Skills\JsSkill;
use App\Skills\PhpSkill;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $skills = [PhpSkill::class, JsSkill::class, GoSkill::class, JavaSkill::class];

    public function index(): JsonResponse
    {
        $users = User::query()->orderByDesc('id')->get();

        $decoratedUsers = $users->map(function ($user){
            return [
                'name' => $user->name,
                'description' => implode(', ', $this->decorateUser($user)->getDescription())
            ];
        });

        return response()->json($decoratedUsers);
    }

    private function decorateUser(&$user)
    {
        shuffle($this->skills);
        $decoratedUser = new $this->skills[0]($user);

        foreach (array_slice($this->skills, 1) as $skill) {
            if (rand(0, 1)) {
                $decoratedUser = new $skill($decoratedUser);
            }
        }

        return $decoratedUser;
    }

    public function store(UserStoreRequest $request): JsonResponse
    {
       $user = new User();
       $user->fill($request->all());
       $user->save();

       return response()->json([
           'name' => $user->name,
           'description' => implode(', ', $this->decorateUser($user)->getDescription())
       ]);
    }
}
