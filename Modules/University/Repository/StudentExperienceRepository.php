<?php

namespace Modules\University\Repository;

use Illuminate\Support\Facades\Hash;
use Modules\University\App\Models\Sison;
use Modules\University\App\Models\UniExpSison;

class StudentExperienceRepository
{
    public function index()
    {
        return Sison::get();
    }

    public function find($message)
    {
        return UniExpSison::with('experience')->where('university_id',$message['university_id'])->where('sison_id',$message['sisonId'])->get();
    }
}
