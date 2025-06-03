<?php

namespace Modules\Medication\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationEffect extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }

    public function system()
    {
        return $this->belongsTo(System::class);
    }

    public function effect()
    {
        return $this->belongsTo(Effect::class);
    }
}
