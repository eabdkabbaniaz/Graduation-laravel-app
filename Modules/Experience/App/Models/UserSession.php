<?php

namespace Modules\Experience\App\Models;
use Modules\Experience\App\Models\Session;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Experience\Database\factories\UserSessionFactory;

class UserSession extends Model
{
    use HasFactory;
    protected $table = 'session_users';

    protected $fillable = ['session_id','report', 'user_id', 'mark'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ss()
    {
        return $this->belongsTo(Session::class,'session_id');
    }
}