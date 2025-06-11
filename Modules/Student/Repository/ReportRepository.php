<?php

namespace Modules\Student\Repository;

use App\Models\User;
use Modules\Experience\App\Models\UserSession;


class ReportRepository
{
    public function index($message)
    {
        return   User::with('sessionsReport')->where('id', $message)->get();
    }
    public function create($message)
    {

        $student_session_report =  UserSession::create($message);
        return $student_session_report;
    }
    public function show($message)
    {
        return     UserSession::where('user_id', $message['user_id'])
            ->where('session_id', $message['session_id'])
            ->first();
    }
}
