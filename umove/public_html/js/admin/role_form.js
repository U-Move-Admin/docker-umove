
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
                'permission[]': {
                    required: true,
                }
            },
            
            // errorPlacement: function (error, element) { // render error placement for each input type
            //     var cont = $("input[name^='permissio']");
            //     //console.log(cont);
            //     if($("input[name^='permissio']:checked").length == 0) {
            //         $('.check-error').text(error);
            //     } else {
            //         element.after(error);
            //     }
            //     // console.log(cont.querySelector('.table'));
            //     // if (cont.size() > 0) {
            //     //     cont.after(error);
            //     // } else {
            //     //     element.after(error);
            //     // }
            // },
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();

                // swal.fire({
                //     "title": "", 
                //     "text": "There are some errors in your submission. Please correct them.", 
                //     "type": "error",
                //     "confirmButtonClass": "btn btn-secondary",
                //     "onClose": function(e) {
                //         console.log('on close event fired!');
                //     }
                // });

                // event.preventDefault();
                // KTUtil.scrollTop();
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
    $('#all-permissions').click(function(event) {  
        var checkboxes = document.getElementsByName('permissions[]'); 
        for(var checkbox of checkboxes){
            console.log(checkbox, this.checked);
            checkbox.checked = (this.checked ? true : false);}
        
    }); 
});