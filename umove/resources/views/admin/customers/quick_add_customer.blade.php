<div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title">ADD CUSTOMER</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="kt-form" id="kt_form_1" >
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
                            <div class="form-group row">
                                <label class="col-3 col-form-label">*Name</label>
                                <div class="col-9">
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">*Telephone</label>
                                <div class="col-9">
                                {!! Form::text('tel', null, array('placeholder' => 'Tel','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">*Email</label>
                                <div class="col-9">
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-3 col-form-label">Address</label>
                                <div class="col-9">
                                {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-3 col-form-label">Postcode</label>
                                <div class="col-9">
                                {!! Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-3 col-form-label">City</label>
                                <div class="col-9">
                                {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-3 col-form-label">Country</label>
                                <div class="col-9">
                                {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="message_form"></div>
                </div>
                <div class="col-xl-2"></div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="confirm_customer"> Save </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
     $( "#kt_form_1" ).validate({
            // define validation rules
            rules: {
                //= Client Information(step 3)
                // Billing Information
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                },
                tel: {
                    required: true,
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                console.log(event);
                event.preventDefault();
                
            },

            submitHandler: function (form) {
                console.log(form);
                return false;
            }
        }); 
</script>

<!-- Script loading  -->

