<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Users.Users', compact('users'));
    }

    public function UsersEditUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^[6-9]\d{9}$/'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // dd($request->all());

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }

    public function delete_users($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        // Backup data before deleting
        $deletedUser = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'created_at' => $user->created_at
        ];

        $user->delete();

        return response()->json([
            'success' => true,
            'user' => $deletedUser
        ]);
    }
}
