<?php

namespace Modules\Exam\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exam\Database\factories\QuestionFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded=[];
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
