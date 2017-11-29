<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Krucas\LaravelUserEmailVerification\Contracts\RequiresEmailVerification as RequiresEmailVerificationContract;
use Krucas\LaravelUserEmailVerification\RequiresEmailVerification;

class User extends Authenticatable implements RequiresEmailVerificationContract
{
   use RequiresEmailVerification;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['first_name','middle_name','last_name','phone_number','country','city','address','profession', 'id_number','system_code', 'email', 'password'];
  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];
  // user has many posts
  public function posts()
  {
    return $this->hasMany('App\Posts','author_id');
  }
  // user has many comments
  public function comments()
  {
    return $this->hasMany('App\Comments','from_user');
  }
  public function can_post()
  {
    $role = $this->role;
   
    if($role == 'author' || $role == 'admin')
    {
      return true;
    }
    return false;
  }
  public function is_admin()
  {
    $role = $this->role;
    if($role == 'admin')
    {
      return true;
    }
    return false;
  }

  public function is_active()
  {
     $active = $this->active;
    if($active==1)
    {
      return true;
    }
    return false;
  }
 
}
