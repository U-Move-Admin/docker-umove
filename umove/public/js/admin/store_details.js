"use strict";
// Class definition

var KTDropzoneDemo = function () {    
    // Private functions
    var demos = function () {
        // single file upload
        Dropzone.options.kDropzoneOne = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            uploadMultiple: false,
            maxFilesize: 5, // MB
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            dictRemoveFile: 'Remove Logo',
            removedfile: function (file){
                console.log(file);
            },
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                    console.log(file);
                }
            } ,
            init: function () {
                this.on("removedfile", function (file) {
                    $.post({
                        url: '/images-delete',
                        data: {id: file.name, _token: $('[name="_token"]').val()},
                        dataType: 'json',
                        success: function (data) {
                            total_photos_counter--;
                            $("#counter").text("# " + total_photos_counter);
                        }
                    });
                });
            },
            
        };

        // Form
        $( "#kt_form_1" ).validate({
            // define validation rules
            rules: {
                //= Client Information(step 3)
                // Billing Information
                store_name: {
                    required: true
                },
                logo: {
                    required: true,
                },
                about_company: {
                    required: true,
                },
                about_company_title: {
                    required: true,
                },
                address: {
                    required: true,
                },
                postcode: {
                    required: true,
                },
                city: {
                    required: true,
                },
                country: {
                    required: true,
                },
                lng: {
                    required: true,
                },
                lat: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                console.log(event);
                // swal.fire({
                //     "title": "", 
                //     "text": "There are some errors in your submission. Please correct them.", 
                //     "type": "error",
                //     "confirmButtonClass": "btn btn-secondary",
                //     "onClose": function(e) {
                //         console.log('on close event fired!');
                //     }
                // });

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
            demos(); 
            
        }
    };
}();

KTDropzoneDemo.init();