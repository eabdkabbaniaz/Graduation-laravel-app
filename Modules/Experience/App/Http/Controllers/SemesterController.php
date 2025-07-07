<?php
namespace Modules\Experience\App\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Experience\Services\SemesterService;
use App\Http\Controllers\Controller;
class SemesterController extends Controller
{
    protected $service;

    public function __construct(SemesterService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'boolean'
        ]);
        return $this->service->store($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'status' => 'boolean'
        ]);
        return $this->service->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
