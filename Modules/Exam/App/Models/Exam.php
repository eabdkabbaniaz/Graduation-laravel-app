<?php

namespace Modules\Exam\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded=[];

    

    public function subject()
    {
        return $this->hasMany(ExamSubject::class );
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function isActive(): bool
    {
        return now()->between($this->Start_date, $this->End_date);
    }
}
