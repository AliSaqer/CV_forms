<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $Users = User::orderbydesc('id')->paginate(10);
        return view('users.users', compact('Users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'password' => $request->pwd,
            'email' => $request->email
        ]);

        return redirect()->route('users')->with('msg', 'ok');
    }

    function checkmail(Request $request)
    {
        $mail = User::Where('email', 'like', $request->txt)->first();

        if ($mail) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users')->with('msg', 'the user with id: ' . $id . ' deleted successfuly');
    }
}
