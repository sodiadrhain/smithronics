<?php

namespace site;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Mail;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'sur_name',
      'first_name',
      'other_name',
      'day',
      'month',
      'year',
      'state_of_origin',
      'lga',
      'sex',
      'marital_status',
      'religion',
      'nature_of_business',
      'residential_address',
      'office_address',
      'purpose_of_joining',
      'payment_option',
      'next_kin_name',
      'next_kin_day',
      'next_kin_month',
      'next_kin_year',
      'next_kin_relationship',
      'next_kin_phone',
      'email',
      'phone',
      'password',
      'image',
      'confirmation_code'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function saveRoles($roles){
      if(!empty($roles))
      {
        $this->roles()->sync($roles);
      } else{
        $this->roles()->detach();
      }
    }
}
