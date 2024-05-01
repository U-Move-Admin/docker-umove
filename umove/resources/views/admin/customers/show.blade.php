<x-admin-layout>
    <x-slot name="header">{{ __('Customers') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Customer: {{ Str::ucfirst($customer->name) }} {{ Str::ucfirst($customer->surname) || null }}</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('customers.index') }}" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                    
                    </div>
                </div>
                <div class="kt-portlet__body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tel:</strong>
                                {{ $customer->tel }}
                            </div>
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $customer->email }}
                            </div>
                            <div class="form-group">
                                <strong>Address:</strong>
                                {{ $customer->address }}
                            </div>
                            <div class="form-group">
                                <strong>Postcode:</strong>
                                {{ $customer->postcode }}
                            </div>
                            <div class="form-group">
                                <strong>City:</strong>
                                {{ $customer->city }}
                            </div>
                            <div class="form-group">
                                <strong>Country:</strong>
                                {{ $customer->country }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                    
                
</x-admin-layout>

<!-- Script loading  -->

