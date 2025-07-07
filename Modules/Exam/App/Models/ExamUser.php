<?php

namespace Modules\Exam\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exam\Database\factories\ExamUserFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ExamUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded=[];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(ExamQuestion::class, 'exam_id');
    }
    
    public function ee()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
}