@extends('front.layouts.app')

@section('title', $page->meta_title ?? ($page->title ?? 'Contact Us'))
@section('meta_description', $page->meta_description ?? ($page->excerpt ?? ''))
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')
    <!-- Page Header Start -->
    <div class="page-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 80px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box" style="text-align: center; color: white;">
                        <h1 style="color: white; margin-bottom: 15px;">{{ $page->title ?? 'Contact Us' }}</h1>
                        @if ($page && $page->excerpt)
                            <p style="color: rgba(255,255,255,0.9); font-size: 18px;">{{ $page->excerpt }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Section Start -->
    <div class="contact-section" style="padding: 80px 0;">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-5">
                    @if ($page && $page->content)
                        <div class="contact-info" style="margin-bottom: 40px;">
                            {!! $page->content !!}
                        </div>
                    @endif
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="contact-form-wrapper" style="background: #f8f9fa; padding: 40px; border-radius: 10px;">
                        <h3 style="margin-bottom: 30px;">Send Us a Message</h3>

                        @if (session('success'))
                            <div class="alert alert-success"
                                style="padding: 15px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 20px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger"
                                style="padding: 15px; background: #f8d7da; color: #721c24; border-radius: 5px; margin-bottom: 20px;">
                                <ul style="margin: 0; padding-left: 20px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('front.contact.submit') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6" style="margin-bottom: 20px;">
                                    <label for="name" style="display: block; margin-bottom: 5px; font-weight: 600;">Name
                                        *</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                        style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>

                                <div class="col-md-6" style="margin-bottom: 20px;">
                                    <label for="email"
                                        style="display: block; margin-bottom: 5px; font-weight: 600;">Email *</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                        style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>

                                <div class="col-md-6" style="margin-bottom: 20px;">
                                    <label for="phone"
                                        style="display: block; margin-bottom: 5px; font-weight: 600;">Phone</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                        style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>

                                <div class="col-md-6" style="margin-bottom: 20px;">
                                    <label for="subject"
                                        style="display: block; margin-bottom: 5px; font-weight: 600;">Subject</label>
                                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                        style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>

                                <div class="col-12" style="margin-bottom: 20px;">
                                    <label for="message"
                                        style="display: block; margin-bottom: 5px; font-weight: 600;">Message *</label>
                                    <textarea id="message" name="message" rows="5" required
                                        style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px;">{{ old('message') }}</textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn-default"
                                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 40px; border: none; border-radius: 5px; cursor: pointer; font-weight: 600;">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->

    @if ($page && $page->featured_image)
        <!-- Map or Image Section -->
        <div class="map-section" style="margin-bottom: 80px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('storage/' . $page->featured_image) }}" alt="Location Map"
                            class="img-fluid rounded" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
