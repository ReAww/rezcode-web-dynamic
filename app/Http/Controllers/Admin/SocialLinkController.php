<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::orderBy('sort_order')->get();
        return view('admin.social-links.index', compact('links'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform'   => 'required|string|max:50',
            'url'        => 'required|url|max:500',
            'icon'       => 'required|string|max:50',
            'color'      => 'required|string|max:20',
            'sort_order' => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        SocialLink::create($validated);

        return redirect()->route('admin.social-links.index')->with('success', 'Social link added.');
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'platform'   => 'required|string|max:50',
            'url'        => 'required|url|max:500',
            'icon'       => 'required|string|max:50',
            'color'      => 'required|string|max:20',
            'sort_order' => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $socialLink->update($validated);

        return redirect()->route('admin.social-links.index')->with('success', 'Social link updated.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('admin.social-links.index')->with('success', 'Social link deleted.');
    }
}
