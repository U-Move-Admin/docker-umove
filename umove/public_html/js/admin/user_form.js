
// Class definition

var KTFormControls = function () {
    // Private functions
    
    

    var demo2 = function () {
        var form = $( "#kt_form_1" );
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        var validator = form.validate({
            errorClass: 'invalid-feedback', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            
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
                'roles[]': {
                    required: true,
                },
                tel: {
                    required: true,
                },
                password: {
                    required: true
                },
                'confirm-password': {
                    required: true,
                    equalTo: "#password"
                },
            },
            
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.parents('.kt-radio-list').length > 0 || element.parents('.kt-checkbox-list').length > 0) {
                    if (element.parents('.kt-radio-list').length > 0) {
                        error.appendTo(element.parents('.kt-radio-list')[0]);
                    }
                    if (element.parents('.kt-checkbox-list').length > 0) {
                        error.appendTo(element.parents('.kt-checkbox-list')[0]);
                    }
                } else if (element.parents('.kt-radio-inline').length > 0 || element.parents('.kt-checkbox-inline').length > 0) {
                    if (element.parents('.kt-radio-inline').length > 0) {
                        error.appendTo(element.parents('.kt-radio-inline')[0]);
                    }
                    if (element.parents('.kt-checkbox-inline').length > 0) {
                        error.appendTo(element.parents('.kt-checkbox-inline')[0]);
                    }
                } else if (element.parent(".input-group").length > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.attr("data-error-container")) { 
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                success.hide();
                error.show();
                KTUtil.scrollTop();
                event.preventDefault();
            },
            submitHandler: function (form) {
                success.show();
                error.hide();
                $('#submit').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
            }
            ,
            highlight: function (element) { // hightlight error inputs

                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
                $(element)
                    .closest('.form-control').addClass('is-invalid'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
                $(element)
                    .closest('.form-control').removeClass('is-invalid'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
                label
                    .closest('.form-control').removeClass('is-invalid'); // set success class to the control group
            },

            
        }); 
        $("#submit").on('click', function (event) {
            event.preventDefault();
            //This will check validation of form depending on rules
            console.log(form.valid());
            if (!form.valid()) {
                KTUtil.scrollTop();
                return;
            }
            $(this).addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
            form[0].submit();
            
        });      
    }

    return {
        // public functions
        init: function() {
            
            demo2();
        }
    };
}();

jQuery(document).ready(function() {    
    KTFormControls.init();
    $('#all-permissions').click(function(event) {  
        var checkboxes = document.getElementsByName('roles[]'); 
        for(var checkbox of checkboxes){
            console.log(checkbox, this.checked);
            checkbox.checked = (this.checked ? true : false);}
        
    }); 
});