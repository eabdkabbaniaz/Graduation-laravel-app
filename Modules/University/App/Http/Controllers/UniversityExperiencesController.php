<?php

namespace Modules\University\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\University\Services\UniversityExperiencesSisonService;

class UniversityExperiencesController extends Controller
{
    protected $uniExpSison_service;
    public  function __construct(UniversityExperiencesSisonService $uniExpSison_service)
    {
        $this->uniExpSison_service = $uniExpSison_service;
    }
    public function index()
    {
        return  $this->uniExpSison_service->index();
    }


    public function create(Request $request)
    {
        $message = $request->all();
        return   $this->uniExpSison_service->create($message);
    }



    public function show($id)
    {
        return   $this->uniExpSison_service->show($id);
    }

 
    public function destroy($id)
    {
        return   $this->uniExpSison_service->destroy($id);
    }
    public function changeStatus($id)
    {
        return   $this->uniExpSison_service->changeStatus($id);
    }
}
