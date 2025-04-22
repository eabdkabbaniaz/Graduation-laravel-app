<?php

namespace Modules\Exam\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exam\Database\factories\AnswerFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded=[];

    
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
