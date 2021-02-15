<?php
namespace App\Services\Impl;


use App\Models\Roles;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthServiceImpl implements AuthService
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password]) ) {
            $user = Auth::user();

            $token = $user->createToken($user->email.'-'.now());


//            dd(DB::table('user_roles')->where('role_id', 1)->get());
//            dd(User::with('roles')->findOrFail($user->id));

            return [
                'user'=>$user,
                'isAdmin'=>$user->isAdmin(),
                'token'=>$token
            ];
        }

        return 'E-mail или пароль не правильный :)';
    }

    public function register(Request $request)
    {
        if(User::where('email', $request->email)->first()) {
            throw new \Exception('Пользователь с таким email занят :)');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        DB::table("user_roles")->insert([
            'user_id'=>$user->id,
            'roles_id'=>2
        ]);

        $token = $user->createToken($user->email.'-'.now());

//        dd($user->isAdmin());
        return [
            'user'=>$user,
            'isAdmin'=>$user->isAdmin(),
            'token'=>$token
            ];
    }

    public function checkUser(Request $request) {
        $user = User::findOrFail($request->id);
        $isAdmin = $user->isAdmin();
        return [
            'user'=>$user,
            'isAdmin'=>$isAdmin
        ];
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return response()->json(['success' =>'logout_success'],200);
        }else{
            return response()->json(['error' =>'api.something_went_wrong'], 500);
        }
    }
}
