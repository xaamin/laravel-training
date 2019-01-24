<?php
namespace App\Training;

use App\Training\UserAddress;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public $fillable = [
    'name',
    'email',
    'password'
  ];

  public $hidden = [
    'password'
  ];

  public function address()
  {
    return $this->hasOne(UserAddress::class);
  }

}