<?php
namespace Modules\Medication\Services;

use Modules\Medication\Repository\MedicationEffectRepository;
use Modules\Traits\ApiResponseTrait;

class MedicationEffectService
{
    protected $medicationEffectRepository;

    public function __construct(MedicationEffectRepository $medicationEffectRepository)
    {
        $this->medicationEffectRepository = $medicationEffectRepository;
    }

    public function list()
    {
        try {
            $result = $this->medicationEffectRepository->all();
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }
    }

    public function create($data)
    {
        try {   
            $result = $this->medicationEffectRepository->create($data);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }    
    }

    public function show($id)
    {
        try {
            $result = $this->medicationEffectRepository->find($id);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }  
    }

    public function update($id, $data)
    {      
        try {
            $result = $this->medicationEffectRepository->update($id, $data);
                return ApiResponseTrait::successResponse("succ",$result )->original;
            } catch (\Throwable $e) {
           return ApiResponseTrait::errorResponse($e->getMessage());
       }  
    }

    public function delete($id)
    {
        try {
            $result = $this->medicationEffectRepository->delete($id);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }       
    }
}