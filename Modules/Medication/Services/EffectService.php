<?php
namespace Modules\Medication\Services;

use Modules\Medication\Repository\EffectRepository;
use Modules\Traits\ApiResponseTrait;

class EffectService
{
    protected $effectRepository;

    public function __construct(EffectRepository $effectRepository)
    {
        $this->effectRepository = $effectRepository;
    }

    public function list()
    {
        try {
            $result = $this->effectRepository->all();
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }
    }

    public function create($data)
    {
        try {   
            $result = $this->effectRepository->create($data);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }    
    }

    public function show($id)
    {
        try {
            $result = $this->effectRepository->find($id);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }  
    }

    public function update($id, $data)
    {      
        try {
            $result = $this->effectRepository->update($id, $data);
                return ApiResponseTrait::successResponse("succ",$result )->original;
            } catch (\Throwable $e) {
           return ApiResponseTrait::errorResponse($e->getMessage());
       }  
    }

    public function delete($id)
    {
        try {
            $result = $this->effectRepository->delete($id);
               return $result;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }       
    }
}