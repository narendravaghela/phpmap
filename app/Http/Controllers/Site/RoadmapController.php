<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\Roadmap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoadmapController extends Controller
{
    public function index()
    {
        $roadmap = Roadmap::all();

        return view('roadmap.list', compact('roadmap'));
    }
}
