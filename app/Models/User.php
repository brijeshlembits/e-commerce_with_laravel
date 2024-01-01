<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     * 
     */
    public $user='users';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'email_verified',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function generateToken()
    {
        return base64_encode(\Illuminate\Support\Str::random(32) . '_' . time());
    }
    public function loginProcess($postdata ){
        $user=User::all();
        if (config('setting.user_email_verify') && $user->email_verified != '1') {
            return ['status' => 0, 'message' => 'Please verify your email, <a class="noroute" href="' . route('resend-email-verification', ['code' => base64_encode($user->email)]) . '">Click here</a> to verify your email address.'];
        }
    }
}
