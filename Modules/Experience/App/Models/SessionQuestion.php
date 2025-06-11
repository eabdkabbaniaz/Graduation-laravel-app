<?php

namespace Modules\Experience\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Experience\Database\factories\SessionQuestionFactory;

class SessionQuestion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
   //* protected $fillable=['id','question_mode','session_id','question'];
   protected $guarded = [];
    
    protected static function newFactory()
    {
        //return SessionQuestionFactory::new();
    }
public function sessionAnswers()
{
    return $this->hasMany(SessionAnswer::class);
}

}
