<?php 
namespace Modules\Experience\Services;

use Modules\Experience\Repository\SemesterRepository;

class SemesterService
{
    protected SemesterRepository $repository;

    public function __construct(SemesterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return response()->json([
            'success' => true,
            'data' => $this->repository->all()
        ]);
    }

    public function store(array $data)
    {
        $semester = $this->repository->create($data);
        return response()->json([
            'success' => true,
            'message' => 'تمت إضافة الفصل بنجاح',
            'data' => $semester
        ], 201);
    }

    public function update($id, array $data)
    {
        $semester = $this->repository->update($id, $data);
        if ($semester) {
            return response()->json([
                'success' => true,
                'message' => 'تم تعديل الفصل بنجاح',
                'data' => $semester
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'الفصل غير موجود'
        ], 404);
    }

    public function delete($id)
    {
        $deleted = $this->repository->delete($id);
        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'تم حذف الفصل' : 'الفصل غير موجود'
        ], $deleted ? 200 : 404);
    }
}
