<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $dataArray  = $request->validate(
            [
                'registrationid' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users',
            ]
        );
        if ($request->hasFile('image')) {
            $imageName = $request->registrationid.'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $user = new User();
        $user->registrationid = $request->registrationid;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->imgfile = $imageName;
        $user->save();
        return response()->json(['test' => $user]);
    }
}
