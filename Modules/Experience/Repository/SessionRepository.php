<?php

namespace Modules\Experience\Repository;

use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\Session;

class SessionRepository
{

        public function create(array $data)
        {
            $session = Session::create($data);
            $session->drugs()->sync($data['drug_ids']);
            return $session;
        }
    
        public function update(array $data)
        {
        
        $session =$this->get($data['id']);
        $session->update($data['session']);
            if (isset($data['session']['drug_ids'])) {
                $session->drugs()->sync($data['session']['drug_ids']);
            }
            return  $session;
        }
    
        public function delete( $id)
        {
            $session =$this->get($id);
            $session->delete();
        }
    
        public function find($id)
        {
            return Session::with('drugs')->findOrFail($id);
        }
    
        public function get($id)
        {
            return Session::findOrFail($id);
        }
    
        public function all()
        {
            return Session::with('drugs')->get();
        }
    }
    