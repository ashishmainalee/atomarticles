<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('backend.settings.about')
                ->with('about', $about);
    }

    public function updateAbout(Request $request)
    {
        // dd($request->only['site_policy']);
        $input = $request
                ->only(['site_name',
                        'site_description','email','facebook',
                        'site_policy', 'site_terms', 'address', 'contact_number']);

        $image = $request->file('site_logo');
        $site_image = $request->file('site_image');
        $site_banner = $request->file('site_banner');
        $input['site_description'] = preg_replace('/<span[^>]+\>/i', '', $input['site_description']);
        $input['site_description'] = preg_replace('/<p[^>]+\>/i', '', $input['site_description']);
        $input['site_policy'] = preg_replace('/<span[^>]+\>/i', '', $input['site_policy']);
        $input['site_terms'] = preg_replace('/<span[^>]+\>/i', '', $input['site_terms']);
        $input['site_policy'] = preg_replace('/<p[^>]+\>/i', '', $input['site_policy']);
        $input['site_terms'] = preg_replace('/<p[^>]+\>/i', '', $input['site_terms']);



        if($image) {
            $input['site_logo'] = uploadImage($image,'abouts' ,1000, 500);
        }


        if($site_image) {
            $input['site_image'] = uploadImage($site_image,'abouts' ,1000, 1000);
        }

        if($site_banner) {
            $input['site_banner'] = uploadImage($site_banner,'abouts' ,700, 87);
        }


        $about = About::first();
        $about = $about->update($input);

        if($about) {
           session()->flash('success', 'About us updated Successfully!');
        } else {
           session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.settings.about');
    }

    public function password()
    {
        $user = User::first();
        return view('backend.settings.password')->with('user', $user);
    }

    public function updatePassword(Request $request)
    {
        $user = User::first();

        $this -> validate($request, [
        	'new-password_confirmation' => 'required',
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
       ]);

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        	session()->flash("error","Your current password does not matches with the password you provided. Please try again.");
            return redirect()->back();
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        	session()->flash("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->back();
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        session()->flash("success","Password changed successfully");
        return redirect()->back();
    }

    public function profile()
    {
        $user = User::first();
        return view('backend.settings.profile')->with('user', $user);
    }

    public function updateProfile(Request $request)
    {
        $user = User::first();

        $input = $request->only(['name']);

        $image = $request->file('profile_image');

        $input['profile_image'] = updateNewImageOrKeepOld($image, $user->profile_image, 'abouts', 100, 100);
        $result = $user->update($input);

        if($result) {
             session()->flash('success', 'Profile Updated Successfully!');
        } else {
             session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.settings.profile');
    }
}
