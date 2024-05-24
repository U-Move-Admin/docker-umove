
// Class definition

var KTFormControls = function () {
    // Private functions
    var demo2 = function () {
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
                swal.fire({
                    "title": "", 
                    "text": "There are some errors in your submission. Please correct them.", 
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });

                event.preventDefault();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                console.log(form);
                form[0].submit(); // submit the form
                swal.fire({
                    "title": "", 
                    "text": "Form validation passed. All good!", 
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary"
                });

                return false;
            }
        }); 
        $("#submit").on('click', function () {
            //This will check validation of form depending on rules
            if($("#kt_form_1").valid())
            {
                console.log('valid');
                $("#kt_form_1")[0].submit();
                return false;
            } else {
                console.log('novalid');
            }
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
});