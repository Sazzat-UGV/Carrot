@extends('frontend.layouts.app')

@section('title')
    Blog
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Blog'])
    <section class="section-blog-Classic padding-tb-100">
        <div class="container">
            <div class="row mb-minus-24">
                @foreach ($blogs as $blog)
                    <div class="col-lg-6 mb-24">
                        <div class="cr-blog-classic aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                            data-aos-delay="400">
                            <div class="cr-blog-classic-content">
                                <div class="cr-comment">
                                    <span>By {{ $blog->user->name }}</span>
                                </div>
                                <h4>{{ $blog->title }}</h4>
                                <p>{{ $blog->short_description }}</p>
                                <a href="{{ route('blog.details', $blog->slug) }}">read more</a>
                            </div>
                            <div class="cr-blog-image">
                                <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt="image">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $blogs->links('pagination::custom_pagination') }}
        </div>
    </section>
@endsection

@push('script')
@endpush
