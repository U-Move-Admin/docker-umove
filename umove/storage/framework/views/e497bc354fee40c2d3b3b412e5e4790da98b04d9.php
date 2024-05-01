<?php $__env->startSection('title','Contact | '.config('app.name') ); ?>
<?php $__env->startSection('title',config('app.name').': Contact our estate agency office in London'); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(config('broker.contact_desc').' | '.config('app.name')); ?>"/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="<?php echo e(config('app.name').': Contact our estate agency office in London'); ?>" />
    <meta property="og:description" content="<?php echo e(config('broker.contact_desc').' | '.config('app.name')); ?>">  
    <meta property="og:image" content="<?php echo e(asset(config('broker.logo'))); ?>">
    
    <!-- twitter -->
    <meta name="twitter:title" content="<?php echo e(config('app.name').': Contact our estate agency office in London'); ?>">  
    <meta name="twitter:description" content="<?php echo e(config('broker.contact_desc').' | '.config('app.name')); ?>">  
    <meta name="twitter:image:src" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    
    <!-- google -->
    <meta itemprop="name" content="<?php echo e(config('app.name').': Contact our estate agency office in London'); ?>">  
    <meta itemprop="description" content="<?php echo e(config('broker.contact_desc').' | '.config('app.name')); ?>">  
    <meta itemprop="image" content="<?php echo e(asset(config('broker.logo'))); ?>"> 
    
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template1.elements.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.template1.elements.breadcrumb',['name'=>'Contact'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="contact-2 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1>Contact Us</h1>
            </div>
            <div class="contact-info ">
                <div class="row">
                    <div class="col-md-4 col-sm-6 contact-info">
                        <i class="fa fa-map-marker"></i>
                        <p><?php echo e($store['store_name']); ?></p>
                        <strong><?php echo e($store['address']); ?>, <?php echo e($store['postcode']); ?>, <?php echo e($store['city']); ?>, <?php echo e($store['country']); ?></strong>
                    </div>
                    <div class="col-md-4 col-sm-6 contact-info">
                        <i class="fa fa-phone"></i>
                        <p>Phone Number</p>
                        <strong> <?php echo e($store['tel'] == null ? "we'll update the best number soon!" : $store['tel']); ?></strong>
                    </div>
                    <div class="col-md-4 col-sm-6 contact-info">
                        <i class="fa fa-envelope"></i>
                        <p>E-mail</p>
                        <strong><?php echo e($store['email']); ?></strong>
                    </div>
                </div>
            </div>
            <?php if(Session::has('message')): ?>
                <div class="notification-box mb-30">
                    <h3>Your message has been sent successfully</h3>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(asset('/contact')); ?>" method="post" id="contact" class="search-area search_home_form needs-validation" novalidate>
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group service">
                            <select class="selectpicker search-fields" name="service" id="service">
                                <option value="">Services interested in  </option>
                                <option <?php echo e(old('service') == 'Property Evaluation' ? 'selected' : ''); ?> value="Property Evaluation">Property Evaluation</option>
                                <option <?php echo e(old('service') == 'Buy' ? 'selected' : ''); ?> value="Buy">Buy</option>
                                <option <?php echo e(old('service') == 'Rent' ? 'selected' : ''); ?> value="Rent">Rent</option>
                                <option <?php echo e(old('service') == 'Investments' ? 'selected' : ''); ?> value="Investments">Investments</option>
                            </select>
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            <?php if($errors->has('service')): ?>
                                <?php echo e($errors->first('service')); ?>    
                            <?php endif; ?>
                        </div>
                        <div class="form-group name">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e(old('name')); ?>" required>
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            <?php if($errors->has('name')): ?>
                                <?php echo e($errors->first('name')); ?>    
                            <?php endif; ?>
                        </div>
    
                        <div class="form-group email">
                            <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo e(old('email')); ?>" required>
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            <?php if($errors->has('name')): ?>
                                <?php echo e($errors->first('name')); ?>    
                            <?php endif; ?>
                        </div>
                        <div class="form-group number">
                            <input type="text" name="phone" class="form-control" placeholder="Phone" required value="<?php echo e(old('phone')); ?>" >
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            <?php if($errors->has('phone')): ?>
                                <?php echo e($errors->first('phone')); ?>    
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group message">
                            <textarea rows="3" class="form-control" name="message" placeholder="Message" required><?php echo e(old('message')); ?></textarea>
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            <?php if($errors->has('message')): ?>
                                <?php echo e($errors->first('message')); ?>    
                            <?php endif; ?>
                        </div>
                    </div>
                    <div id="html_element" class="col-lg-6">
                    </div>
                    <div class="col-lg-12">
                        <br>
                        <div class="send-btn text-center">
                            <button id="submit-contact" type="submit" class="btn btn-color btn-md">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="section">
        <div class="map">
            <div id="map"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <script>
        var widgetId2;
        var onloadCallback = function() {
            widgetId2 = grecaptcha.render('html_element', {
                'sitekey' : '6LfQQ5ghAAAAAGjgUz0hwCjZ6qVxiiqOdj0FUL69',
            });
        };

    </script>
    <script>
        // TO MAKE THE MAP APPEAR YOU MUST
        // ADD YOUR ACCESS TOKEN FROM
        // https://account.mapbox.com
        var defaultLat = <?php echo e($store['lat']); ?>;
        var defaultLng = <?php echo e($store['lng']); ?>;
                
        mapboxgl.accessToken = "<?php echo e(env('APP_ENV') == 'dev' ? env('MAPBOX_API_PUBLIC') : env('MAPBOX_API')); ?>";
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [defaultLng, defaultLat],
            zoom: <?php echo e($store['zoom']); ?>,
            scrollZoom: false
        });
        
        // Create a default Marker and add it to the map.
        const marker1 = new mapboxgl.Marker()
        .setLngLat([defaultLng, defaultLat])
        .setPopup(new mapboxgl.Popup().setHTML(
            "<div class='map-properties contact-map-content'>" +
            "<div class='map-content' >" +
            "<img align='center' width='70' src='<?php echo e(url($logo)); ?>' alt='Umove'>"+
            "<p class='address'> </p>" +
            "<ul class='map-properties-list'> " +
            //"<li><i class='fa fa-phone'></i>  0 (xxx) xxxx </li> " +
            "<li><i class='fa fa-envelope'></i>  <?php echo e($store['email']); ?> </li> " +
            "</ul>" +
            "</div>" +
            "</div>"
        ))
        .addTo(map);
        
        marker1.togglePopup();
        
        
        
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/contact.blade.php ENDPATH**/ ?>