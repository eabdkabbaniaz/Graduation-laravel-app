<?php

namespace Modules\University\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\University\App\Http\Requests\LoginUninersityRequest;
use Modules\University\App\Models\University;

class LoginController extends Controller
{

    public function login1()
    {

        //   return              $university= auth()->guard('university')->user()->id;

        return auth('university')->user()->id;
    }

    // public function login(LoginUninersityRequest $request)
    // {
        
    //     if (auth()->guard('university')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $university = auth()->guard('university')->user();
    //         $token = $university->createToken($university->name . '-AuthToken')->plainTextToken;
    //         return response()->json([
    //             "university" => $university,
    //             'access_token' => $token,
    //         ]);
    //     }
    //     return "not found";


        // $user = University::where('email', $request['email'])->first();
        // if (!$user || !Hash::check($request['password'], $user->password)) {
        //     return response()->json([
        //         'message' => 'Invalid Credentials'
        //     ], 401);
        // }
        // $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        // return response()->json([
        //     "USER" => $user,
        //     'access_token' => $token,
        // ]);
  //  }
    public function login(Request $request)
{
    $university = University::where('email', $request->email)->first();

    if (! $university || ! Hash::check($request->password, $university->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $university->createToken('university-token')->plainTextToken;

    return response()->json([
        'user' => $university,
        'token' => $token,
    ]);
}
}
