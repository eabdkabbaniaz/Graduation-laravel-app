<?php

namespace Modules\Medication\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Effect extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function medicationEffects()
    {
        return $this->hasMany(MedicationEffect::class);
    }

}
