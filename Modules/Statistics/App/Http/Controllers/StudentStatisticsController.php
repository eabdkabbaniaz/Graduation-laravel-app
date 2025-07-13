<?php
namespace Modules\Statistics\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Modules\Experience\App\Models\ExperienceSemester;
use Modules\Experience\App\Models\Semester;
use Modules\Experience\App\Models\Session;
use Modules\Statistics\Services\StudentStatisticsService;

class StudentStatisticsController extends Controller
{
    protected $statisticsService;

    public function __construct(StudentStatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function Marks()
      {  
        $studentId=Auth::user()->id;
    
        $semester_id=Semester::where('status',true)->first();

         $user= User::with('sessions')->findOrFail($studentId);
        $ExperienceSemester=ExperienceSemester::where('semester_id',$semester_id->id)->first();
 $allsession =Session::where('experience_id' ,$ExperienceSemester->id)->pluck('id');
         $session=$user->sessions;
       $totalsession=[];
         foreach( $session as $ses)
        {
            if($allsession->contains($ses->session_id))
         $totalsession[]= $ses->mark;
        }
return $totalsession;


}
    public function Statistics()
    {
        $studentId=Auth::user()->id;
         $user= User::with('sessions.ss', 'exam.ee','students')->findOrFail($studentId);
$user['numExam']   = $user->exam->count();
$Sessions=ExperienceSemester::with('sessions')->where('semester_id',1)->first();
$totalsession=[];
foreach( $Sessions->sessions as $session)
{
    $totalsession[]= $session->id;
}
     $attendedSessions = $user->sessions->whereIn('id',$totalsession)->where('mark','>',0)->count();
$count =$Sessions->sessions->count();
$user['attendance'] = $count > 0 ? round(($attendedSessions / $count) * 100, 2) : 0;
return $user;
}
}
