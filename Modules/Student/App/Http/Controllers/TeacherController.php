<?php

namespace Modules\Student\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\App\Http\Requests\CreateTeacherRequest;
use Modules\Student\App\Http\Requests\SignInRequest;
use Modules\Student\Services\TeacherService;

class TeacherController extends Controller
{
    public TeacherService $service;
    public function __construct( TeacherService $service) {
        $this->service = $service;
    }

    public function index()
    {
        return view('student::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateTeacherRequest $request)
    {
        // return $request;
      return  $data = $this->service->register($request->validated());
      
    }



    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('student::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,$id)
    {
        $data=$request->all();
        $massage['id']=$id;
        $massage['data']=$data;
      return  $this->service->update($massage);
    }

    public function destroy($id)
    {
        return  $this->service->destroy($id);

    }
    public function toggleActivation($id)
    {
        return  $this->service->toggleActivation($id);

    }
    
    public function login(SignInRequest $request)
    {
        $teacher = $this->service->login($request->validated());
        if (!$teacher) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        return response()->json(['teacher' => $teacher]);
    }

}
