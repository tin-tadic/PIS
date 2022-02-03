<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;
use Response;

class ProfileController extends Controller
{
    //Function that fetches the profile of the currently viewed user profile
    public function display($id) {
        if ( DB::table('users')->where('id', $id)->exists() ) {
            $profile = DB::table('users')->where('id', $id)->first();
                
            $subscribedArticles = DB::table('subscriptions')
                ->where('subscribed_user', $id)
                ->join('articles', 'articles.id', '=', 'subscribed_article')
                ->get();
            
            foreach($subscribedArticles as $subscribedArticle) {
                if (DB::table('subscriptions')->where('subscribed_article',  $subscribedArticle->id)->exists()) {
                    $subscribedArticle->title = DB::table('articles')->where('id',  $subscribedArticle->id)->value('title');
                }
            }

            $coupons = DB::table('coupons')->where('ownedByUser', $id)->get();

            return view("profile")->with(['profile' => $profile,'subscribedArticles' => $subscribedArticles , 'coupons' => $coupons]);
        } else {
            return view("not-found");
        }
    }

    public function getEdit($id) {
        if ( DB::table('users')->where('id', $id)->exists() ) {
            $profile = DB::table('users')->where('id', $id)->first();
            return view("profile-edit")->with('profile', $profile);
        } else {
            return view("not-found");
        }
    }


    public function saveEdit(Request $request, $id){
        $currentUserMail = DB::table('users')->where('id', $id)->value('email');

        if ($currentUserMail != $request->email){
            $rules = [
                'email' => ['required', 'email', 'unique:users'],
                'age' => ['min:1', 'max:120'],
                'location' => ['min:2, max: 50']
            ];
            $messages = [
                'email.required' => 'Email je obavezan',
                'email.email' => 'Email je neispravan',
                'email.unique' => 'Email je već u uporabi.',

                'age.min' => 'Neispravna dob.',
                'age.max' => 'Neispravna dob.',

                'location.min' => 'Lokacija mora sadržavati minimalno 2 znaka.',
                'location.max' => 'Lokacija mora sadržavati maksimalno 2 znaka.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            DB::table('users')->where('id', $id)->update([
                'email' => $request->email,
                'age' => $request->age,
                'gender' => $request->gender,
                'location' => $request->location,
            ]);

        } else {
            $rules = [
                'age' => ['min:1', 'max:120'],
                'location' => ['min:2, max: 50']
            ];
            $messages = [
                'age.min' => 'Neispravna dob.',
                'age.max' => 'Neispravna dob.',

                'location.min' => 'Lokacija mora sadržavati minimalno 2 znaka.',
                'location.max' => 'Lokacija mora sadržavati maksimalno 2 znaka.',
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            DB::table('users')->where('id', $id)->update([
                'age' => $request->age,
                'gender' => $request->gender,
                'location' => $request->location,
            ]);
        }

        // If there is an image change, upload the new one and delete the old one if it exists
        if($request->avatar) {
            if (DB::table('users')->where('id', $id)->value('avatar') != NULL) {
                $oldAvatar = DB::table('users')->where('id', $id)->value('avatar');
                Storage::delete('/public/profilePictures/' . $oldAvatar);
            }
            $name = auth()->user()->id . '-' . Str::random(15) . '-' . $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('profilePictures', $name, 'public');
            DB::table('users')->where('id', $id)->update([
                'avatar' => $name,
            ]);
        }

        return redirect()->route("getGetProfile", $id);
    }
    
    //Function that bans the selected user
    public function banUser($id) {
        DB::table('users')->where('id', $id)->update(['isBanned' => 1]);
        return redirect()->back();
    }
    //Function that unbans the selected user
    public function unbanUser($id) {
        DB::table('users')->where('id', $id)->update(['isBanned' => 0]);
        return redirect()->back();
    }
    //Function that makes the selected user an admin
    public function adminUser($id) {
        DB::table('users')->where('id', $id)->update(['role' => 1]);
        return redirect()->back();
    }
    //Function that un-makes the selected user an admin
    public function unadminUser($id) {
        DB::table('users')->where('id', $id)->update(['role' => 0]);
        return redirect()->back();
    }

    public function removeCoupon($id) {
        if(DB::table('coupons')->where('coupon_id', $id)->exists()) {
            DB::table('coupons')->where('coupon_id', $id)->delete();
        }
        return redirect()->back();
    }

}
