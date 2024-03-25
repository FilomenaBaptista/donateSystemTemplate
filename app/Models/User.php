<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Exception;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'telefone',
        'password',
        'municipio_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function municipio() {
        return $this->belongsTo(Municipio::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function index(
        string $name = null
    ) {
        try {
            return User::orderBy('id', 'DESC')

            ->get([
                'users.*'
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getCode());
        }
    }
    public function store(
        string $name,
        string $email,
        string $userPasswordHashed
    ) {
        try {
            $User = new User();
            $User->name = $name;
            $User->email = $email;
            $User->password = $userPasswordHashed;
            $User->save();
            return $User;
        } catch (Exception $e) {
            throw new Exception($e->getCode());
        }
    }

    public function getSalt(
        string $email
    ) {
        try {
            return User::select('user_salt')->where('email',$email)->first();
        } catch (Exception $e) {
            throw new Exception($e->getCode());
        }
    }

    public function login(
        string $email,
        string $password
    ) {
        try {
            return User::where('email', $email)->where('password', $password)->first();
        } catch (Exception $e) {
            throw new Exception($e->getCode());
        }
    }

}
