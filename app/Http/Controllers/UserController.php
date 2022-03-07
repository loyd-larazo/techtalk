<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
  public function index(Request $request) {
    $users = User::all();
    return response()->json(['data' => $users]);
  }

  public function show(Request $request, $id) {
    $user = User::where('id', $id)->first();
    if (!$user) {
      return response()->json(['data' => 'User not found'], 404);  
    }

    return response()->json(['data' => $user]);
  }

  public function delete(Request $request) {
    $user = $request->get('user');
    if (!$user) {
      return response()->json(['data' => 'User not found'], 404);  
    }

    $user->delete();

    return response()->json(['data' => 'success']);
  }

  public function update(Request $request) {
    $user = $request->get('user');
    if (!$user) {
      return response()->json(['data' => 'User not found'], 404);
    }

    $firstname = $request->get('firstname') ? $request->get('firstname') : $user->firstname;
    $lastname = $request->get('lastname') ? $request->get('lastname') : $user->lastname;
    $password = $request->get('password');
    $email = $request->get('email');

    if ($email && ($email != $user->email)) {
      $emailUsed = User::where('email', $email)
                        ->where('email', '!=', $user->email)
                        ->first();
      if ($emailUsed) {
        return response()->json(['data' => 'Email is already exists'], 401);
      }
    }

    $user->firstname = $firstname;
    $user->lastname = $lastname;
    if ($email) {
      $user->email = $email;
    }
    
    if ($password) {
      $user->password = app('hash')->make($password);
    }

    $user->save();

    return response()->json(['data' => $user]);
  }

  public function login(Request $request) {
    $email = $request->get('email');
    $password = $request->get('password');

    $user = User::where('email', $email)->first();
    if (!$user || ($user && !Hash::check($password, $user->password))) {
      return response()->json(['error' => 'Invalid credentials.'], 400);
    }

    $token = sha1($email . time());
    $user->token = $token;
    $user->save();

    $user->makeVisible(['token']);

    return response()->json(['data' => $user]);
  }

  public function logout(Request $request) {
    $user = $request->get('user');

    $user->token = null;
    $user->save();

    return response()->json(['data' => 'success']);
  }

  public function register(Request $request) {
    $firstname = $request->get('firstname');
    $lastname = $request->get('lastname');
    $email = $request->get('email');
    $password = $request->get('password');

    $user = User::where('email', $email)->first();
    if ($user) {
      return response()->json(['error' => 'Account already exists.'], 400);
    }

    $newUser = User::create([
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'password'  => app('hash')->make($password)
    ]);

    return response()->json(['data' => $newUser]);
  }
}
