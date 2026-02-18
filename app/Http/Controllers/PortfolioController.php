<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::active()->get();
        $categories = $projects->pluck('category')->unique()->sort()->values();

        return view('portfolio.index', compact('projects', 'categories'));
    }
}
