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

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy('updated_at', 'asc')->where('is_published', 1)->paginate(6);
        $pages = page::orderBy('created_at', 'asc')->get();
        $page = page::where('id', 5)->first();
        $settings = Setting::find(1);
 
        return view('pages.blog.index',compact('posts', 'pages', 'page', 'settings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function single($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $posts = Post::orderBy('updated_at', 'asc')->where('is_published', 1)->take(3)->get();
        $pages = page::orderBy('created_at', 'asc')->get();
        $settings = Setting::find(1);

        return view('pages.blog.single', compact('post','posts', 'pages', 'settings'));
               
    }

    public function page($slug)
    {
        $page = page::where('slug', $slug)->first();
        $pages = page::orderBy('created_at', 'asc')->get();
        $settings = Setting::find(1);

        return view('pages.page.single', compact('page', 'pages', 'settings'));
               
    }
}
