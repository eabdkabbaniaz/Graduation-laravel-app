<?php

namespace Modules\Experience\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\Experience\App\Models\Session;
use Modules\Experience\Services\SessionAttendanceService;

class SessionAttendanceController extends Controller
{
    protected SessionAttendanceService $service;
    public function __construct( SessionAttendanceService $service) {
        $this->service =$service;
        
    }
    public function attend(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:sessions,code',
        ]);
        return $this->service->attend($request);
    }
    public function evaluate(Request $request)
    {
        $request->validate([
            'session_user_id' => 'required|exists:session_users,id',
            'mark' => 'required|numeric|min:0|max:100'
        ]);
        return  $this->service->evaluate($request);
    }
    

}