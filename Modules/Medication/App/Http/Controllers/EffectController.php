<?php

namespace Modules\Medication\app\Http\Controllers;

use Modules\Medication\App\Http\Requests\StoreEffectRequest;
use Illuminate\Routing\Controller;
use Modules\Medication\Services\EffectService;


class EffectController extends Controller
{
    protected $effectService;

    public function __construct(EffectService $effectService)
    {
        $this->effectService = $effectService;
    }

    public function index()
    {
        return response()->json($this->effectService->list());
    }

    public function store(StoreEffectRequest $request)
    {
        return response()->json($this->effectService->create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->effectService->show($id));
    }

    public function update(StoreEffectRequest $request, $id)
    {
        return response()->json($this->effectService->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        $deleted = $this->effectService->delete($id);

        if ($deleted) {
            return response()->json(['message' => "Effect deleted"]);
        } else {
            return response()->json(['message' => "Effect not found"], 404);
        }
    }
}
