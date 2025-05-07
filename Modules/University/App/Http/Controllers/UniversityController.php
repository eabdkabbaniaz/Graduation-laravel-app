<?php

namespace Modules\University\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\University\Services\UniversityService;

class UniversityController extends Controller
{
    protected $university_service;
    public  function __construct(UniversityService $university_service)
    {
        $this->university_service = $university_service;
    }
    public function index()
    {
        return  $this->university_service->index();
    }


    public function create(Request $request)
    {
        $message = $request->all();
        return   $this->university_service->create($message);
    }



    public function show($id)
    {
        return   $this->university_service->show($id);
    }


    public function update(Request $request, $id)
    {
        $message['id'] = $id;
        $message['data'] = $request->input();
        return   $this->university_service->update($message);
    }


    public function destroy($id)
    {
        return   $this->university_service->destroy($id);
    }
    public function changeStatus($id)
    {
        return   $this->university_service->changeStatus($id);
    }
}
