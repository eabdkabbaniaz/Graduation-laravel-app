<?php

namespace Modules\Experience\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Experience\Database\factories\ExperienceSemesterFactory;

class ExperienceSemester extends Model
{
    use HasFactory;

    protected $guarded=[];    

    protected $table = 'experineces_semesters';

    public function Experience()
    {
        return $this->belongsTo(Experience::class);
    }
}