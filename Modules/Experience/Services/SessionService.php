<?php

namespace Modules\Experience\Services;

use App\Models\helper;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\resources\SessionResource;
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

    public function store(array $data)
    {
        try {
            $data['code'] = $this->generateRandom(5);
            $session = $this->repo->create($data);
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

    public function index()
    {
        try {

            $session = $this->repo->all();
            return ApiResponseTrait::successResponse("", SessionResource::collection($session));
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }   
    }
}
