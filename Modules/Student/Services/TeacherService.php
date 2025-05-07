<?php
namespace Modules\Student\Services;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Student\App\Jobs\SendTeacherCredentialsEmail;
use  Modules\Student\Repository\TeacherRepository;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use App\Enums\TokenAbility;
use Carbon\Carbon;
use Modules\Traits\ApiResponseTrait;

class TeacherService
{
    public $repo;
    public function __construct(TeacherRepository $repo) {
        $this->repo=$repo;
    }


   public  function  index()
    {
        try {
            $message['university_id'] = auth('university')->user()->id;
            $teacher = $this->repo->index($message);
            return ApiResponseTrait::successResponse("تم الاضافة بنجاح", $teacher);
        }  catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    
    }
   public  function  generateRandomPassword($length = 10)
    {
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $all = $upper . $lower . $numbers;
    
        $password = '';
      
        $password .= $upper[random_int(0, strlen($upper) - 1)];
        $password .= $lower[random_int(0, strlen($lower) - 1)];
        $password .= $numbers[random_int(0, strlen($numbers) - 1)];
    
        for ($i = 3; $i < $length; $i++) {
            $password .= $all[random_int(0, strlen($all) - 1)];
        }
    
        return str_shuffle($password);
    }
    
    public function register(array $data)
    {
        
        $password=$this->generateRandomPassword(10);
        $data['password']= Hash::make( $password);
        $data['university_id'] = auth('university')->user()->id;
        $data = $this->repo->create($data);
        // $accessToken = $user->createToken('access_token', [TokenAbility::ACCESS_API->value], Carbon::now()->addMinutes(config('sanctum.ac_expiration')));
        // $refreshToken = $user->createToken('refresh_token', [TokenAbility::ISSUE_ACCESS_TOKEN->value],
        // Carbon::now()->addMinutes(config('sanctum.rt_expiration')));
        // $user['refreshToken']= $refreshToken->plainTextToken;
        // $user['token']= $accessToken->plainTextToken;
        // event(new UserLoggedIn($user['id']));
        $massege['email'] = $data['email'];
        $massege['password'] = $data['password'];
       //  SendTeacherCredentialsEmail::dispatch($data , $password);
        // Mail::raw("your email information is: email:{{$data['email'] }}your password {{ $password }}", function ($message) use ($data) {
        //     $message->from('walaaalrehawi@gmail.com', 'walaa')
        //         ->to($data['email'])
        //         ->subject(' Verification Code ');    
        // }); 
      
   
        return ApiResponseTrait::successResponse("add teacher success".'password'.$password ,$data);
        // return $data;
    }

    // public function login(array $credentials)
    // {
    //     if (Auth::guard('web')->attempt($credentials)) {
    //         return Auth::guard('web')->user();
    //     }
    //     return null;
    // }

    // public function logout()
    // {
    //     Auth::guard('web')->logout();
    // }

    public function update(  $message)
    {
        $returnData= $this->repo->update($message);
        return ApiResponseTrait::successResponse("edit teacher success" ,$returnData);
    }

    public function destroy($teacher)
    {
        $data= $this->repo->destroy($teacher);
        return ApiResponseTrait::successResponse("delete teacher success" ,$data);
    
    }

    public function toggleActivation( $teacher)
    {
        $data= $this->repo->toggleActivation($teacher);
        return ApiResponseTrait::successResponse("change teacher success" ,$data);
    
    }
    
    public function login(array $credentials)
    {
      
        if (Auth::guard('web')->attempt($credentials)) {
           
            $teacher= Auth::guard('web')->user();
            $teacher['token'] = $teacher->createToken('my-app-token')->plainTextToken;
return     $teacher;
        }
        return null;
    }
}
