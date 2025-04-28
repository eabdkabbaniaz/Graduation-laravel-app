<?php

namespace Modules\Experience\Repository;

use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\Models\UserSession;

class SessionAttendanceRepository
{

    public function findSessionByCode($code)
    {
        return Session::where('code', $code)->first();

    }
    public function exists($data)
    {
        return $exists = UserSession::where('session_id', $data['session'])
            ->where('user_id', $data['user_id'])
            ->exists();

    }
    public function store($data)
    {
        return  UserSession::create([
            'session_id' => $data['session'],
            'user_id' =>$data['user_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
    public function evaluate( $data)
    {
        UserSession::where('id', $data['session_user_id'])
        ->update(['mark' => $data['mark'], 'updated_at' => now()]);
        return response()->json(['message' => 'تم إضافة التقييم بنجاح']);
    }

}