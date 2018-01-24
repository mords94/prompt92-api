<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseMessage;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Lists users.
     *
     * GET /api/users
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return ResponseMessage::ok(new UsersResource($users));
    }

    /**
     * Store a newly created user in storage.
     *
     * POST /api/users
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());

        if($user->save()) {
            return ResponseMessage::Created(new UserResource($user));
        } else {
            return ResponseMessage::Error(__("An error occured. User could not be created."));
        }
    }

    /**
     * Display the specified user.
     *
     * GET /api/users/:id
     *
     * @param  User $user
     * @return Response
     */
    public function show(User $user)
    {
        return ResponseMessage::ok(new UserResource($user));
    }
}
