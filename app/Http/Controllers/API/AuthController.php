<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\API\UserResource;
use App\Http\Requests\API\CreateUserRequest;

class AuthController extends InitController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return jsonResponse(401, 'Wrong email or password!');
        }
        
        $user = Auth::guard('api')->user();
        $user->access_token = $token;

        $data = new UserResource($user);

        return jsonResponse(code: 200, message: 'done.', data: $data);
    }

    public function register(CreateUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->only(['email','phone','name','password']);
            
            if($request->hasFile('image')) {
                $imageID = resizeImage($request->image, 'uploads', [200, 200]);
                $data['image_id'] = $imageID;
            }
            
            $code = $data['verification_code'] = generateCode();
            
            $user = $this->pipeline->setModel('User')->create($data);
            $user->access_token = auth()->guard('api')->tokenById($user->id);
            // sendSMS($request->phone, "Your Automoto code is: $code");

            $data = new UserResource($user);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            
            return jsonResponse([], $e->getCode(), $e->getMessage());
        }
        
        return jsonResponse(code: 201, message: 'done.', data: $data);
    }

    public function resendCode(Request $request)
    {
        $phone = $request->phone;
        $user = $this->pipeline->setModel('User')->where(['phone' => $phone])->first();
        if (!$user) {
            return jsonResponse(404, 'not found.');
        }
        // sendSMS($phone, "Your Automoto code is: $user->activation_code");

        return jsonResponse(code: 200, message: 'done.');
    }

    public function activate(Request $request)
    {
        $data = $request->only(['phone', 'activation_code']);

        $user = $this->pipeline->setModel('User')->where($data)->first();
        
        if (!$user) {
            return jsonResponse(404, 'not found.');
        }

        $user->update(['active' => 1,'activation_code' => null]);

        return jsonResponse(code: 200, message: 'done.');
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        
        return jsonResponse(code: 200);
    }
}
