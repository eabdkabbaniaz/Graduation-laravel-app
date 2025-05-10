<?php
namespace  Modules\Exam\app\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Modules\Exam\Http\Requests\SubjectRequest;
use Modules\Exam\App\Http\Requests\SubjectRequest;
use Modules\Exam\Services\SubjectService;

class SubjectController extends Controller
{
    protected $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        return response()->json($this->subjectService->getAll());
    }

    public function store(SubjectRequest $request)
    {
        $subject = $this->subjectService->store($request->validated());
        return response()->json($subject, 201);
    }

    public function show($id)
    {
        return response()->json($this->subjectService->getById($id));
    }

    public function update(Request $request, $id)
    {
        $subject = $this->subjectService->update($id, $request->all());
        return response()->json($subject);
    }

    public function destroy($id)
    {
        $this->subjectService->destroy($id);
        return response()->json(['message' => 'Subject deleted successfully']);
    }
}
