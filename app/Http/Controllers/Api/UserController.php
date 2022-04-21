<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        return User::create($data);
    }


    public function show(User $user)
    {
        return $user;
    }


    public function update(Request $request, User $user)
    {
        $data = $request->all();
        //$data['password'] = bcrypt($request->password);
        $user->fill($data);
        $user->save();

        return $user;
    }


    public function destroy(User $user)
    {
        $user->delete();

        return $user;
    }
}
