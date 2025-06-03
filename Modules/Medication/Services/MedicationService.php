<?php
namespace Modules\Medication\Services;

use Modules\Medication\Repository\MedicationRepository;
use Modules\Medication\Repository\MedicationEffectRepository;
use Modules\Medication\Repository\SystemRepository;
use Modules\Medication\Repository\EffectRepository;
use Modules\Traits\ApiResponseTrait;
use Modules\Medication\App\Models\MedicationEffect;
use Illuminate\Support\Facades\DB;

class MedicationService
{
    protected $medicationRepository;
    protected $medicationEffectRepository;
    protected $systemRepository;
    protected $effectRepository;

    public function __construct(MedicationRepository $medicationRepository,MedicationEffectRepository $medicationEffectRepository,SystemRepository $systemRepository,EffectRepository $effectRepository)
    {
        $this->medicationRepository = $medicationRepository;
        $this->medicationEffectRepository = $medicationEffectRepository;
        $this->systemRepository = $systemRepository;
        $this->effectRepository = $effectRepository;

    }

    public function list()
    {
        try {
            $medications = $this->medicationRepository->all();
    
            $formatted = $medications->map(function ($med) {
                $data = $med->toArray();
    
                $data['system'] = $med->effects->system ?? null;
                $data['effect'] = $med->effects->effect ?? null;
    
                unset($data['effects']);
    
                return $data;
            });
    
            return ApiResponseTrait::successResponse("succ", $formatted)->original;
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }    

    public function create($data)
    {
        DB::beginTransaction();

        try {
            $systemExists = $this->systemRepository->exists($data['system_id']);
            $effectExists = $this->effectRepository->exists($data['effect_id']);

            if (!$systemExists || !$effectExists) {
                return ApiResponseTrait::errorResponse('system_id or effect_id not found.');
            }

            $result = $this->medicationRepository->create($data);

            $message = [
                "system_id"     => $data["system_id"],
                "effect_id"     => $data["effect_id"],
                "medication_id" => $result->id,
            ];
            $this->medicationEffectRepository->create($message);

            DB::commit();

            return ApiResponseTrait::successResponse("succ", $result)->original;

        } catch (\Throwable $e) {
            DB::rollBack();
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $med = $this->medicationRepository->find($id);

            $data = $med->toArray();
            $data['system'] = $med->effects->system ?? null;
            $data['effect'] = $med->effects->effect ?? null;

            unset($data['effects']);

            return ApiResponseTrait::successResponse("succ", $data)->original;

        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function update($id, $data)
    {      
        DB::beginTransaction();

        try {
            $systemExists = $this->systemRepository->exists($data['system_id']);
            $effectExists = $this->effectRepository->exists($data['effect_id']);

            if (!$systemExists || !$effectExists) {
                return ApiResponseTrait::errorResponse('system_id or effect_id not found.');
            }

            $result = $this->medicationRepository->update($id, $data);

            $message = [
                "system_id"     => $data["system_id"],
                "effect_id"     => $data["effect_id"],
                "medication_id" => $result->id,
            ];
            $effectRecord = $this->medicationEffectRepository->getByMedicationId($result->id);

            $effectId= null;

            if ($effectRecord) {
                $effectId = $effectRecord->id;
            }

            $this->medicationEffectRepository->update($effectId, $message);

            DB::commit();

            return ApiResponseTrait::successResponse("succ",$result )->original;

            } catch (\Throwable $e) {
           return ApiResponseTrait::errorResponse($e->getMessage());
       }  
    }

    public function delete($id)
    {
        try {
            $result = $this->medicationRepository->delete($id);
               return $result;
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           }       
    }

    public function filterBySystem($systemId)
    {
        try {
            $medications = $this->medicationRepository->getBySystem($systemId);

            $formatted = $medications->map(function ($med) {
                $data = $med->toArray();

                $data['system'] = $med->effects->system ?? null;
                $data['effect'] = $med->effects->effect ?? null;

                unset($data['effects']); // نحذف effects

                return $data;
            });

            return ApiResponseTrait::successResponse("Filtered by system", $formatted)->original;

        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function filterByEffect($effectId)
    {
        try {
            $medications = $this->medicationRepository->getByEffect($effectId);

            $formatted = $medications->map(function ($med) {
                $data = $med->toArray();

                $data['system'] = $med->effects->system ?? null;
                $data['effect'] = $med->effects->effect ?? null;

                unset($data['effects']);

                return $data;
            });

            return ApiResponseTrait::successResponse("Filtered by effect", $formatted)->original;

        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

}