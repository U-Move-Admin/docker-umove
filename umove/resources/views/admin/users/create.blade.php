<x-admin-layout>
    <x-slot name="header">{{ __('Users') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Create a New User <small>try to scroll the page</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('users.index') }}" class="btn btn-clean kt-margin-r-10">
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
                    <form class="kt-form" id="kt_form_1" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                        </div>
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="form-group row ">
                                            <label class="col-3 col-form-label">Is Agent?</label>
                                            <div class="col-9">
                                                <div class="kt-checkbox-list">
                                                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" >
                                                        <input type="checkbox" name="is_agent" checked> 
                                                        Yes
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Name*</label>
                                            <div class="col-9">
                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label class="col-3 col-form-label">Email*</label>
                                            <div class="col-9">
                                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tel*</label>
                                            <div class="col-9">
                                            {!! Form::text('tel', null, array('placeholder' => 'Telephone','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label class="col-3 col-form-label">Password*</label>
                                            <div class="col-9">
                                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Confirm Password*</label>
                                            <div class="col-9">
                                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row form-group-last">
                                            <label class="col-3 col-form-label">Roles*</label>
                                            <div class="col-9">
                                                <div class="kt-checkbox-list">
                                                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" >
                                                        <input id="all-permissions" type="checkbox" name="all[]"> 
                                                        Select All 
                                                        <span></span>
                                                    </label>
                                                    @foreach ($roles as $role)
                                                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" >
                                                        <input type="checkbox" name="roles[]" value="{{$role->id}}"> 
                                                        {{ucfirst($role->name)}} <br> 
                                                        <span></span>
                                                        
                                                    </label>
                                                    @endforeach
                                                </div>
                                                <div id="roles-error" class="form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/admin/user_form.js') }}" type="text/javascript"></script>
    @endpush
</x-admin-layout>

<!-- Script loading  -->

