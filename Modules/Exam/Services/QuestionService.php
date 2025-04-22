<?php
namespace Modules\Exam\Services;

use Modules\Exam\Repository\QuestionRepository;

class QuestionService
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function list()
    {
        return $this->questionRepository->all();
    }

    public function create($data)
    {
        return $this->questionRepository->create($data);
    }

    public function show($id)
    {
        return $this->questionRepository->find($id);
    }

    public function update($id, $data)
    {
        return $this->questionRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->questionRepository->delete($id);
    }
}
