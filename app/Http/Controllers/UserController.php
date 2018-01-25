<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseMessage;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Models\Email;
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
    public function index(Request $request)
    {
        $users = User::with('emails')->paginate($request->get('max', 10));

        return ResponseMessage::ok(new UsersResource($users));
    }

    /**
     * Store a newly created user in storage.
     *
     * POST /api/users
     *
     * @param  UserStoreRequest $request
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User($request->except(['emails']));
        $emails = $request->get('emails');


        if ($user->save()) {
            $saved = collect($emails)->reduce(function ($saved, String $emailAddress) use ($user) {
                $email = new Email([
                    'address' => $emailAddress,
                    'user_id' => $user->id,
                ]);

                return $email->save() && $saved;
            }, true);

            if(!$saved) {
                return ResponseMessage::error(__("An error occured. One of the email addresses has not been saved successfully."));
            }

            return ResponseMessage::created(new UserResource($user));
        } else {
            return ResponseMessage::error(__("An error occured. User could not be created."));
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
