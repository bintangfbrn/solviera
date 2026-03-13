<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display home page
     */
    public function index()
    {
        $page = Page::where('page_type', 'home')->published()->first();
        return view('front.index', compact('page'));
    }

    /**
     * Display about page
     */
    public function about()
    {
        $page = Page::where('page_type', 'about')->published()->first();
        return view('front.about', compact('page'));
    }

    /**
     * Display services page
     */
    public function services()
    {
        $page = Page::where('page_type', 'services')->published()->first();
        return view('front.services', compact('page'));
    }

    /**
     * Display projects page
     */
    public function projects()
    {
        $page = Page::where('page_type', 'projects')->published()->first();
        return view('front.projects', compact('page'));
    }

    /**
     * Display blog page
     */
    public function blog()
    {
        $page = Page::where('page_type', 'blog')->published()->first();
        return view('front.blog', compact('page'));
    }

    /**
     * Display gallery page
     */
    public function gallery()
    {
        $page = Page::where('page_type', 'gallery')->published()->first();
        return view('front.gallery', compact('page'));
    }

    /**
     * Display FAQs page
     */
    public function faqs()
    {
        $page = Page::where('page_type', 'faqs')->published()->first();
        return view('front.faqs', compact('page'));
    }

    /**
     * Display contact page
     */
    public function contact()
    {
        $page = Page::where('page_type', 'contact')->published()->first();
        return view('front.contact', compact('page'));
    }

    /**
     * Handle contact form submission
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Here you can send email or save to database
        // For now, just redirect back with success

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
