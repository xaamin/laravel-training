<?php
namespace App\Training;

use App\Training\User;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
  public $table = 'user_address';

  public $fillable = [
    'address'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

}