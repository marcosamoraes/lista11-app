<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;

class SitemapController extends Controller
{

    public function index()
    {
        $companies = Company::approved()->latest()->get();
        return response()->view('sitemap', compact('companies'))->header('Content-Type', 'text/xml');
    }
}
