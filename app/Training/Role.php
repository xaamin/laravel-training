<?php
namespace App\Training;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public $fillable = [
    'key',
    'name'
  ];

}