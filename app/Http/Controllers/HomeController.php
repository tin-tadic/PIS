<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $articles = Article::all();

        return view('index')->with("articles", $articles);
    }

    public function search(Request $request) {
        $searchFor = $request->input('searchFor');
        $sortBy = $request->sortBy;

        switch($sortBy){
            case "titleDesc":
                $articles = Article::where('title', 'like', '%' . $searchFor . '%')
                ->orderBy('title', 'desc')
                ->get();

                break;
            case "titleAsc":
                $articles = Article::where('title', 'like', '%' . $searchFor . '%')
                ->orderBy('title', 'asc')
                ->get();

                break;
            case "priceDesc":
                $articles = Article::where('title', 'like', '%' . $searchFor . '%')
                ->orderBy('price', 'desc')
                ->get();

                break;
            case "priceAsc":
                $articles = Article::where('title', 'like', '%' . $searchFor . '%')
                ->orderBy('price', 'asc')
                ->get();

                break;
            default:
                $articles = Article::where('title', 'like', '%' . $searchFor . '%')->get();
        }

        return view('index')->with('articles', $articles);
    }
}
