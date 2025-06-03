<?php

namespace Modules\Medication\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function effects()
    {
        return $this->hasOne(MedicationEffect::class);
    }

    // protected $fillable = ['name', 'generic_name', 'description','usage', 'dosage'];
    
}
