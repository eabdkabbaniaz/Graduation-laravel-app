<?php

namespace Modules\Student\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Modules\Student\App\Models\Student;

class AuthRepository
{

    public function findByUniversity_number($university_number)
    {
        $user = User::with('roles')->where('email', $university_number)->first();
        return $user;
    }


    public function changePassword($data)
    {
        return     User::whereId($data->id)->update([
            'password' => Hash::make($data->new_password)
        ]);
    }
}
