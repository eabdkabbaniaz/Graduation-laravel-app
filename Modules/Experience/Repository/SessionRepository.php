<?php

namespace Modules\Experience\Repository;

use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\ExperienceSemester;
use Modules\Experience\App\Models\Semester;
use Modules\Experience\App\Models\Session;
use Modules\Mark\App\Models\Setting;

class SessionRepository
{

        public function create(array $data)
        {
            // return $data;
            $type = Setting::where('name', 'assessment')->first();
            if( $type->calculation_method=='average'&&$type->final_mark!=$data['mark']){
                 return;
            }
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
            $session= Session::with('drugs')->findOrFail($id);
            $student = auth()->user();

            // تحقق من وجود صف في جدول session_users لهذا الطالب في هذه الجلسة
            $hasAttended = \DB::table('session_users')
            ->where('session_id', $session->id)
            ->where('user_id', $student->id)
            ->exists();
            $session['has_attended']= $hasAttended;
        return $session;
        }
    
        public function get($id)
        {
            return Session::findOrFail($id);
        }
    
        public function all($data)
        {
            return Session::with('drugs','experiences.Experience','teacher')->where('experience_id',$data)->get();
        }
    
        public function getSession($data)
        {
$session =  Session::with('drugs')->where('experience_id',$data)->get();

            $student = auth()->user();
foreach($session as $s){
            // تحقق من وجود صف في جدول session_users لهذا الطالب في هذه الجلسة
            $hasAttended = \DB::table('session_users')
            ->where('session_id', $s->id)
            ->where('user_id', $s->id)
            ->exists();
            $s['has_attended']= $hasAttended;}
return $session;
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
    