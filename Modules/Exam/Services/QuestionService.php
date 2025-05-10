<?php
namespace Modules\Exam\Services;

use Modules\Exam\Repository\QuestionRepository;
use Modules\Traits\ApiResponseTrait;

class QuestionService
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function list()
    {
        try {
        
            $result=    $this->questionRepository->all();
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }    
    }

    public function create($data)
    {

        try {
        
            $result=  $this->questionRepository->create($data);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }    
    }

    public function show($id)
    {
        try {
        
            $result=  $this->questionRepository->find($id);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }  

    }

    public function update($id, $data)
    {      try {
        
        $result=  $this->questionRepository->update($id, $data);
           return ApiResponseTrait::successResponse("succ",$result )->original;
       } catch (\Throwable $e) {
           return ApiResponseTrait::errorResponse($e->getMessage());
       }  
  
    }

    public function delete($id)
    {
        try {
        
            $result=  $this->questionRepository->delete($id);
               return ApiResponseTrait::successResponse("succ",$result )->original;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }  
      
    }
}
