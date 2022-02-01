<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function getArticles() {
        return article::all();
    }

    public function addArticle(Request $request) {

        $request->validate([
            'title' => ['required', 'string', 'min: 5', 'max: 30'],
            'description' => ['required', 'string', 'min: 5', 'max: 30'],
            'price' => ['required', 'min: 0'],
            'more_info' => ['required', 'string', 'min: 10', 'max: 250'],
        ]);

        //Fetch the image name
        $name = $request->photo->getClientOriginalName();
        article::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'more_info' => $request->more_info,
            'created_by' => $request->created_by,
            'picture' => $name,
        ]);

        $request->photo->storeAs('articles', $name, 'public');
    }

    public function viewArticle($id) {
        if (DB::table('articles')->where('id', $id)->exists()) {
            $article = DB::table('articles')->where('id', $id)->get();
            return view('article-view')->with("article", $article);
        } else {
            dd("nema");
        }
    }

    public function getEditArticle($id) {
        if (DB::table('articles')->where('id', $id)->exists()) {
            $article = DB::table('articles')->where('id', $id)->get();
            return view('article-edit')->with("article", $article);
        } else {
            dd("nema");
        }
    }

    public function editArticle(Request $request, $id) {
        //First validate the textual components
        $request->validate([
            'title' => ['required', 'string', 'min: 5', 'max: 30'],
            'description' => ['required', 'string', 'min: 5', 'max: 30'],
            'price' => ['required', 'min: 0'],
            'more_info' => ['required', 'string', 'min: 10', 'max: 250'],
        ]);

        //Check if there is a new image. If no, just save changes. If yes, update it.
        if ($request->newImage == 0) {
            DB::table('articles')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'more_info' => $request->more_info,
            ]);
        } else {
            //Fetch the new picture's name, but KEEP the old one in storage!
            $name = $request->photo->getClientOriginalName();
            $request->photo->storeAs('articles', $name, 'public');

            DB::table('articles')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'more_info' => $request->more_info,
                'picture' => $name,
            ]);
        }
    }

    //Checks if the user is subscribed to the currently displayed article
    public function isSubscribed(Request $request, $id) {
        if( DB::table('subscriptions')->where( [ ['subscribed_user', '=', $request->userId], ['subscribed_article', '=', $id] ] )->exists() ) {
            return 1;
        } else {
            return 0;
        }
    }

    public function subscribe(Request $request, $id) {
        subscription::create([
            'subscribed_user' => $request->userId,
            'subscribed_article' => $id,
        ]);
    }

    public function unsubscribe(Request $request, $id) {
        DB::table('subscriptions')
            ->where( [ ['subscribed_user', '=', $request->userId], ['subscribed_article', '=', $id] ] )
            ->delete();
    }

    public function deleteArticle($id) {
        //First any active user subscriptions to the article to avoid breaking any FK constraints
        DB::table('subscriptions')
            ->where('subscribed_article', '=', $id)
            ->delete();
        //And then we delete it
        DB::table('articles')
            ->where('id', '=', $id)
            ->delete();
    }
}