<?php

namespace Modules\Medication\app\Http\Controllers;

use Modules\Medication\App\Http\Requests\StoreEffectRequest;
use Illuminate\Routing\Controller;
use Modules\Medication\Services\MedicationEffectService;


class EffectController extends Controller
{
    protected $medicationEffectService;

    public function __construct(MedicationEffectService $medicationEffectService)
    {
        $this->medicationEffectService = $medicationEffectService;
    }

    public function index()
    {
        return response()->json($this->medicationEffectService->list());
    }

    public function store(StoreEffectRequest $request)
    {
        return response()->json($this->medicationEffectService->create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->medicationEffectService->show($id));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->medicationEffectService->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        $this->medicationEffectService->delete($id);
        return response()->json(['message' => 'deleted']);
    }
}
