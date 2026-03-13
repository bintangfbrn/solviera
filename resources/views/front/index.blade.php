@extends('front.layouts.app')

@section('title', $page->meta_title ?? ($page->title ?? 'Home'))
@section('meta_description', $page->meta_description ?? ($page->excerpt ?? ''))
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')
    <!-- Hero Section Start -->
    <div class="hero parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ config('app.name', 'Solviera') }}</h3>
                            <h1 class="text-anime-style-2" data-cursor="-opaque">{{ $page->title ?? 'Welcome to Solviera' }}
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">
                                {{ $page->excerpt ?? 'Solusi terbaik untuk kebutuhan digital bisnis Anda' }}</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Hero Button Start -->
                        <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('front.about') }}" class="btn-default">explore more</a>
                            <a href="{{ route('front.projects') }}" class="btn-default btn-highlighted">view projects</a>
                        </div>
                        <!-- Hero Button End -->
                    </div>
                    <!-- Hero Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    @if ($page && $page->content)
        <!-- Content Section Start -->
        <div class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-content">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Section End -->
    @endif

    <!-- CTA Section Start -->
    <div class="cta-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 80px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content" style="color: white;">
                        <h2 style="color: white; margin-bottom: 15px;">Ready to Start Your Project?</h2>
                        <p style="color: rgba(255,255,255,0.9);">Let's work together to bring your vision to life.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('front.contact') }}" class="btn-default"
                        style="background: white; color: #667eea;">Contact Us Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Section End -->
@endsection
