<?php

namespace Modules\University\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\University\Services\StudentExperienceService;

class StudentExperienceController extends Controller
{
    protected $student_exp_service;
    public  function __construct(StudentExperienceService $student_exp_service)
    {
        $this->student_exp_service = $student_exp_service;
    }
    public function index()
    {
        return  $this->student_exp_service->index();
    }

    public function show($id)
    {
        return   $this->student_exp_service->show($id);
    }
}
