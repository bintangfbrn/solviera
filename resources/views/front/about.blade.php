@extends('front.layouts.app')

@section('title', $page->meta_title ?? ($page->title ?? 'About Us'))
@section('meta_description', $page->meta_description ?? ($page->excerpt ?? ''))
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')
    <!-- Page Header Start -->
    <div class="page-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 80px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box" style="text-align: center; color: white;">
                        <h1 style="color: white; margin-bottom: 15px;">{{ $page->title ?? 'About Us' }}</h1>
                        @if ($page && $page->excerpt)
                            <p style="color: rgba(255,255,255,0.9); font-size: 18px;">{{ $page->excerpt }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    @if ($page && $page->content)
        <!-- Content Section Start -->
        <div class="about-content-section" style="padding: 80px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="about-page-content">
                            @if ($page->featured_image)
                                <div class="featured-image" style="margin-bottom: 40px;">
                                    <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}"
                                        class="img-fluid rounded" style="width: 100%;">
                                </div>
                            @endif

                            <div class="content-body">
                                {!! $page->content !!}
                            </div>
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
                        <h2 style="color: white; margin-bottom: 15px;">Want to Learn More?</h2>
                        <p style="color: rgba(255,255,255,0.9);">Get in touch with us today.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('front.contact') }}" class="btn-default"
                        style="background: white; color: #667eea;">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Section End -->
@endsection
