@extends('frontend.pages.profile.layouts.app', ['title' => 'Ticket'])
@section('profile_content')
    <div class="cr-bl-block-content">
        <form action="{{ route('new.ticket') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="cr-check-bill-form mb-minus-24">
                <div class="row">
                    <div class="col-12">
                        <p>New Ticket</p>
                        <hr>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="cr-bl-block-content">
                            <div class="cr-check-bill-form mb-minus-24">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Subject<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter ticket subject"
                                                class="cr-form-control form-control @error('subject')
                                        is-invalid
                                    @enderror"
                                                value="{{ old('subject') }}" name="subject">
                                            @error('subject')
                                                <span class="invalid-feedback" style="font-size: 13px"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select style="padding-top: 11px;padding-bottom:11px"
                                                class="cr-form-control form-control @error('priority')
                                        is-invalid @enderror"
                                                aria-label="Default select example" name="priority">
                                                <option value="Low">Low</option>
                                                <option value="Medium">Medium</option>
                                                <option value="High">High</option>
                                            </select>
                                            @error('priority')
                                                <span class="invalid-feedback" style="font-size: 13px"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Service</label>
                                            <select style="padding-top: 11px;padding-bottom:11px"
                                                class="cr-form-control form-control @error('service')
                                        is-invalid @enderror"
                                                aria-label="Default select example" name="service">
                                                <option value="Technical">Technical</option>
                                                <option value="Payment">Payment</option>
                                                <option value="Affiliate">Affiliate</option>
                                                <option value="Return">Return</option>
                                                <option value="Refund">Refund</option>
                                            </select>
                                            @error('service')
                                                <span class="invalid-feedback" style="font-size: 13px"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Message<span class="text-danger">*</span></label>
                                            <textarea rows="3" placeholder="Enter your message" name="message"
                                                class=" form-control @error('message')
                                            is-invalid
                                        @enderror">{{ old('message') }}</textarea>
                                            @error('message')
                                                <span class="invalid-feedback" style="font-size: 13px;"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label for="ticket_image">Image</label>
                                            <input type="file" id="ticket_image" name="ticket_image"
                                                style="padding-bottom: 0px !important;margin-bottom: 0px !important"
                                                class="form-control-file pt-2 @error('ticket_image') is-invalid @enderror">
                                            @error('ticket_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="cr-check-order-btn change_profile mt-4">
                                <button type="submit" class="cr-button">Submit</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
