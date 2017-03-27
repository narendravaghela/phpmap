<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getMap()
    {
        return view('map');
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getImprint()
    {
        return view('pages.imprint');
    }
}
