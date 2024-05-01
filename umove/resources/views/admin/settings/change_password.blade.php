<x-admin-layout>
    <x-slot name="header">{{ __(' Change Password') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Change My Password <small>try to scroll the page</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('dashboard') }}" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-brand" id="submit">
                                <i class="la la-check"></i>
                                <span class="kt-hidden-mobile">Save</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    {!! Form::model($user, ['method' => 'POST','route' => ['change-password'], 'class'=> 'kt-form', 'id'=>'kt_form_1', 'enctype'=>"multipart/form-data" ]) !!}
                        <div class="kt-form__content">
                            <div class="kt-alert m-alert--icon alert alert-danger kt-hidden" role="alert" id="kt_form_1_msg">
                                <div class="kt-alert__icon">
                                    <i class="la la-warning"></i>
                                </div>
                                <div class="kt-alert__text">
                                    Oh snap! Change a few things up and try submitting again.
                                </div>
                                <div class="kt-alert__close">
                                    <button type="button" class="close" data-close="alert" aria-label="Close">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">* Current Password</label>
                                            <div class="col-9">
                                                {!! Form::password('current-password', array('placeholder' => 'Current Password','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">* New Password</label>
                                            <div class="col-9">
                                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Confirm New Password</label>
                                            <div class="col-9">
                                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-xl-2"></div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    @push('css')
    @endpush
    @push('scripts')
    <script src="{{ asset('js/admin/change-password.js') }}" type="text/javascript"></script>
    @endpush
    
</x-admin-layout>
