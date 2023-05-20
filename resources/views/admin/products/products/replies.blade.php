@extends('admin.partials.master')

@section('title')
    {{ __('Product Review Replies') }}
@endsection
@section('product_active')
    active
@endsection
@section('product_review')
    active
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{__('Product Reviews')}}</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{__('Reviews List')}}</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('User')}}</th>
                                        <th>{{__('Reply')}}</th>
                                    </tr>

                                    @foreach ($replies as $key => $reply)
                                        <tr id="row_{{$reply->id}}">
                                            <td>{{$replies->firstItem() + $key}}</td>
                                            <td>
                                                {{@$reply->user->full_name}}
                                            </td>
                                            <td>{{ $reply->reply}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav class="d-inline-block">
                                {{ $replies->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('admin.common.delete-ajax')



