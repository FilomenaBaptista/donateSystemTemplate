<?php

namespace App\Services;

use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\DB;
/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * List 
     * 
     * @return array Collection data found
     * @exception Log error and return array with error code and message
     */
    public function index(
        string $name = null
    ) {
        try {
            $User = new User();
              $response = DataTables::of($User->index(
                $name
            ))->make(true);   
            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.USER', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.USER', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Get
     * 
     * @return array Collection data
     * @exception Log error and return array with error code and message
     */
    public function show(
        int $UserId
    ) {
        try {
            $User = new User();
            $response = $User->show(
                $UserId
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'GET.USER', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'GET.USER', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }
    
    /**
     * Create
     * 
     * @return array Collection data created
     * @exception Log error and return array with error code and message
     */
    public function store(       
        string $name,
        string $email,
        string $password
    ) {
        try {
            DB::beginTransaction();
           /*  $userSalt = hash("SHA256", mt_rand());
            $userPasswordHashed = hash("SHA256", $userSalt . $password); */
            $userSalt = hash("SHA256", mt_rand());
            $userPasswordHashed = hash("SHA256", $password);
            $User = new User();
            $response = $User->store(
                $name,
                $email,
                $userPasswordHashed,
            );
            DB::commit();
            return StatusHelper::response(['data' => $response, 'tag' => 'CREATE.USER', 'status' => 200]);
        } catch (Exception $e) {
            DB::rollBack();
            return StatusHelper::response(['tag' => 'CREATE.USER', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    private function getSalt(string $idUser)
    {
        $User = new User();
        $salt = $User->getSalt($idUser);
        return $salt->user_salt;
    }

    public function login(
        string $email,
        string $password
    ) {
        try {
            $UserService = new UserService();
            
            //$userSalt = $UserService->getSalt($email);
            $User = new User();
            //$password = hash('SHA256', $userSalt . $password);
            $password = hash('SHA256',$password);
            $response = $User->login($email, $password);

            if (empty($response)) {
                return StatusHelper::response(['data' => '', 'tag' => 'LOGIN', 'status' => 403]);
            }
            return StatusHelper::response(['data' => true, 'tag' => 'LOGIN.USER', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LOGIN.USER', 'status' => (int)$e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Delete 
     * 
     * @return array With success deleted or not
     * @exception Log error and return array with error code and message
     */
    public function delete(
        int $UserId
    ) {
        try {
            $User = new User();
            $response = $User->delete( $UserId);
            return StatusHelper::response(['data' => $response, 'tag' => 'DELETE.USER', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'DELETE.USER', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    

}