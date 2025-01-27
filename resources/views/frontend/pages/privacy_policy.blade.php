@extends('frontend.layouts.app')

@section('title')
    Privacy Policy
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Privacy Policy'])
    <section class="cr-policy padding-tb-100 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
        data-aos-delay="400">
        <div class="container">
            <div class="row">
                <div class="col-12 m-t-991">
                    <div class="cr-common-wrapper">
                        <div class="col-sm-12 cr-cgi-block">
                            <div class="cr-cgi-block-inner">
                                <p>{!! $page->privacy_policy !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
