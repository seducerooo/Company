<?php

namespace App\Http\Controllers\v1\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index(){
        $user_id = Auth::user()->id;
        $UserData = User::query()->with('profile')->findOrFail($user_id);
        return view('backend.profile.index',compact('UserData'));
    }
}
