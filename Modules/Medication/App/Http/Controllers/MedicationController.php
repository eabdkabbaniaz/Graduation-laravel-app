<?php

namespace Modules\Medication\app\Http\Controllers;

use Modules\Medication\App\Http\Requests\StoreMedicationRequest;
use Modules\Medication\App\Http\Requests\UpdateMedicationRequest;
use Illuminate\Routing\Controller;
use Modules\Medication\Services\MedicationService;


class MedicationController extends Controller
{
    protected $medicationService;

    public function __construct(MedicationService $medicationService)
    {
        $this->medicationService = $medicationService;
    }

    public function index()
    {
        return response()->json($this->medicationService->list());
    }

    public function store(StoreMedicationRequest $request)
    {
        return response()->json($this->medicationService->create($request->validated()), 201);
    }

    public function show($id)
    {
        return response()->json($this->medicationService->show($id));
    }

    public function update(StoreMedicationRequest $request, $id)
    {
        return response()->json($this->medicationService->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        $deleted = $this->medicationService->delete($id);

        if ($deleted) {
            return response()->json(['message' => "Medication deleted"]);
        } else {
            return response()->json(['message' => "Medication not found"], 404);
        }    
    }

    public function filter($systemId = null, $effectId = null)
    {
        return response()->json(
            $this->medicationService->filter($systemId, $effectId)
        );
    }

}
