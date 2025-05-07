<?php

namespace Modules\University\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Experience\App\Models\Experience;
use Modules\University\Database\factories\UniExpSisonFactory;

class UniExpSison extends Model
{
    use HasFactory;

    protected $table = 'UniExpSison';
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory()
    {
        //return UniExpSisonFactory::new();
    }
    public  function  university()
    {
        return $this->belongsTo(University::class);
    }
    public  function  sison()
    {
        return $this->belongsTo(Sison::class);
    }
    public  function  experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
