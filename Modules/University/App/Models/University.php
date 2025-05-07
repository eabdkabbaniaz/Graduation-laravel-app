<?php

namespace Modules\University\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\University\Database\factories\UniversityFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Experience\App\Models\Session;

class University extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     */
    // protected $fillable = [];

    protected static function newFactory()
    {
        //return UniversityFactory::new();
    }
    public function sessions()
    {
        return $this->hasManyThrough(
            Session::class,         // الجدول النهائي
            UniExpSison::class,     // الجدول الوسيط
            'university_id',        // المفتاح الخارجي في جدول UniExpSison الذي يشير إلى University
            'uniexpsison_id', 
            'id',                    // المفتاح المحلي في جدول University
            'id'        // المفتاح الخارجي في جدول Session الذي يشير إلى UniExpSison  '      // المفتاح المحلي في جدول UniExpSison
        );
    }
}
