
// Class definition

var KTFormControls = function () {
    // Private functions
    var validator;

    var demo2 = function () {
        $('#kt_datetimepicker').change(function() {
            validator.element($(this));
        });
        var form1 = $('#property_form');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        validator = form1.validate({
            //errorElement: 'span', //default input error message container
            errorClass: 'invalid-feedback', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            //ignore: "",  // validate all fields including form hidden input
            
            // define validation rules
            rules: {
                //= Client Information(step 3)
                // Billing Information
                postcode: {
                    required: true
                },
                advert_type: {
                    required: true
                },
                property_type: {
                    required: true
                },
                address: {
                    required: true
                },
                bedroom: {
                    required: true
                },
                bathroom: {
                    required: true
                },
                furnished: {
                    required: true
                },
                city: {
                    required: true
                },
                price: {
                    required: true
                },
                current_user: {
                    required: true
                },
                user_id: {
                    required: true
                },
                location: {
                    required: true
                }
                
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                KTUtil.scrollTo(error1, -200);
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
                // var cont = $(element).parent('.input-group');
                // console.log(element.parents('.kt-radio-list').size());
                // if (cont.length > 0) {
                //     cont.after(error);
                // } else if(element.attr("name") == "advert_type"  || 
                //     element.attr("name") == "research_subjectid[]") {
                //     error.insertAfter(".kt-radio-inline");
                // } else {
                //     element.after(error);
                // }
            },

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

            submitHandler: function (form) {
                success1.show();
                error1.hide();
            }
            // errorPlacement: function(error, element) {
            //     if(element.attr("name") == "advert_type"  || 
            //         element.attr("name") == "research_subjectid[]") {
            //         error.insertAfter(".kt-radio-inline");
            //     } else {
            //         console.log(element);
            //        error.insertAfter(element);
            //     }
            // },
            

            // invalidHandler: function(event, validator) {
            //     var alert = $('#property_form_msg');
            //     alert.removeClass('kt--hide').show();
            //     KTUtil.scrollTop();

            //     // swal.fire({
            //     //     "title": "", 
            //     //     "text": "There are some errors in your submission. Please correct them.", 
            //     //     "type": "error",
            //     //     "confirmButtonClass": "btn btn-secondary",
            //     //     "onClose": function(e) {
            //     //         console.log('on close event fired!');
            //     //     }
            //     // });

            //     // event.preventDefault();
            //     // KTUtil.scrollTop();
            // },

            // submitHandler: function (form) {
            //     console.log(form);
            //     form[0].submit(); // submit the form
            //     swal.fire({
            //         "title": "", 
            //         "text": "Form validation passed. All good!", 
            //         "type": "success",
            //         "confirmButtonClass": "btn btn-secondary"
            //     });

            //     return false;
            // }
        }); 
        $("#submit").on('click', function () {
            //This will check validation of form depending on rules
            if($("#property_form").valid())
            {
                $('#submit')
                //.addClass('m-loader m-loader--right m-loader--light')
                .attr('disabled', true);
                console.log('valid');
                var repeater = $('#kt_repeater_2 input');
                if(repeater.length > 0) {
                    var repeater_data = [];
                    repeater.each(function() {
                        repeater_data.push($(this).val());
                    });
                    $('[name="extra_features"').val(repeater_data.toString());
                }
                
                    var sortImage = [];
                    var images = $('#imageupload .image-container.port-header');
                    if(images.length > 0){
                        images.each(function(){
                            var id = $('img',this).attr('id');
                            sortImage.push(id);
                        });
                        $('#image_new_sort').val(sortImage);
                    }
                    $('#desc').val(tinyMCE.get('description').getContent({format : 'text'}));
                $("#property_form")[0].submit();
                return false;
            } else {
                console.log('novalid');
            }
        });      
    }

    var repeat = function() {
		$('#kt_repeater_2').repeater({
			initEmpty: false,
		
			defaultValues: {
			    'text-input': 'foo'
			},
			
			show: function() {
				$(this).slideDown();                               
			},

			hide: function(deleteElement) {                 
				if(confirm('Are you sure you want to delete this element?')) {
					$(this).slideUp(deleteElement);
				}                                
			}      
		});
	}

    return {
        // public functions
        init: function() {
            demo2();
            repeat();
        }
    };
}();




jQuery(document).ready(function() {    
    KTFormControls.init();
    

    
});