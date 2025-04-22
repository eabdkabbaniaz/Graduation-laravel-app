<?php
namespace Modules\Exam\app\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Exam\App\Http\Requests\StoreQuestionRequest;
use Modules\Exam\App\Http\Requests\UpdateQuestionRequest;
use Modules\Exam\Services\QuestionService;

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function index()
    {
        return response()->json($this->questionService->list());
    }

    public function store(StoreQuestionRequest $request)
    {
        return response()->json($this->questionService->create($request->validated()), 201);
    }

    public function show($id)
    {
        return response()->json($this->questionService->show($id));
    }

    public function update(UpdateQuestionRequest $request, $id)
    {
        return response()->json($this->questionService->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        $this->questionService->delete($id);
        return response()->json(['message' => 'Question deleted']);
    }
}
