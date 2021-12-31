<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        Gate::authorize('manage-users');

        return Inertia::render('Users/Index', [
            'users' => User::orderBy('lastname')
                        ->orderBy('firstname')
                        ->get()
                        ->map(function ($user) {
                            return [
                                'id' => $user->id,
                                'name' => "$user->lastname, $user->firstname",
                                'email' => $user->email,
                                'can' => [
                                    'login' => $user->can_login
                                ],
                                'canBe' => [
                                    'chairmanAtPublicMeetings' => $user->can_be_chairman_at_public_meetings,
                                    'watchtowerReader' => $user->can_be_watchtower_reader,
                                    'serviceMeetingsLeader' => $user->can_be_service_meetings_leader,
                                ]
                            ];
                        })
        ]);
    }

    public function create()
    {
        Gate::authorize('manage-users');

        return Inertia::render('Users/Create');
    }

    public function store(Request $request)
    {
        Gate::authorize('manage-users');

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $randomPassword = 'jw-neuwied-' . now()->toIso8601String();

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($randomPassword),
            'can_manage_users' => $request->input('can.manageUsers', false),
            'can_login' => $request->input('can.login', false),
            'can_manage_digital_board' => $request->input('can.manageDigitalBoard', false),
            'can_be_chairman_at_public_meetings' => $request->input('canBe.chairmanAtPublicMeetings', false),
            'can_be_watchtower_reader' => $request->input('canBe.watchtowerReader', false),
            'can_be_service_meetings_leader' => $request->input('canBe.serviceMeetingsLeader', false),
        ]);


        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        Gate::authorize('manage-users');

        return Inertia::render('Users/Edit', [
            'user' => [
                'id'        => $user->id,
                'firstname' => $user->firstname,
                'lastname'  => $user->lastname,
                'email'     => $user->email,
                'can'       => [
                    'login'       => $user->can_login,
                    'manageUsers' => $user->can_manage_users,
                    'manageDigitalBoard' => $user->can_manage_digital_board,
                ],
                'canBe'     => [
                    'chairman_at_public_meetings'    => $user->can_be_chairman_at_public_meetings,
                    'watchtower_reader'              => $user->can_be_watchtower_reader,
                    'can_be_service_meetings_leader' => $user->can_be_service_meetings_leader,
                ],
            ]
        ]);
    }

    public function update(Request $request, User $user)
    {
        Gate::authorize('manage-users');

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'can_manage_users' => $request->input('can.manageUsers', false),
            'can_login' => $request->input('can.login', false),
            'can_manage_digital_board' => $request->input('can.manageDigitalBoard', false),
            'can_be_chairman_at_public_meetings' => $request->input('canBe.chairmanAtPublicMeetings', false),
            'can_be_watchtower_reader' => $request->input('canBe.watchtowerReader', false),
            'can_be_service_meetings_leader' => $request->input('canBe.serviceMeetingsLeader', false),
        ]);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        Gate::authorize('manage-users');

        $user->delete();

        return redirect()->route('users.index');
    }
}
