<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword; 


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'age',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nice() {
        return $this->hasMany('App\Nice', 'user_id');
    }
    public function review() {
        return $this->hasMany('App\Review', 'user_id');
    }


    /**
     * パスワードリセット通知の送信
    *
    * @param string $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
    $this->notify(new ResetPassword($token));
    }

}
