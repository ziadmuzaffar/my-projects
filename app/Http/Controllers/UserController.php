<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    private string $root = 'pages.users.';

    public function edit()
    {
        return view($this->root.__FUNCTION__, [
            'user' => auth()->user()
        ]);
    }

    public function update(UserRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = request('image')->store('users', 'images');
            $data['image'] = $image;
        }
        if (!$request->password) {
            $data['password'] = auth()->user()->password;
        }
        User::findOrFail(auth()->id())->update($data);
        return back()->with('success', 'تمت العملية بنجاح');
    }
}
