@extends('backend.layouts.app')
@section('title')
    News letter List
@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">News letter List</h5>
                    <div class="col-md-12 col-lg-12 col-sm-12 py-4">
                        <div class="d-flex justify-content-end">

                            <div class="text-sm-end">
                                <a href="{{ route('admin.newsLetterformGet') }}" class="btn btn-primary"><i
                                        class="bx bx-mail-send"></i> Send Mail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="example" class="table table-" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Created At</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news_letters as $index => $news)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td class="wrap">{{ $news->created_at->diffForHumans() }}</td>
                                        <td class="wrap">{{ $news->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
