<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
   
    public function index(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }
        $UserService = new UserService();
        $response = $UserService->index($request->name);
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Get
     * 
     * @param Request $request ([
     *      user_id (integer|required, user id),
     * ])
     * @return JsonResponse Json containing request data, message and status code
     */
   public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'numeric|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }

        $UserService = new UserService();
        $response = $UserService->show(
            $request->user_id
        );

        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

   
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'password' => 'string|required',
            'email' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }

        $UserService = new UserService();
        $response = $UserService->store(
            $request->name,
            $request->email,
            $request->password
        );

        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    
   

    /**
     * Delete 
     *
     * @param Request $request ([
     *      user_id (numeric|required)
     * ])
     * @return Response Json data. 
     */
    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'numeric|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }

        $UserService = new UserService();
        $response = $UserService->delete(
            $request->user_id
        );

        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'string|required',
            'password' => ''
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }

        $UserService = new UserService();
        $response = $UserService->login(
            $request->email,
            $request->pass
        );

        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

   

  
}
