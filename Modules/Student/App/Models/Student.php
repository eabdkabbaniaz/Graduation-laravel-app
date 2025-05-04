<?php

namespace Modules\Student\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Student\App\Models\Category;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Student extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     */
   // protected $fillable = ['name', 'password', 'category_id'];
    protected $guarded=[];
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected static function newFactory()
    {
        //return StudentFactory::new();
    }
    public  function category()
    {
      return $this->belongsTo(Category::class,'category_id');
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

}
