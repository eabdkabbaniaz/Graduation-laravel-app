<?php

namespace Modules\Medication\app\Http\Controllers;

use Modules\Medication\App\Http\Requests\StoreEffectRequest;
use Illuminate\Routing\Controller;
use Modules\Medication\Services\SystemService;


class SystemController extends Controller
{
    protected $systemService;

    public function __construct(SystemService $systemService)
    {
        $this->systemService = $systemService;
    }

    public function index()
    {
        return response()->json($this->systemService->list());
    }

    public function store(StoreEffectRequest $request)
    {
        return response()->json($this->systemService->create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->systemService->show($id));
    }

    public function update(StoreEffectRequest $request, $id)
    {
        return response()->json($this->systemService->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        $deleted = $this->systemService->delete($id);

        if ($deleted) {
            return response()->json(['message' => "System deleted"]);
        } else {
            return response()->json(['message' => "System not found"], 404);
        }
    }
}
