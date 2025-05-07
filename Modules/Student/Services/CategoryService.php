<?php

namespace Modules\Student\Services;

use Modules\Student\Repository\CategoryRepository;

class CategoryService
{
    protected $repo;

    public function __construct(CategoryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();
    }
    public function show($id)
    {
        return $this->repo->find($id);
    }
    public  function createBatchCategories($message)
    {
        $count =   $message['category_number'];
       
        $ids = [];
        for ($i = 1; $i <= $count; $i++) {
            $data['name'] = 'فئة ' . $i;
            $data['university_id']=$message['university_id'];
            $category = $this->repo->create($data);
            $ids[] = $category->id;
        }
        return $ids;
    }
}
