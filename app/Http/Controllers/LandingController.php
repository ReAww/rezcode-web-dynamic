<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ContactSubmission;
use App\Models\Project;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();
        $projects = Project::active()->get();
        $posts    = BlogPost::published()->limit(3)->get();
        $socials  = SocialLink::active()->get();

        return view('welcome', compact('services', 'projects', 'posts', 'socials'));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        ContactSubmission::create($validated);

        return redirect()->route('home')->with('success', 'Your message has been sent! We\'ll get back to you shortly.');
    }
}
