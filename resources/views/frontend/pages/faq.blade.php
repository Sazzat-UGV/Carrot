@extends('frontend.layouts.app')

@section('title')
    FAQ
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'FAQ'])
    <section class="section-faq padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cr-faq aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{ $faq->id }}">
                                        <button class="accordion-button shadow-none collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}"
                                            aria-expanded="false" aria-controls="collapse-{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#accordionExample"
                                        style="">
                                        <div class="accordion-body">
                                            <p>
                                                {{ $faq->answer }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
