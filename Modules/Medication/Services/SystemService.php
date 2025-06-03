<?php
namespace Modules\Medication\Services;

use Modules\Medication\Repository\SystemRepository;
use Modules\Traits\ApiResponseTrait;

class SystemService
{
    protected $systemRepository;

    public function __construct(SystemRepository $systemRepository)
    {
        $this->systemRepository = $systemRepository;
    }

    public function list()
    {
        try {
            $result = $this->systemRepository->all();
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }
    }

    public function create($data)
    {
        try {   
            $result = $this->systemRepository->create($data);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }    
    }

    public function show($id)
    {
        try {
            $result = $this->systemRepository->find($id);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }  
    }

    public function update($id, $data)
    {      
        try {
            $result = $this->systemRepository->update($id, $data);
                return ApiResponseTrait::successResponse("succ",$result )->original;
            } catch (\Throwable $e) {
           return ApiResponseTrait::errorResponse($e->getMessage());
       }  
    }

    public function delete($id)
    {
        try {
            $result = $this->systemRepository->delete($id);
               return $result;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }       
    }
}