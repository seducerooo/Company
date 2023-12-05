<?php

namespace App\Http\Controllers\v1\backend;


use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Hekmatinasser\Verta\Verta;
use Hekmatinasser\Jalali\Jalalian;


class ProfileController extends Controller
{
    //
    public function index(){
        $user_id = Auth::user()->id;
        $UserData = User::query()->with('profile')->findOrFail($user_id);

        return view('backend.profile.index',compact('UserData'));
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        // Get the user's profile or create a new one if it doesn't exist
        $profile = Profile::firstOrNew(['user_id' => $user_id]);

        // Set the profile attributes
        $profile->user_id = $user_id;
        $profile->dob = Verta::parse($request['dob'], 'Asia/Tehran')->format('Y-m-d');

        if ($request->file('photo')) {
            // Process and save the photo
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(100, 100)->save('upload/customer_images/' . $name_gen);
            $save_url = 'upload/customer_images/' . $name_gen;
            $profile->photo = $save_url;
        }

        // Set other profile attributes
        $profile->phone = $request->input('phone');
        $profile->country = preg_replace('/\s+/', ' ', trim($request['country']));
        $profile->city = preg_replace('/\s+/', ' ', trim($request['city']));

        // Save the profile
        $profile->save();

        return redirect()->route('dashboard');
    }

}
