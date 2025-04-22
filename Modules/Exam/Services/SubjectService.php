<?php
namespace Modules\Exam\Services;

use Modules\Exam\Repository\SubjectRepository;
class SubjectService
{
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getAll()
    {
        return $this->subjectRepository->all();
    }

    public function getById($id)
    {
        return $this->subjectRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->subjectRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->subjectRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->subjectRepository->delete($id);
    }
}