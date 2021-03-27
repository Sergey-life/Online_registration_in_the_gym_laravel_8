<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser()
    {
        return view('form');
    }

    public function storeUser(Request $request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $phoneNumber = $request->phone_number;
        $email = $request->email;
        $monthlySubscription = $request->monthly_subscription;
        $discountRateForAyear = $request->discount_rate_for_a_year;
        $image = $request->file('file');
        if (!empty($image)){
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
        }

        $user = new User();
        $user->name = $name;
        $user->surname = $surname;
        $user->phone_number = $phoneNumber;
        $user->email = $email;
        $user->monthly_subscription = $monthlySubscription;
        $user->discount_rate_for_a_year = $discountRateForAyear;
        if (!empty($imageName)){
            $user->profileImage = $imageName;
        }
        $user->save();
        return back()->with('user_added', 'User record has been inserted');
    }

    public function users()
    {
        $users = User::all();
        return view('index', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $phoneNumber = $request->phone_number;
        $email = $request->email;
        $monthlySubscription = $request->monthly_subscription;
        $discountRateForAyear = $request->discount_rate_for_a_year;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $user = User::find($request->id);
        $user->name = $name;
        $user->surname = $surname;
        $user->phone_number = $phoneNumber;
        $user->email = $email;
        $user->monthly_subscription = $monthlySubscription;
        $user->discount_rate_for_a_year = $discountRateForAyear;
        $user->profileImage = $imageName;
        $user->save();
        return back()->with('user_updated', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        unlink(public_path('images').'/'.$user->profileImage);
        $user->delete();
        return redirect()->route('users.all');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('show', compact('user'));
    }
}
