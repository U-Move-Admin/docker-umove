<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, []); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e(__('Store Details')); ?>  <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Store Details <small>try to scroll the page</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-clean kt-margin-r-10">
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
                    <?php echo Form::model($store, ['method' => 'POST','route' => ['store_details'], 'class'=> 'kt-form', 'id'=>'kt_form_1', 'enctype'=>"multipart/form-data" ]); ?>

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
                                            <label class="col-3 col-form-label">*Store Name</label>
                                            <div class="col-9">
                                                <?php echo Form::text('store_name', null, array('placeholder' => '','class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Legal name of Company</label>
                                            <div class="col-9">
                                                <?php echo Form::text('legal_name', null, array('placeholder' => '','class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label class="col-3 col-form-label">*Logo</label>
											<div class="col-9">
                                                <?php if(isset($logo) && !empty($logo) && file_exists(public_path().$logo)): ?>
                                                <div class="fileinput fileinput-exists" data-provides="fileinput" data-name="logo">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="display: table-cell; border:1px solid #ddd; padding: 10px;"> 
                                                        <img width="120" src="<?php echo e(asset($logo).'?t='.time()); ?>" >
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-outline-brand btn-file">
                                                            <span class="fileinput-new"> Select Image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file"> 
                                                        </span>
                                                    </div>
                                                </div>    
                                                <?php else: ?>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="display: table-cell; border:1px solid #ddd; padding: 10px;"> </div>
                                                    <img width="120" src="<?php echo e(asset($logo)); ?>" > <div>
                                                        <span class="btn btn-outline-brand btn-file">
                                                            <span class="fileinput-new"> Select Image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="logo"> 
                                                        </span>
                                                        <a href="javascript:;" class="btn btn-outline-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>      
                                                <?php endif; ?>
												<div>
                                                    <span class="m-form__help">
                                                        The logo must be min 400x400 pixel!
                                                    </span>
                                                </div>
											</div>
                                           
										</div>
                                        
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">*Title of About Company  </label>
                                            <div class="col-9">
                                                <?php echo Form::text('about_company_title', null, array('placeholder' => 'Title','class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">*About Company </label>
                                            <div class="col-9">
                                                <?php echo Form::textarea('about_company', null, array('placeholder' => 'A Brief History of the Company','class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                    <h3 class="kt-section__title">2. Address:</h3>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">*Address</label>
                                        <div class="col-9">
                                            <?php echo Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control', 'onchange' => 'setAddress()')); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">*Postcode</label>
                                        <div class="col-9">
                                            <?php echo Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control', 'onchange' => 'setAddress()')); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">*City</label>
                                        <div class="col-9">
                                            <?php echo Form::text('city', null, array('placeholder' => 'City','class' => 'form-control', 'onchange' => 'setAddress()')); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">*Country</label>
                                        <div class="col-9">
                                            <?php echo Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control')); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">*Location</label>
                                        <div class="col-9">
                                            <div class="map">
                                                <div id="map">Please add your address details</div>
                                            </div>
                                            <?php echo Form::hidden('lng', null, array()); ?>

                                            <?php echo Form::hidden('lat', null, array()); ?>

                                            <?php echo Form::hidden('zoom', null, array()); ?>

                                        </div>
                                    </div>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                    <h3 class="kt-section__title">3. Contact Information:</h3>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Telephone</label>
                                        <div class="col-9">
                                            <?php echo Form::text('tel', null, array('placeholder' => 'Tel','class' => 'form-control')); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">*Email</label>
                                        <div class="col-9">
                                            <?php echo Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-xl-2"></div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    <?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')); ?>" rel="stylesheet" type="text/css" />   
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css"
        type="text/css"
        />
    <style>
    #map {
        height: 300px;
    }
    .fileinput-preview.thumbnail img {
        width: 120px;
    }
   </style> 
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>         
    <script src="<?php echo e(asset('js/admin/store_details.js')); ?>" type="text/javascript"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script>
        // TO MAKE THE MAP APPEAR YOU MUST
        // ADD YOUR ACCESS TOKEN FROM
        // https://account.mapbox.com
        var defaultLat = 51.51236914587491;
        var defaultLng = -0.029405588600431964;
        
        mapboxgl.accessToken = "<?php echo e(env('APP_ENV') == 'dev' ? env('MAPBOX_API_PUBLIC') : env('MAPBOX_API')); ?>";
        
        var mapboxClient = '';
        var defaultLng = $('[name="lng"]').val();
        var defaultLat = $('[name="lat"]').val();
       
        $(function () {
            if( defaultLat != null && defaultLng != null){
                mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
                var address = $('[name="address"]').val();
                var postcode = $('[name="postcode"]').val();
                var city = $('[name="city"]').val();
                var country = $('[name="country"]').val() != '' ? $('[name="country"]').val() : 'UK';
                console.log(address + ' ' +  postcode + ' ' +  city + ' ' + country);
                setLocation(address + ' ' +  postcode + ' ' +  city + ' ' + country,  'center');
            }

        });
        
        function setAddress() {
            mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
            var address = $('[name="address"]').val();
            var postcode = $('[name="postcode"]').val();
            var city = $('[name="city"]').val();
            var country = $('[name="country"]').val() != '' ? $('[name="country"]').val() : 'UK';
            setLocation(address + ' ' +  postcode + ' ' +  city + ' ' + country, 'query');
            
        }

        function setLocation(value, type) {
            mapboxClient.geocoding
            .forwardGeocode({
                query: value,
                autocomplete: false,
                limit: 1
            })
            .send()
            .then((response) => {
                if (
                !response ||
                !response.body ||
                !response.body.features ||
                !response.body.features.length
                ) {
                    console.error('Invalid response:');
                    console.error(response);
                    return;
                }
                var feature = response.body.features[0];
                
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: feature.center,
                    zoom:  $('[name="zoom"]').val() != '' ? $('[name="zoom"]').val() : 16,
                    //scrollZoom: false,
                });
                // Create a marker and add it to the map.
                var marker = new mapboxgl.Marker({
                    draggable: true
                });
                console.log(type);
                if(type == 'center') {
                    marker = marker.setLngLat([defaultLng, defaultLat])
                    .addTo(map);
                }

                function add_marker (event) {
                    marker = marker.setLngLat(feature.center).addTo(map);
                    var coordinates = event.lngLat;
                    console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
                    marker.setLngLat(coordinates).addTo(map);
                    $('[name="lng"]').val(coordinates.lng);
                    $('[name="lat"]').val(coordinates.lat);
                    $('[name="zoom"]').val(Math.round(map.getZoom()));
                }

                function onDragEnd() {
                    const lngLat = marker.getLngLat();
                    $('[name="lng"]').val(lngLat.lng);
                    $('[name="lat"]').val(lngLat.lat);
                    $('[name="zoom"]').val(Math.round(map.getZoom()));
                    console.log('Lng:', lngLat.lng, 'Lat:', lngLat.lat);
                }
            
                map.on('click', add_marker);
                marker.on('dragend', onDragEnd);
                map.on('zoom', () => {
                console.log(Math.round(map.getZoom()) );
                    if(Math.round(map.getZoom()) != $('[name="zoom"]').val()) $('[name="zoom"]').val(Math.round(map.getZoom()));
                });

                
            });
        }
        
        // var marker1 = new mapboxgl.Marker()
        // .setLngLat([defaultLng, defaultLat])
        // .setPopup(new mapboxgl.Popup().setHTML(
        //     "<div class='map-properties contact-map-content'>" +
        //     "<div class='map-content' >" +
        //     "<img align='center' width='70' src='<?php echo e(url('/img/logo-2.png')); ?>' alt='Umove'>"+
        //     "<p class='address'> </p>" +
        //     "<ul class='map-properties-list'> " +
        //     //"<li><i class='fa fa-phone'></i>  0 (xxx) xxxx </li> " +
        //     "<li><i class='fa fa-envelope'></i>  info@umove.london </li> " +
        //     "</ul>" +
        //     "</div>" +
        //     "</div>"
        // ))
        // .addTo(map);
        
        // marker1.togglePopup();

        

        
        
        </script>
    
    <?php $__env->stopPush(); ?>
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH /home/u390945238/domains/umove.london/resources/views/admin/settings/store_details.blade.php ENDPATH**/ ?>