<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Jobs\SendVerificationMessage;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Api\V1\ApiController;

class AuthController extends ApiController
{

    public $email;
    public $phone;
    /**
     * Login
     * @group Auth management
     * @unauthenticated
     *
     * @bodyParam  email string required The email of the user Example:  user@testourvoice.com
     * @bodyParam password string required Password of the user  Example:  motDePasse
     *
     * @response scenario=success status=200 {
     *  "access_token": "2|qmNXH0cbgMNkBbeW47orzYE5dC9aQKbgbTp3ZSf96JcOMOSlTKAYToswIVveWzdxQtgpj* YJFAkoYeywhQMG5LiRjXkDQgakPVjATPWWwfeX8H72wDbq2IwueUYnHYpTQ9htpYcy7j8fmVaVnqc83DYTfRxqxA3qrw
     * OUWOCmBvja6hcTUOoa5c0bZEmo7XCYL0eiykSVOVYvKs37gRJq6B27Xvh",
     *  "token_type": "Bearer",
     *  "expired_at" : "2023-02-08T19:49:08.000000Z"
     * }
     *
     * @response scenario=failed status=400 {
     *  "message": "Email or Password is invalid"
     * }
     *
     * @return JsonResponse
     */
    // public function login(LoginRequest $request)
    // {
    //     $validatedData = $request->all();
    //     if (!auth()->attempt($validatedData)) {
    //         return $this->respondFailedLogin();
    //     }
    //     $user = auth()->user();

    //     $tokenResult = auth()->user()->createToken(Str::random(15));
    //     return $this->respondWithToken($tokenResult);
    // }
    public function login(LoginRequest $request)
    {
        // $validatedData = $request->validate([
        //     'email' => 'email|required',
        //     'password' => 'required'
        // ]);
        // $validatedDataa = $request->validate([
        //     'phone' => 'required',
        //     'password' => 'required'
        // ]);
        // if (!auth()->attempt($validatedData)) {
        //     return $this->respondFailedLogin();
        // }
        // if (!auth()->attempt($validatedDataa)) {
        //     return $this->respondFailedLogin();
        // }
        // $user = auth()->user();
        $credentials = $request->only(['email', 'password', 'phone']);


        $user = null;

        // Vérifiez si l'utilisateur a fourni un email ou un numéro de téléphone
        if (isset($credentials['email'])) {
            $user = User::where('email', $credentials['email'])->first();
        } elseif (isset($credentials['phone'])) {
            $user = User::where('phone', $credentials['phone'])->first();
        }

        // Vérifiez si l'utilisateur existe et si les informations d'identification sont correctes
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return $this->respondFailedLogin();
        }
        $tokenResult = $user->createToken(Str::random(15));

        return $this->respondWithToken($tokenResult);

        // $tokenResult = auth()->user()->createToken(Str::random(15));
        // return $this->respondWithToken($tokenResult);
    }

    /**
     * Register
     *
     * @unauthenticated
     * @group Auth management
     *
     * @bodyParam first_name string required The first name of the user Example:  John
     * @bodyParam last_name string required The last_name of the user Example : Doe
     * @bodyParam email string required Email of the user  Example:  test@ourvoice.com
     * @bodyParam password  string required Password of the user Example : 12345678
     * @bodyParam phone  string required Phone of the user Example : 22961616161
     *
     * @return JsonResponse
     *
     *
     */

    public function register(RegisterRequest $request)
    {



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' =>$request->role_id,
        ]);

        if (!empty($user)) {
            $user->save();

           // $tokenResult = $user->createToken(Str::random(15));
            // Send a verification email to the user
            // SendVerificationMessage::dispatch($user)->onQueue('emails');

            // Return the API Token
           // return $this->respondWithToken($tokenResult, $user);
            return response()->json([
                'success' => true,
                'message' => trans('messages.successfully_operated', [], 'fr'),
                'data' => [
                    trans('messages.user_created_successfully', [], 'fr')
                ]
            ], 201);
        }

        return $this->respondError(trans('messages.user_not_created', [], 'fr'), 500);
    }

    /**
     * Logout
     *
     * @authenticated
     * @group Auth management
     */
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response(null, 204);
    }


}


