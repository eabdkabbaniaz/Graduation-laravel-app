<?php

namespace Modules\Student\Repository;

use App\Models\User;
use Modules\Student\App\Models\Teacher;

class TeacherRepository implements UserRepositoryInterface
{

    public function index()
    {
        return   User::role('teacher')->with('teacher')->get();
    }
    public function create($message)
    {
        $user =  User::create($message);
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'is_active' => 1

        ]);
        $user->assignRole($message['ROLE']);
        $user['is_active'] = $teacher->is_active;
        return $user;
    }
    public function show($message) {}
    public function update($message)
    {
        $user = User::findOrFail($message['id']);
        $user->update($message['data']);
        return $user;
    }
    public function destroy($message)
    {
        return    User::destroy($message);
    }
    public function toggleActivation($teacher)
    {
        $user = Teacher::where('user_id', $teacher)->first();
        if ($user) {
            $user['is_active'] = !$user['is_active'];
            $user->save();
        }
        return $user;
    }
}
