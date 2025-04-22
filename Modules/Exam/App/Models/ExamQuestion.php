<?php

namespace Modules\Exam\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamQuestion extends Model
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

    public function examUser(): BelongsTo
    {
        return $this->belongsTo(ExamUser::class, 'exam_id');
    }
}
