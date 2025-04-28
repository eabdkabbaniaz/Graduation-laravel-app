<?php

namespace Modules\Experience\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Experience\App\Http\Requests\StoreSessionRequest;
use Modules\Experience\App\Http\Requests\UpdateSessionRequest;
use Modules\Experience\App\Models\Session;
use Modules\Experience\Services\SessionService;
use  Modules\Experience\App\resources\SessionResource;
use Modules\Traits\ApiResponseTrait;
class SessionController extends Controller
{    protected SessionService $service;

        public function __construct( SessionService $service) {
            $this->service =$service;
            
        }
    
        public function index()
        {
            return$this->service->index();
        }
    
        public function store(StoreSessionRequest $request)
       {
     
            return $this->service->store($request->validated());

    
    
        }
    
        public function show($id)
        {
           return $session = $this->service->show($id);
            // return new SessionResource($session);
        }
    
        public function update(UpdateSessionRequest $request,$session)
        {
            $data['session'] =$request->validated();
            $data['id']=$session;
          return  $updated = $this->service->update($data );
            // return new SessionResource($updated);
        }
    
        public function destroy( $session)
        {
            $this->service->destroy($session);
            return response()->noContent();
        }
        


    }
    