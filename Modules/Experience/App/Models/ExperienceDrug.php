<?php

namespace Modules\Experience\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Experience\Database\factories\ExperienceDrugFactory;

class ExperienceDrug extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
protected $guarded=[];    

    protected $table = 'experience_drugs';

    public function Drugs()
    {
        return $this->belongsTo(Drug::class,'drug_id');
    }
}
