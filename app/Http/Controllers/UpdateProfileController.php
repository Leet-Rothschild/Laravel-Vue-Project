<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UpdateProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming data (you can customize the validation rules as needed)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update the user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        // Return the updated user as JSON response
        return response()->json($user);
    }
}
