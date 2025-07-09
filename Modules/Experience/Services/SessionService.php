<?php

namespace Modules\Experience\Services;

use App\Models\helper;
use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\ExperienceSemester;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\resources\SessionResource;
use Modules\Experience\App\resources\GetSessionResource;
use Modules\Experience\Repository\SessionRepository;
use Modules\Traits\ApiResponseTrait;
use Exception;

class SessionService
{

    public function __construct(protected SessionRepository $repo)
    {
    }


    public function generateRandom($length = 10)
    {
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $all = $upper . $lower . $numbers;

        $password = '';

        $password .= $upper[random_int(0, strlen($upper) - 1)];
        $password .= $lower[random_int(0, strlen($lower) - 1)];
        $password .= $numbers[random_int(0, strlen($numbers) - 1)];

        for ($i = 3; $i < $length; $i++) {
            $password .= $all[random_int(0, strlen($all) - 1)];
        }

        return str_shuffle($password);
    }

    public function store(array $message)
    {
        try {
            $data['teacher_id'] =   auth()->user()->id; 
            $data['code'] = $this->generateRandom(5);
            // $data['experience_id']= ExperienceSemester::where([
            //     ['experience_id',$message['experience_id']],
            //     ['semester_id',$message['semester_id']]
            // ])->first()->id;
            $data['drug_ids']=$message['drug_ids'];
            $data['experience_id']=$message['experience_id'];
            $data['name']=$message['name'];
            $data['status']=$message['status'];
            $data['mark']=$message['mark'];
        //    return $data;
            $session = $this->repo->create($data);
            if(!$session){
            return ApiResponseTrait::errorResponse("wrong input");

            }
            return ApiResponseTrait::successResponse("", new SessionResource($session));
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function update($data)
    {
        try {

            $session = $this->repo->update($data);
            return ApiResponseTrait::successResponse("", new SessionResource($session));
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function destroy($session)
    {
        try {

            $this->repo->delete($session);
            return ApiResponseTrait::successResponse("", "");
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }

    }

    public function show($id)
    {
        try {

            $session = $this->repo->find($id);
            return ApiResponseTrait::successResponse("", new SessionResource($session));
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }


    }

    public function get($data)
    {
        try {

            $session = $this->repo->getSession($data);
            // return  $session;
            return ApiResponseTrait::successResponse("",  GetSessionResource::collection($session));
                } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }   
    }
    public function index($data)
    {
        try {
       $session = $this->repo->all($data);
            return ApiResponseTrait::successResponse("", SessionResource::collection($session));
          
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }   
    }

    public function getall()
    {
        try {

            $session = $this->repo->getall();
            return ApiResponseTrait::successResponse("", SessionResource::collection($session));
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }   
    }
    public function AllExperience($data)
    {
        try {

            $session = $this->repo->AllExperience($data);
            return ApiResponseTrait::successResponse("", $session);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }   
    }
    public function AllSemester()
    {
        try {

            $session = $this->repo->AllSemester();
            return ApiResponseTrait::successResponse("", $session);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }   
    }
}
