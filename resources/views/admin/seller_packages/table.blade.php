<div class="col-sm-xs-12 col-md-12">
    <div class="card">
        <div class="card-header input-title">
            <h4>{{__('Packages')}}</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                    <tr>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('duration') }}</th>
                        <th>{{ __("product_upload_limit") }}</th>
                        @if(hasPermission('package_status_change'))
                            <th>{{ __('Status') }}</th>
                        @endif
                        @if(hasPermission('package_update') || hasPermission('package_destroy'))
                            <th>{{__('Options')}}</th>
                        @endif
                    </tr>

                    @foreach($packages as $key => $package)
                        @php
                            $title = $package->getTranslation('title', app()->getLocale());
                        @endphp
                        <tr id="row_{{ $key+1 }}" class="table-data-row">
                            <td>{{ $packages->firstItem() + $key }}</td>
                            <td>
                                @if ($package->image && @arrayCheck('image_40x40',$package->image) && @is_file_exists($package->image['image_40x40'], @$package->image['storage']))
                                    <img src="{{ get_media($package->image['image_40x40'], $package->image['storage']) }}"
                                         alt="{{ $title }}"
                                         class="mr-3 rounded">
                                @else
                                    <img src="{{ static_asset('images/default/default-image-40x40.png') }}"
                                         alt="{{ $title }}"
                                         class="mr-3 rounded">
                                @endif
                                {{ $title }}
                            </td>
                            <td>{{ $package->is_free == 1 ? __('free') : get_price($package->price) }}</td>
                            <td>{{ $package->duration }} {{ __('days') }}</td>
                            <td>{{ $package->product_upload_limit }}</td>
                            <td>
                                <label class="custom-switch mt-2 {{ hasPermission('package_status_change') ? '' : 'cursor-not-allowed' }}">
                                    <input type="checkbox" name="custom-switch-checkbox" data-type="package"
                                           value="package-status-change/{{$package->id}}"
                                           {{ $package->status == 1 ? 'checked' : '' }} {{ hasPermission('package_status_change') ? '' : 'disabled' }} class="{{ hasPermission('package_status_change') ? 'subscription-status-change' : '' }} custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </td>
                            <td>
                                @if(hasPermission('package_update'))
                                    <a href="{{route('seller_packages.edit',$package->id)}}"
                                       class="btn btn-outline-secondary btn-circle"
                                       data-toggle="tooltip" title=""
                                       data-original-title="{{ __('Edit') }}"><i class="bx bx-edit"></i></a>
                                @endif
                                @if(hasPermission('package_destroy'))
                                    <a href="javascript:void(0)"
                                       onclick="delete_row('seller-packages/destroy/',{{ $package->id }})"
                                       class="btn btn-outline-danger btn-circle" data-toggle="tooltip"
                                       title=""
                                       data-original-title="{{ __('Delete') }}"><i class="bx bx-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <nav class="d-inline-block">
                {{ $packages->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </div>
</div>