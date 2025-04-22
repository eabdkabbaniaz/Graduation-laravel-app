<?php

namespace Modules\Exam\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */  
       protected $guarded=[];

    
       public function questions(): HasMany
       {
           return $this->hasMany(Question::class);
       }
}
