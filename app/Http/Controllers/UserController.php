<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * List users.
     *
     */
    public function list() {   
        $list = DB::collection('users')->project(['name'=> 1,  'email' => 1, '_id' => 0])->get();
        return response($list, 201); 
    }
    /**
     * Store users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
         $role = User::role('admin')
         ->get()
         ->toArray();

        $fields = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|string'
        ];

        $validated = Validator::make($request->all(), $fields);

        if($validated->fails())
        {
        return response()->json(['messages' => 'The given data was invalid'], 422);
        }

        if((isset($role[0])) && ($request->get('role') != 'user')) { 

        return response()->json(['message' => 'User with this role cannot be registered'], 409);
        }
        else 
        {
             $user = User::create([
             'name' => $request->get('name'),
             'email' => $request->get('email'),
             'password' =>  bcrypt($request->get('password')),
             ]);
                
            $user->assignRole($request->get('role'));}

            $token = $user->createToken('apptoken')->accessToken;

            $response = [
            'username' => $user['name'],
            'email' => $user['email'],
            'token' => $token,
        ];

        return response($response, 201);

        }


    /**
     * Delete users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {  
        $fields = $request->validate([
            'email' => 'required|string',
        ]);
        $email = $fields['email'];
        $user = User::where('email', $email)->first();
        if (!$user) {   
            return response([
            'message' => 'User not found'], 422);
        }
        else 
        {   
            if(Auth::user()->email != $email){
            $user->tokens()->delete();
            $user->delete();
            return response([
           'message' => 'User deleted'], 200);
           }
           else 
           {
            return response([
           'message' => 'Cannot delete logged in user'], 422);
           }
        }
    }
        
    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        //check email
        $user = User::where('email', $fields['email'])->first();
        //check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
               return response ([
              'message' => 'Bad credentials'], 401);
        }
        $token = $user->createToken('apptoken')->accessToken;

        $response = [
            'message' => 'User logged in',
            'user' => $user['name'],
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout() {

        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $user->tokens()->delete();

       return response([
           'message' => 'User logged out'], 200);
    }


}
