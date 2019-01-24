<?php
namespace App\Training\Transformers;

use App\Training\User;
use League\Fractal\TransformerAbstract;
use App\Training\Transformers\UserAddressTransformer;

class UserTransformer extends TransformerAbstract
{
  protected $availableIncludes = [
    'address'
  ];

	public function transform(User $user)
	{
	    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'created_at' => (string)$user->created_at,
        'updated_at' => (string)$user->updated_at,
	    ];
  }

  public function includeAddress(User $user)
  {
    if (!$user->address) {
      return $this->null();
    }

    return $this->item($user->address, new UserAddressTransformer);
  }
}