<?php

namespace Modules\University\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\University\Services\SisonService;

class SisonController extends Controller
{
    protected $sison_service;
    public  function __construct(SisonService $sison_service)
    {
        $this->sison_service = $sison_service;
    }
    public function index()
    {
        return  $this->sison_service->index();
    }


    public function create(Request $request)
    {
        $message = $request->all();
        return   $this->sison_service->create($message);
    }



    public function show($id)
    {
        return   $this->sison_service->show($id);
    }


    public function update(Request $request, $id)
    {
        $message['id'] = $id;
        $message['data'] = $request->input();
        return   $this->sison_service->update($message);
    }


    public function destroy($id)
    {
        return   $this->sison_service->destroy($id);
    }
 
}
