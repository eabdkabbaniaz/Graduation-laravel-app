<?php

namespace Modules\University\Repository;

use Illuminate\Support\Facades\Hash;
use Modules\University\App\Models\University;

class UniversityRepository
{
    public function index()
    {
        return University::get();
    }

    public function find($id)
    {
        return University::find($id);
    }

    public function create($message)
    {
        $message['password'] = Hash::make($message['password']);
        return University::create($message);
    }

    public function update($message)
    {
        $university = University::find($message['id']);
        $university->update($message['data']);
        return $university;
    }

    public function destroy($id)
    {
        return    University::destroy($id);
    }
    public function changeStatus($id)
    {
        $university = University::find($id);
        $university->status = $university->status == 1 ? 0 : 1;
        $university->save();
        return $university;
    }
}
