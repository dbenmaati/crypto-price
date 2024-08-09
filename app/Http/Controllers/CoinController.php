<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Post;
use App\Models\Setting;
use App\Models\page;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class CoinController extends Controller
{  
    public function index(Request $request)
    {
        $coins = Coin::orderBy('rank', 'asc')->where('confirmed', 1)->paginate(20);
        $posts = Post::orderBy('updated_at', 'asc')->where('is_published', 1)->take(3)->get();
        $pages = page::orderBy('created_at', 'asc')->get();
        $page = page::where('id', 1)->first();
        $settings = Setting::find(1);
 
        return view('pages.coins.index',compact('coins', 'posts', 'pages', 'page', 'settings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function single($slug)
    {
        $coin = Coin::where('slug', $slug)->first();
        $posts = Post::orderBy('updated_at', 'asc')->where('is_published', 1)->take(3)->get();
        $pages = Page::orderBy('created_at', 'asc')->get();
        $settings = Setting::find(1);

        if ($coin) {
            return view('pages.coins.single', compact('coin', 'posts', 'pages', 'settings'));
        } else {
            return redirect()->back()->with('message', 'Coin not found');
        }
    }



    public function gainers()
    {
        $posts = Post::orderBy('updated_at', 'asc')->where('is_published', 1)->take(3)->get();
        $pages = page::orderBy('created_at', 'asc')->get();
        $page = page::where('id', 3)->first();
        $settings = Setting::find(1);
 
        return view('pages.other.gainers',compact('posts', 'pages', 'page', 'settings'));
    }



    public function losers()
    {
        $posts = Post::orderBy('updated_at', 'asc')->where('is_published', 1)->take(3)->get();
        $pages = page::orderBy('created_at', 'asc')->get();
        $page = page::where('id', 4)->first();
        $settings = Setting::find(1);
 
        return view('pages.other.losers',compact('posts', 'pages', 'page', 'settings'));
    }

}
