@extends('backend.layouts.app')
@section('title')
    Add Product
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
                    <h5 class="card-header mb-1 ">Add Product to <b>{{ $campaign->title }}</b> Campaign</h5>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Campaigns
                                </a>
                                <a href="{{ route('admin.product.list', $campaign->id) }}" class="btn btn-primary"><i
                                        class="bx bx-list-check"></i> Campaign Product List</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.all.product', $campaign->id) }}" method="GET">

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
                                    <th>Category</th>
                                    <th>Brand</th>
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
                                        <td class="wrap">{{ $product->category->name }}</td>
                                        <td class="wrap">{{ $product->brand->name }}</td>
                                        <td class="wrap">{{ $product->selling_price }}</td>
                                        <td class="wrap">
                                            @if (!$exist)
                                                <div class="text-sm-center mb-4">
                                                    <a href="{{ route('admin.add.product', [$product->id, $campaign->id]) }}"
                                                        class="btn btn-success btn-sm"><i class="bx bx-plus"></i></a>
                                                </div>
                                            @endif
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
@endpush
