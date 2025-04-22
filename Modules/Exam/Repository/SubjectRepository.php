<?php
namespace Modules\Exam\Repository;

use Modules\Exam\App\Models\Subject;
class SubjectRepository
{
    public function all()
    {
        return Subject::all();
    }

    public function find($id)
    {
        return Subject::findOrFail($id);
    }

    public function create(array $data)
    {
        return Subject::create($data);
    }

    public function update($id, array $data)
    {
        $subject = $this->find($id);
        $subject->update($data);
        return $subject;
    }

    public function delete($id)
    {
        $subject = $this->find($id);
        return $subject->delete();
    }
}