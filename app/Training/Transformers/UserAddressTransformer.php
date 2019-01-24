<?php
namespace App\Training\Transformers;

use App\Training\UserAddress;
use League\Fractal\TransformerAbstract;

class UserAddressTransformer extends TransformerAbstract
{
	public function transform(UserAddress $user)
	{
	    return [
        'id' => $user->id,
        'address' => $user->address,
	    ];
  }
}