<?php

namespace Modules\University\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\University\Database\factories\SisonFactory;

class Sison extends Model
{
    use HasFactory;

    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory()
    {
        //return SisonFactory::new();
    }
}
