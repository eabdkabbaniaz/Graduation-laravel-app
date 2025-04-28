<?php

namespace Modules\Experience\Services;

use App\Models\helper;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\resources\SessionResource;
use Modules\Experience\Repository\SessionAttendanceRepository;
use Modules\Experience\Repository\SessionRepository;
use Modules\Traits\ApiResponseTrait;
use Exception;

class SessionAttendanceService
{ 
   protected SessionAttendanceRepository $repo;
    public function __construct( SessionAttendanceRepository $repo)
    {
        $this->repo =$repo;
    }
public function attend($request){
    try {


    $user = auth()->user(); 

        $session = $this->repo->findSessionByCode($request->code);
        $data['session']=$session->id;
        $data['user_id']=$user->id;
        $exists = $this->repo->exists($data);
        if ($exists) {
            return ApiResponseTrait::errorResponse( 'تم تسجيل الحضور مسبقاً',409);
                    }
        $sessionUserId = $this->repo->store($data);


        return ApiResponseTrait::successResponse( 'تم تسجيل الحضور بنجاح',   $sessionUserId);
    } catch (\Throwable $e) {
        return ApiResponseTrait::errorResponse($e->getMessage());
    }
    }

    public function evaluate( $data)
{
    try {

     $session= $this->repo->evaluate($data);
        return ApiResponseTrait::successResponse("succ",   $session);
    } catch (\Throwable $e) {
        return ApiResponseTrait::errorResponse($e->getMessage());
    }

   
}

}