<?php

namespace Modules\Experience\Repository;

use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\ExperienceSemester;
use Modules\Experience\App\Models\Semester;
use Modules\Experience\App\Models\Session;

class SessionRepository
{

        public function create(array $data)
        {
            // return $data;
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
    
        public function all($data)
        {
            return Session::with('drugs','experiences.Experience','teacher')->where('experience_id',$data)->get();
        }
    
        public function getall()
        {
            return Session::with('drugs','experiences.Experience','teacher')->get();
        }
        public function getSessions()
        {
            return Session::with('drugs')->get();
        }
        public function AllExperience($data)
        {
            return ExperienceSemester::with('Experience')->where('semester_id',$data)->get();
        }
        public function AllSemester()
        {
            return Semester::get();
        }
    }
    