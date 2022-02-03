<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function getAddArticle() {
        return view("article-add");
    }

    public function addArticle(Request $request) {
        $rules = [
            'title' => ['required', 'min:2'],
            'description' => ['required','min:2', 'max:50'],
            'price' => ['min:0', 'numeric'],
            'more_info' => ['required', 'min:10'],
            'picture' => ['required'],
        ];
        $messages = [
            'title.required' => 'Naslov je obavezan',
            'title.min' => 'Naslov je prekratak',

            'description.required' => 'Kartki opis je obavezan',
            'description.min' => 'Kratki opis je prekratak',
            'description.max' => 'Kratki opis je predug',

            'price.numeric' => 'Cijena mora biti pozitivan broj',
            'price.min' => 'Cijena mora biti pozitivan broj',

            'more_info.required' => 'Detaljni opis je obavezan',
            'more_info.min' => 'Detaljni opis mora biti duži od 10 znakova',

            'picture.required' => 'Slika je obavezna',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $name = auth()->user()->id . '-' . Str::random(15) . '-' . $request->picture->getClientOriginalName();
        $request->picture->storeAs('articlePictures', $name, 'public');
        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'more_info' => $request->more_info,
            'created_by' => Auth::user()->id,
            'picture' => $name,
        ]);

        return redirect()->route("viewArticle", $article->id);
    }

    public function viewArticle($id) {
        if (DB::table('articles')->where('id', $id)->exists()) {
            $article = DB::table('articles')->where('id', $id)->first();
            return view('article-view')->with("article", $article);
        } else {
            return view("not-found");
        }
    }

    public function getEditArticle($id) {
        if (DB::table('articles')->where('id', $id)->exists()) {
            $article = DB::table('articles')->where('id', $id)->first();
            return view('article-edit')->with("article", $article);
        } else {
            return view("not-found");
        }
    }

    public function editArticle(Request $request, $id) {
        $rules = [
            'title' => ['required', 'min:2'],
            'description' => ['required','min:2', 'max:50'],
            'price' => ['min:0', 'numeric'],
            'more_info' => ['required', 'min:10'],
        ];
        $messages = [
            'title.required' => 'Naslov je obavezan',
            'title.min' => 'Naslov je prekratak',

            'description.required' => 'Kartki opis je obavezan',
            'description.min' => 'Kratki opis je prekratak',
            'description.max' => 'Kratki opis je predug',

            'price.numeric' => 'Cijena mora biti pozitivan broj',
            'price.min' => 'Cijena mora biti pozitivan broj',

            'more_info.required' => 'Detaljni opis je obavezan',
            'more_info.min' => 'Detaljni opis mora biti duži od 10 znakova',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        //Check if there is a new image. If no, just save changes. If yes, update it.
        if ($request->picture == NULL) {
            DB::table('articles')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'more_info' => $request->more_info,
            ]);
        } else {
            $name = auth()->user()->id . '-' . Str::random(15) . '-' . $request->picture->getClientOriginalName();
            $request->picture->storeAs('articlePictures', $name, 'public');
            DB::table('articles')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'more_info' => $request->more_info,
                'picture' => $name,
            ]);
        }

        return redirect()->route("viewArticle", $id);
    }

    public function subscribe($id) {
        Subscription::create([
            'subscribed_user' => Auth::user()->id,
            'subscribed_article' => $id,
        ]);

        return redirect()->back();
    }

    public function unsubscribe($id) {
        DB::table('subscriptions')
            ->where('subscribed_user', '=', Auth::user()->id)->where('subscribed_article', '=', $id)
            ->delete();
        return redirect()->back();
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
        
            return redirect()->route("home");
    }
}