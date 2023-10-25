<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Post;

class SitemapController extends Controller
{

    public function index()
    {
        $companies = Company::approved()->latest()->get();
        $posts = Post::latest()->get();
        return response()->view('sitemap', compact('companies', 'posts'))->header('Content-Type', 'text/xml');
    }
}
