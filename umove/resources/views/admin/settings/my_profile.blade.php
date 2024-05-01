<x-admin-layout>
    <x-slot name="header">{{ __(' My Profile') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">My Profile <small>try to scroll the page</small></h3>
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
                    {!! Form::model($user, ['method' => 'POST','route' => ['my-profile'], 'class'=> 'kt-form', 'id'=>'kt_form_1', 'enctype'=>"multipart/form-data" ]) !!}
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
                                    <h3 class="kt-section__title">1. Basic Info:</h3>
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">* Name</label>
                                            <div class="col-9">
                                                {!! Form::text('email', null, array('placeholder' => '','class' => 'form-control','readonly')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">* Name</label>
                                            <div class="col-9">
                                                {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Phone</label>
                                            <div class="col-9">
                                                {!! Form::text('tel', null, array('placeholder' => '','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label class="col-3 col-form-label">*Logo</label>
											<div class="col-9">
                                                @if(isset($logo) && !empty($logo) && file_exists(public_path().$logo))
                                                <div class="fileinput fileinput-exists" data-provides="fileinput" data-name="logo">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="display: table-cell; border:1px solid #ddd; padding: 10px;"> 
                                                        <img width="120" src="{{ asset($logo).'?t='.time() }}" >
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-outline-brand btn-file">
                                                            <span class="fileinput-new"> Select Image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file"> 
                                                        </span>
                                                    </div>
                                                </div>    
                                                @else
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="display: table-cell; "> </div>
                                                    <div>
                                                        <span class="btn btn-outline-brand btn-file">
                                                            <span class="fileinput-new"> Select Image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="logo"> 
                                                        </span>
                                                        <a href="javascript:;" class="btn btn-outline-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>      
                                                @endif
												<div>
                                                    <span class="m-form__help">
                                                        The logo must be min 300x400 pixel!
                                                    </span>
                                                </div>
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
    <link href="{{ asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />   
    <style>
    
    .fileinput-preview.thumbnail img {
        width: 120px;
    }
   </style> 
    @endpush
    @push('scripts')
    <script src="{{ asset('js/admin/profile.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>         

    
    @endpush
    
</x-admin-layout>
