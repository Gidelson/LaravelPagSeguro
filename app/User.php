<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'password', 
        'cpf',
        'street',
        'number',
        'complement',
        'district',
        'postal_code',
        'city',
        'state',
        'country',
        'phone',
        'area_code',
        'birth_date',
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

    public function rules()
    {
        return [ 
            
        'name'          =>   'required|string|min:3|max:255',
        'email'         =>   'required|string|email|max:255|unique:users',
        'password'      =>   'required|string|min:6|confirmed',
        'cpf'           =>   'required|unique:users',
        'street'        =>   'required',
        'number'        =>   'integer|required',
        'complement'    =>   'max:200',
        'district'      =>   'required',
        'postal_code'   =>   'integer|required',
        'city'          =>   'required',
        'state'         =>   'required',
        'country'       =>   'required',
        'phone'         =>   'required',
        'area_code'     =>   'integer|required',
        'birth_date'    =>   'required',
    ];
    }

    public function rulesUpdateProfile()
    {
        $rules = $this->rules();
        unset($rules['password']);
        unset($rules['cpf']);
        unset($rules['email']);
        return  $rules;
    }


    public function profileUpdate(array $data)
    {
        return $this->update($data);
    }

    public function updatePassword($newPassword)
    {
        $newPassword = bcrypt($newPassword);
        return $this->update([
            'password' =>  $newPassword ,
        ]);
    }
}
