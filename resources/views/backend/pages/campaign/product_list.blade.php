@extends('backend.layouts.app')
@section('title')
    Campaign Product List
@endsection
@push('style')
    <style>
        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }

        .description-content {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: pre-wrap;
        }
    </style>
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header mb-1 ">Product for <b>{{ $campaign->title }}</b> Campaign</h5>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Campaigns
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.product.list', $campaign->id) }}" method="GET">

                        <div class="row d-flex justify-content-end">
                            <div class="col-auto mb-4 d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search" name="search"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn badge bg-label-primary waves-effect waves-light">
                                    <i class="bx bx-search align-middle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Product Name</th>
                                    <th>Code</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    @php
                                        $exist = App\Models\CampaignProduct::where('product_id', $product->id)
                                            ->where('campaign_id', $campaign->id)
                                            ->first();
                                    @endphp
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>
                                            <img src="{{ asset('uploads/product') }}/{{ $product->thumbnail }}"
                                                alt="Image" height="50" width="50" class="me-3">
                                        </td>
                                        <td class="wrap">{{ $product->name }}</td>
                                        <td class="wrap">{{ $product->code }}</td>
                                        <td class="wrap">{{ $product->selling_price }}</td>
                                        <td class="">
                                            <div class="text-sm-start mb-4">
                                                <a href="{{ route('admin.product.delete', [$product->id, $campaign->id]) }}"
                                                    class="btn btn-danger btn-sm delete"><i class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete').on('click', function(event) {
                event.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
@endpush
