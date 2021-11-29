<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
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
            'can_manage_users' => $request->input('can.manageUsers'),
            'can_login' => $request->input('can.login'),
            'can_be_chairman_at_public_meetings' => $request->input('canBe.chairmanAtPublicMeetings'),
            'can_be_watchtower_reader' => $request->input('canBe.watchtowerReader'),
            'can_be_service_meetings_leader' => $request->input('canBe.serviceMeetingsLeader'),
        ]);


        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
