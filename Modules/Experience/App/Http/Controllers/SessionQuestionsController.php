<?php

namespace Modules\Experience\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Experience\App\Http\Requests\CreateSessionQuestionRequest;
use Modules\Experience\App\Http\Requests\StoreSessionRequest;
use Modules\Experience\App\Http\Requests\UpdateSessionQuestionRequest;
use Modules\Experience\App\Http\Requests\UpdateSessionRequest;
use Modules\Experience\Services\SessionQuestionsService;

class SessionQuestionsController extends Controller
{
    protected SessionQuestionsService $service;

    public function __construct(SessionQuestionsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {

        return $this->service->index();
    }

    public function getall()
    {
        return $this->service->getall();
    }

    public function showSessionQuestion($data)
    {
        return $this->service->showSessionQuestion($data);
    }



    public function store(CreateSessionQuestionRequest $request)
    {

        return $this->service->store($request->validated());
    }

    public function show($id)
    {
        return  $this->service->show($id);
    }

    public function update(UpdateSessionQuestionRequest $request, $questio_id)
    {
        $data['session'] = $request->validated();
        $data['questio_id'] = $questio_id;
        return   $this->service->update($data);
    }

    public function destroy($session)
    {
        return    $this->service->destroy($session);
    }
}
