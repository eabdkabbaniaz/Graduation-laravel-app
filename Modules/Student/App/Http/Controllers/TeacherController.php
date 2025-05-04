<?php

namespace Modules\Student\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\App\Http\Requests\CreateTeacherRequest;
use Modules\Student\App\Http\Requests\SignInRequest;
use Modules\Student\Services\TeacherService;
use Modules\Traits\ApiResponseTrait;

class TeacherController extends Controller
{
    public TeacherService $service;
    public function __construct( TeacherService $service) {
        $this->service = $service;
    }
    

    public function index(){
        return $this->service->index(); 
    }
    public function create(CreateTeacherRequest $request)
    {
        // return $request;
        try {
        
            $result= $this->service->register($request->validated());
        
               return ApiResponseTrait::successResponse("succ",$result );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 

    }

    public function edit(Request $request ,$id)
    {
        try {
            $message['id'] = $id;
            $message['data'] = $request->input();
            $result= $this->service->update($message);
               return ApiResponseTrait::successResponse("succ",$result );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
 
    }

    public function destroy($id)
    {
       
        try {
            $result=  $this->service->destroy($id);
               return ApiResponseTrait::successResponse("succ",$result );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 

    }
    public function toggleActivation($id)
    {
        
        try {
            $result=  $this->service->toggleActivation($id);

               return ApiResponseTrait::successResponse("succ",$result );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 


    }
    
    public function login(SignInRequest $request)
    {
        
        try {
            $teacher = $this->service->login($request->validated());
            if (!$teacher) {
                return ApiResponseTrait::errorResponse( 'Invalid credentials', 401);
            }
               return ApiResponseTrait::successResponse("succ",$teacher );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
     
    }

}
