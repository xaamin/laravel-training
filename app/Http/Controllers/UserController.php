<?php
namespace App\Http\Controllers;

use App\Training\User;
use App\Training\UserAddress;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;

use App\Training\Transformers\UserTransformer;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $includes = explode(',', $request->includes ?? '');
        $includes = array_filter($includes);

        $users = !empty($includes) ? User::with($includes)->get() : User::get();

        $fractal = new Manager();
        $fractal->parseIncludes($request->includes ?? '');
        $resource = new Collection($users, new UserTransformer);

        $data = $fractal->createData($resource)->toArray();

        return response()->json($data);
    }

    public function store(UserStoreRequest $request)
    {
        $user = new User($request->all());
        $user->save();

        $address = new UserAddress($request->all());
        $user->address()->save($address);

        $fractal = new Manager();
        $resource = new Item($user, new UserTransformer);

        $data = $fractal->createData($resource)->toArray();

        return response()->json($data);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
