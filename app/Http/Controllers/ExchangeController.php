<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
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


class ExchangeController extends Controller
{
    public function index(Request $request)
    {
        $exchanges = Exchange::orderBy('rank', 'asc')->where('confirmed', 1)->paginate(20);
        $posts = Post::orderBy('updated_at', 'asc')->where('is_published', 1)->take(3)->get();
        $pages = page::orderBy('created_at', 'asc')->get();
        $page = page::where('id', 2)->first();
        $settings = Setting::find(1);
 
        return view('pages.exchanges.index',compact('exchanges', 'posts', 'pages', 'page', 'settings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function single($slug)
    {
        $exchange = Exchange::where('slug', $slug)->first();
        $posts = Post::orderBy('updated_at', 'asc')->where('is_published', 1)->take(3)->get();
        $pages = page::orderBy('created_at', 'asc')->get();
        $settings = Setting::find(1);

        return view('pages.exchanges.single', compact('exchange', 'posts', 'pages', 'settings'));
               
    }
}
