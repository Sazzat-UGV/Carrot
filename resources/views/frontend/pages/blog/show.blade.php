@extends('frontend.layouts.app')

@section('title')
    Blog Details
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Blog Details'])
    <section class="blog-details padding-tb-100">
        <div class="container">
            <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div class="col-lg-12">
                    <div class="cr-blog-details">
                        <div class="cr-blog-details-image">
                            <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt="image">
                        </div>
                        <div class="cr-blog-details-content">
                            <div class="cr-admin-date">
                                <span><code>By {{ $blog->user->name }}</code> / Date -
                                    {{ $blog->created_at->format('d F, Y') }}</span>
                            </div>
                            <div class="cr-banner">
                                <h2>{{ $blog->title }}</h2>
                            </div>
                            <p class="mb-15">{!! $blog->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
