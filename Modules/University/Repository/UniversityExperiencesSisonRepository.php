<?php

namespace Modules\University\Repository;

use Illuminate\Support\Facades\Hash;
use Modules\University\App\Models\UniExpSison;


class UniversityExperiencesSisonRepository
{
    public function index()
    {
        return UniExpSison::with('university')->with('sison','experience')->get();
        //return UniExpSison::get();
    }

    public function find($id)
    {
        return UniExpSison::with('university')->with('sison','experience')->find($id);
    }

    public function create($message)
    {
      
        return UniExpSison::create($message);
    }



    public function destroy($id)
    {
        return    UniExpSison::destroy($id);
    }
    public function changeStatus($id)
    {
        $uniExpSison = UniExpSison::find($id);
        $uniExpSison->status = $uniExpSison->status == 1 ? 0 : 1;
        $uniExpSison->save();
        return $uniExpSison;
    }
}
