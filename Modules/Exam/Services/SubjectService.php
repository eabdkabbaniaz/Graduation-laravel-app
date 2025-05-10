<?php
namespace Modules\Exam\Services;

use Modules\Exam\Repository\SubjectRepository;
use Modules\Traits\ApiResponseTrait;
class SubjectService
{
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getAll()
    {
        try {
        
            $result=  $this->subjectRepository->all();
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }  

    }

    public function getById($id)
    {
        try {
        
            $result=   $this->subjectRepository->find($id);
        
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
    }

    public function store(array $data)
    {

        try {
        
            $result=  $this->subjectRepository->create($data);
        
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
    }

    public function update($id, array $data)
    {
        try {
        
            $result=   $this->subjectRepository->update($id, $data);
        
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
    }

    public function destroy($id)
    {
        try {
        
            $result=  $this->subjectRepository->delete($id);
        
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
    
    }
}