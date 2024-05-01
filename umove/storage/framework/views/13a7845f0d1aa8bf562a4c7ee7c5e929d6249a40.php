<div class="widget categories">
    <h5 class="sidebar-title">Contact Us</h5>
    <form method="post" action="<?php echo e(route('contact')); ?>" id="contact_form" >
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="property_id" value="<?php echo e($property->id); ?>">
        <div class="form-group">
            <input type="text" 
                name="name" 
                class="form-control" 
                placeholder="Name"
                value="<?php echo e(Auth::check() && Auth::user()->getRoleNames()->count() == 0 ? Auth::user()->name : null); ?>"
                required>
            
        </div>
        <div class="form-group">
            <input 
                type="text" 
                name="tel" 
                class="form-control" 
                placeholder="Phone" 
                value="<?php echo e(Auth::check() && Auth::user()->getRoleNames()->count() == 0 ? Auth::user()->tel : null); ?>"
                required>
        </div>
        <div class="form-group">
            <input 
                type="email" 
                name="email" 
                class="form-control" 
                placeholder="Email" 
                value="<?php echo e(Auth::check() && Auth::user()->getRoleNames()->count() == 0 ? Auth::user()->email : null); ?>"
                required>
        </div>
        <div class="form-group">
            <textarea required name="text" class="form-control" rows="5" >Hello, I am interested in <?php echo e($title); ?></textarea>
        </div>
        <div class="form-group search-area">
            <select name="customer_type" class="select selectpicker search-fields">
                <option value="I'm a buyer">I'm a buyer</option>
                <option value="I'm a tenant">I'm a tenant</option>
                <option value="I'm an agent">I'm an agent</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div id="recap" class="form-group" style="display: none"></div>
        <div class="form-group mb-0">
            <div id="message_form"></div>
            <button id="contact_button" type="button" class="btn btn-color btn-block" onclick="handleMessage()">SEND MESSAGE</button>
        </div>
        
    </form>
</div> 
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
    <script>
        var widgetId1;
        var onloadCallback = function() {
            widgetId1 = grecaptcha.render('recap', {
                'sitekey' : '6LfQQ5ghAAAAAGjgUz0hwCjZ6qVxiiqOdj0FUL69',
                'theme' : 'light'
            });
        };

    </script>
<script>
    async function handleMessage(e) {
        var name = $('[name="name"]').val();
        var phone = $('[name="tel"]').val();
        var email = $('[name="email"]').val();
        var property_id = $('[name="property_id"]').val();
        var text = $('[name="text"]').val();
        var customer_type = $('[name="customer_type"]').val();
        var CSRF_TOKEN = $('[name="_token"]').attr('value');
        
        var formData = new FormData(document.getElementById("contact_form"));
        formData.append('property_id', property_id);
        var object = {};
        formData.forEach((value, key) => object[key] = value);
        var json = JSON.stringify(object);

        if(name != '' && phone != '' && email != '' && text != '' && customer_type != '') {
            // var response = grecaptcha.getResponse();
            // if(response.length == 0) 
            // { 
            //     $('#recap').css('display', 'block');
            //     //reCaptcha not verified
            //     alert("please verify you are humann!"); 
                
            //     return false;
            // }
            $('#contact_button').prop('disabled',true);
            try {
                const response = await fetch("<?php echo e(route('send_property_message')); ?>", {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": CSRF_TOKEN
                    },
                    body: json
                });
                if (!response.ok) {
                    let errorMessage = await response.text();
                    errorMessage = JSON.parse(errorMessage);
                    var errorText = 'Upps! There is an error!';
                    //throw new Error(errorMessage);
                    Object.keys(errorMessage.errors).forEach(function(key, index) {
                        errorText += '<br/> ' + (errorMessage.errors[key].toString()).replace(',','<br/>');
                    });
                            
                    $('#message_form').html('<div class="alert alert-danger">'+ errorText +' <br/>Please try again</div>');
                    setTimeout(() => {
                        $('#message_form').html('');
                    }, 10000);
                } else {
                    $('#message_form').html('<div class="alert alert-success">Your message has been sent!</div>');
                    document.getElementById("contact_form").reset()
                    setTimeout(() => {
                        $('#message_form').html('');
                    }, 2000);
                    
                }
                //return response.json();
            } catch (error) {
                console.error(error);
            }
            $('#contact_button').prop('disabled',false);
            grecaptcha.reset();
        } else {
            alert('Please fill up all fields!');
        }
    }
</script><?php /**PATH /homepages/0/d872858855/htdocs/umove/resources/views/frontend/template1/elements/detail_contact_form.blade.php ENDPATH**/ ?>