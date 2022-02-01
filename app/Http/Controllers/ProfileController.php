<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //Function that fetches the profile of the currently viewed user profile
    public function display($id) {
        if ( DB::table('users')->where('id', $id)->exists() ) {
            $profile = DB::table('users')->where('id', $id)->get();
            dd($profile);
            return view("profile")->with('profile', $profile);
        } else {
            dd("Not found");
        }
    }

    //Function that gets the list of subscribed articles for the currently viewed user profile
    public function getSubscribedArticles($id) {
        if ( DB::table('subscriptions')->where('subscribed_user', $id)->exists() ) {
            $subscribedArticles = DB::table('subscriptions')
                ->where('subscribed_user', $id)
                ->join('articles', 'articles.id', '=', 'subscribed_article')
                ->get();
            return $subscribedArticles;
        } else {
            return 0;
        }
    }

    //Function to save changes to a user's profile
    public function saveEdit(Request $request, $id){
        //First we have check the email of the user we are editing
        //If the submitted data's email is the same as the already existing one, we cannot validate it with the "unique" rule as it already exists
        $currentUserMail = DB::table('users')->where('id', $id)->value('email');

        if($currentUserMail != $request->email){
            $request->validate([
                'email' => ['required', 'email', 'unique:users'],
                'age' => ['min:0', 'max:120'],
                'message' => ['max: 1023'],
            ]);
            DB::table('users')->where('id', $id)->update([
                'email' => $request->email,
                'age' => $request->age,
                'gender' => $request->gender,
                'location' => $request->location,
                'message' => $request->message,
            ]);
        } else {
            //If it is not different, then we do not verify it as unique since it already will be unique and we do not change it
            $request->validate([
                'email' => ['required', 'email'],
                'age' => ['min:0', 'max:120'],
                'message' => ['max: 1023'],
            ]);
            DB::table('users')->where('id', $id)->update([
                'age' => $request->age,
                'gender' => $request->gender,
                'location' => $request->location,
                'message' => $request->message,
            ]);
        }
    }

    //Function to save the user's avatar
    public function uploadAvatar(Request $request, $id) {
        $name = $request->photo->getClientOriginalName();

        //If the user has no avatar we just insert it
        if (DB::table('users')->where('id', $id)->value('avatar') == null) {
            DB::table('users')->where('id', $id)->update(['avatar' => $name]);
            $request->photo->storeAs('images', $name, 'public');
        } else {
            //If the user already has an avatar we delete the old one...
            $old_name = DB::table('users')->where('id', $id)->value('avatar');
            Storage::delete('/public/images/'.$old_name);
            //...and only then we insert the new one. This is to delete unused images and conserve space
            DB::table('users')->where('id', $id)->update(['avatar' => $name]);
            $request->photo->storeAs('images', $name, 'public');
        }
    }
    
    //Function that bans the selected user
    public function banUser($id) {
        DB::table('users')->where('id', $id)->update(['isBanned' => 1]);
    }
    //Function that unbans the selected user
    public function unbanUser($id) {
        DB::table('users')->where('id', $id)->update(['isBanned' => 0]);
    }
    //Function that makes the selected user an admin
    public function adminUser($id) {
        DB::table('users')->where('id', $id)->update(['role' => 1]);
    }
    //Function that un-makes the selected user an admin
    public function unadminUser($id) {
        DB::table('users')->where('id', $id)->update(['role' => 0]);
    }

    


}
