<?php
$title = 'For '.Str::title($property['property_status']).' '.config('home.property_type'.($property['property_status'] == 'buy' ? '_for_sale.' : ($property['advert_type'] == 'room_only' ? '_for_room.' : '.')).$property['property_type']) .' '. ($property->view_property->view_address ? $property->address.', ' : '').($property->view_property->view_city ? $property->city : '');
?>
<?php $__env->startSection('title', $title.' - '.config('app.name')); ?>
<?php $__env->startSection('meta'); ?>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template1.elements.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php 
    if(!empty($property->extra_features)) {
        $property->extra_features = explode(",",$property->extra_features);
    }
    ?>
    <div class="properties-details-page content-area-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12 slider" >
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-60">
                        <div class="heading-properties">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3> <span><i class="flaticon-bed"></i> <?php echo e($property->bedroom); ?> Beds</span> <span><i class="flaticon-bath"></i> <?php echo e($property->bathroom); ?> Bathrooms</span> </h3>
                                        <p><i class="fa fa-map-marker"></i> <?php echo e($property->view_property->view_address ? $property->address.', ' : ''); ?><?php echo e($property->view_property->view_city ? $property->city : ''); ?> <?php echo e($property->view_property->view_postcode ? $property->postcode : ''); ?> </p>
                                    </div>
                                    <div class="p-r">
                                        <h3>£<?php echo $property->price; ?> / <?php echo e(Str::title($property['property_status'])); ?> </h3>
                                        <?php if(!empty($property->weekly_price)): ?> <p> <strong>Weekly :</strong> £<?php echo e($property->weekly_price); ?></p> <?php endif; ?>
                                        <p id="review" onClick="giveRating()">
                                            <?php echo number_format($reviews,1); ?> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main slider carousel items -->
                        <?php if(count($property->images) > 0): ?>
                            <a  href="javascript:void(0)" onclick="bigPhoto()" style="position:absolute;top: 117px;z-index: 1;background: rgba(68, 68, 68, 0.6);color: #fff;right: 10px;padding: 5px;border-radius: 50%;"><i class="fa fa-search-plus"></i></a>
                            <a class="saveLink" href="javascript:void(0)" onclick="saveProperty()" >
                                <i class="fa fa-heart<?php echo e($saved ? null : '-o'); ?>"></i>
                            </a>
                            
                            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:800px;height:600px;overflow:hidden;visibility:hidden;">
                                
                                <!-- Loading Screen -->
                                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/frontend/templates/img/jssor/spin.svg" />
                                </div>
                                <div id="slides" data-u="slides" u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:800px;height:500px;overflow:hidden;">
                                    <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>   
                                            <img data-u="image" src="<?php echo e(asset('/img/uploads/'.$property['id'].'/big/'.$image->image_name)); ?>"  alt="<?php echo e($image->image_name); ?>" style="width:100%" /> 
                                            <img data-u="thumb" src="<?php echo e(asset('/img/uploads/'.$property['id'].'/sm/'.$image->image_name)); ?>"  alt="<?php echo e($image->image_name); ?>" style="width:100%">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <!-- Thumbnail Navigator -->
                                <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:800px;height:120px;background-color:#fff;" data-autocenter="1" data-scale-bottom="0.75">
                                    <div data-u="slides">
                                        <div data-u="prototype" class="p" style="width:155px;height:110px;">
                                            <div data-u="thumbnailtemplate" class="t"></div>
                                            <svg viewbox="0 0 16000 16000" class="cv">
                                                <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                                <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                                <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Arrow Navigator -->
                                <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:220px;left:30px;" data-scale="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                        <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                                        <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                                    </svg>
                                </div>
                                <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:220px;right:30px;" data-scale="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                        <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                                        <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Property details start -->
                    <?php if(!empty($property['description'])): ?>
                    <div class="property-description mb-5">
                        <h3 class="heading">Description</h3>
                        <?php echo $property['description']; ?>

                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($property['lat']) && !empty($property['lng']) && $property->view_property->view_location): ?>
                    <div class="map mb-5" style="height: 500px;">
                        <div id="map" style="height: 400px;"></div>
                    </div>
                    <?php endif; ?>

                    <div class="property-details mb-5">
                        <h3 class="heading">Property Details</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <strong>Property Type:</strong> <?php echo e($property_type_name); ?>

                                    </li>
                                    <?php if($property['advert_type'] == 'commercial' && $property['view_property']['view_sq_ft']): ?>
                                    <li><span><i class="flaticon-square-layouting-with-black-square-in-east-area"></i> <?php echo e($property['sq_ft']); ?> sq ft</span></li>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_furnished): ?>
                                    <li>
                                        <strong>Furnished:</strong><?php echo e(config('home.furnished.'.$property->furnished)); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_show_date && !empty($property->show_date)): ?>
                                    <li>
                                        <strong>Earliest Move In Date :</strong> <?php echo e(Carbon\Carbon::createFromFormat('Y-m-d', $property['show_date'])->format('d M Y')); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_min_tenancy_length && !empty($property->min_tenancy_length)): ?>
                                    <li>
                                        <strong>Minimum Tenancy Length:</strong> <?php echo e($property->min_tenancy_length); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_min_tenancy_length && !empty($property->min_tenancy_length)): ?>
                                    <li>
                                        <strong>Minimum Tenancy Length:</strong> <?php echo e($property->min_tenancy_length); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_max_tenancy_length && !empty($property->max_tenancy_length)): ?>
                                    <li>
                                        <strong>Maximum Tenancy Length:</strong> <?php echo e($property->max_tenancy_length); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_number_tenant && !empty($property->number_tenant)): ?>
                                    <li>
                                        <strong>Maximum Tenancy Length:</strong> <?php echo e($property->number_tenant); ?>

                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    <?php if($property->property_status == 'rent' || $property->property_status == 'to-let'): ?>
                                    <?php if($property->view_property->view_price && !empty($property->price)): ?>
                                    <li>
                                        <strong>Monthly Price :</strong> <?php echo e($property->price); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_weekly_price && !empty($property->weekly_price)): ?>
                                    <li>
                                        <strong>Weekly Price :</strong> <?php echo e($property->weekly_price); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_deposit && !empty($property->deposit)): ?>
                                    <li>
                                        <strong>Deposit :</strong> <?php echo e($property->deposit); ?>

                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php endif; ?>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="amenities-box mb-5">
                        <h3 class="heading">Features</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    <?php if($property->property_status == 'rent' || $property->property_status == 'to-let'): ?>
                                    <?php if($property->view_property->view_bill): ?> <?php echo ($property->bill ? '<li><span> <i class="flaticon-draw-check-mark"></i> Bills included: Yes</span></li>' : '<li><span> <i>X</i> Bills included: No</span></li>'); ?> <?php endif; ?>
                                    <?php if($property->view_property->view_garden): ?> <?php echo ($property->garden ? '<li><span> <i class="flaticon-draw-check-mark"></i> Garden Access: Yes</span></li>' : '<li><span> <i>X</i> Garden Access: No</span></li>'); ?> <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_new_build): ?> <?php echo ($property->new_build ? '<li><span> <i class="">X</i> New Build: Yes </span></li>' : '<li><span> <i>X</i> New Build: No </span></li>'); ?> <?php endif; ?>
                                    <?php if($property->view_property->view_underfloor_heating ): ?> <?php echo ($property->underfloor_heating ? '<li><span> <i class="flaticon-draw-check-mark"></i> Underfloor Heating:  Yes</span></li>' : '<li><span> <i>X</i> Underfloor Heating:  No</span></li>'); ?> <?php endif; ?>
                                    <?php if($property->view_property->view_kitchen_diner): ?> <?php echo ($property->kitchen_diner ? '<li><span> <i class="flaticon-draw-check-mark"></i> Kitchen Diner: Yes</span></li>' : '<li><span> <i>X</i> Kitchen Diner: No</span></li>'); ?><?php endif; ?>
                                    <?php if($property->view_property->view_large_lounge): ?> <?php echo ($property->large_lounge ? '<li><span> <i class="flaticon-draw-check-mark"></i> Large Lounge: Yes </span></li>' : '<li><span> <i>X</i> Large Lounge: No </span></li>'); ?> <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    <?php if($property->property_status == 'rent' || $property->property_status == 'to-let'): ?>
                                    <?php if($property->view_property->view_parking): ?> <?php echo ($property->parking ? '<li><span> <i class="flaticon-draw-check-mark"></i> Parking: Yes </span></li>' : '<li><span> <i>X</i> Parking: No </span></li>'); ?> <?php endif; ?>
                                    <?php if($property->view_property->view_fireplace): ?> <?php echo ($property->fireplace ? '<li><span> <i class="flaticon-draw-check-mark"></i> Fireplace: Yes </span></li>' : '<li><span> <i>X</i> Fireplace:: No </span></li>'); ?> <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($property->view_property->view_private_residents_lounge): ?>  <?php echo ($property->private_residents_lounge ? '<li><span> <i class="flaticon-draw-check-mark"></i> Private Residents Lounge: Yes </span></li>' : '<li><span> <i>X</i> Private Residents Lounge: No </span></li>'); ?></span></li><?php endif; ?>
                                    <?php if($property->view_property->view_private_residents_terrace_garden): ?> <?php echo ($property->private_residents_terrace_garden ? ' <li><span> <i class="flaticon-draw-check-mark"></i> Private Residents Terrace Garden: Yes </span></li>' : ' <li><span> <i>X</i> Private Residents Terrace Garden: No </span></li>'); ?><?php endif; ?>
                                    <?php if($property->view_property->view_recently_renovated_throughout): ?> <?php echo ($property->recently_renovated_throughout ? '<li><span> <i class="flaticon-draw-check-mark"></i> Recently Renovated Throughout: Yes </span></li>' : '<li><span> <i>X</i> Recently Renovated Throughout: No </span></li>'); ?> <?php endif; ?>
                                    <?php if($property->view_property->view_five_double_bedrooms): ?> <?php echo ($property->five_double_bedrooms ? '<li><span> <i class="flaticon-draw-check-mark"></i> Five Double Bedrooms: Yes </span></li>' : '<li><span> <i>X</i> Five Double Bedrooms: No </span></li>'); ?> <?php endif; ?>
                                </ul>
                            </div>
                            
                        </div>
                        <?php if(!empty($property->extra_features)): ?> 
                        <ul class="row">
                            <?php $__currentLoopData = $property->extra_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6"><i class="flaticon-draw-check-mark"></i> <?php echo e($item); ?>  </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    
                    <?php if($property->property_status == 'rent' || $property->property_status == 'to-let'): ?>
                    <div class="features-opions af mb-45">
                        <h3 class="heading-3">Tenant Preferences</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    <?php if($property->view_property->view_student_allowed): ?> <?php echo ($property->student_allowed ? '<li><span> <i class="flaticon-draw-check-mark"></i> Student Allowed: Yes</span></li>' : '<li><span> <i>X</i> Student Allowed: No</span></li>'); ?> <?php endif; ?>
                                    <?php if($property->view_property->view_pets_allowed): ?><?php echo ($property->pets_allowed ? '<li><span> <i class="flaticon-draw-check-mark"></i> Pets Allowed: Yes</span></li>' : '<li><span> <i>X</i> Pets Allowed: No</span></li>'); ?> <?php endif; ?>
                                    <?php if($property->view_property->view_smokers_allowed): ?><?php echo ($property->smokers_allowed ? '<li><span> <i class="flaticon-draw-check-mark"></i> Smokers Allowed: Yes</span></li>' : '<li><span> <i>X</i> Smokers Allowed: No</span></li>'); ?> <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                <?php if($property->view_property->view_families_allowed): ?> <?php echo ($property->families_allowed ? '<li><span> <i class="flaticon-draw-check-mark"></i> Families Allowed: Yes</span></li>' : '<li><span> <i>X</i> Families Allowed: No</span></li>'); ?> <?php endif; ?>
                                <?php if($property->view_property->view_DSS_income_accepted): ?> <?php echo ($property->DSS_income_accepted ? '<li><span> <i class="flaticon-draw-check-mark"></i> DSS Income Accepted: Yes</span></li>' : '<li><span> <i>X</i> DSS Income Accepted: No</span></li>'); ?> <?php endif; ?>
                                <?php if($property->view_property->view_students_only): ?> <?php echo ($property->students_only ? '<li><span> <i class="flaticon-draw-check-mark"></i> Students Only: Yes</span></li>' :  '<li><span> <i>X</i> Students Only: No</span></li>'); ?> <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar mbl">
                        <?php echo $__env->make('frontend.template1.elements.detail_contact_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- Social list start -->
                        <div class="social-list widget clearfix" style="border-top: 1px solid #ddd;">
                            <h5 class="sidebar-title">Share</h5>
                            <ul>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>" class="facebook-bg" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/home?status=<?php echo e(url()->current()); ?>" target="_blank" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url()->current()); ?>&title=<?php echo e($title); ?>"  target="_blank" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                <li class="hidden-xs"><a href="https://web.whatsapp.com/send?text=<?php echo e(url()->current()); ?>" class="whatsapp-bg" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <?php if($property->property_status == 'for-sale' || $property->property_status == 'buy'): ?>
                        <?php echo $__env->make('frontend.template1.elements.mortgage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
    <div class="modal fade in" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"></div>
    <div class="modal fade in" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel">
        <div class="modal-dialog modal-xs" role="document" style="width:100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rate This Property</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#reviewModal').modal('hide');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" aling="center" >
                    <div class="card">
                        <div class="card-body text-center"> 
                        <span class="myratings"> - </span>
                        <fieldset class="rating" aling="center">
                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            <input type="radio" class="reset-option" name="rating" value="reset" />
                        </fieldset>
                        </div>
                        <div class="card-footer">
                            <div id="error"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-primary" onClick="saveRating()" value="Save">  </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/frontend/templates/css/quill-emoji.css')); ?>">
    <?php if($reviews != null): ?>
    <style>
        .fa-star:nth-child(-n+<?php echo e(intval($reviews)); ?>) { 
            color: #ffc12b 
        }
    </style>
    <?php endif; ?>

    <style>
        .saveLink {
            position:absolute;
            top: 117px;
            z-index: 1;
            background: rgba(250, 250, 250, 0.6);
            color: #444;
            font-size: 25px;
            left: 10px;
            padding: 10px 15px;
            padding-bottom: 8px;
            border-radius: 50%;
        }
        .saveLink:hover .fa-heart-o:before {
            content: "\f004";
        }
        .saveLink:hover .fa-heart:before {
            content: "\f08a";
        }
        
        
        .p-r i {
            color: #DDD;
        }
       
        #map {
            height: 500px !important;
        }
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes  jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider arrow skin 106 css*/
        .jssora106 {display:block;position:absolute;cursor:pointer;}
        .jssora106 .c {fill:#fff;opacity:.3;}
        .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
        .jssora106:hover .c {opacity:.5;}
        .jssora106:hover .a {opacity:.8;}
        .jssora106.jssora106dn .c {opacity:.2;}
        .jssora106.jssora106dn .a {opacity:1;}
        .jssora106.jssora106ds {opacity:.3;pointer-events:none;}

        /*jssor slider thumbnail skin 101 css*/
        .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
        .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;border:2px solid #000;box-sizing:border-box;z-index:1;}
        .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
        .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
        .jssort101 .p:hover{padding:2px;}
        .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
        .jssort101 .p:hover.pdn{padding:0;}
        .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
        .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
        .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
        .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
        .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}

        
        .rating { 
            border: none;
            width: 225px;
            margin: auto;
        }
        .myratings{
            font-size: 85px;
            color: green;
        }

        .rating > [id^="star"] { display: none; } 
        .rating > label:before { 
            margin: 5px;
            font-size: 2.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before { 
            content: "\f089";
            position: absolute;
        }

        .rating > label { 
            color: #ddd; 
            float: right; 
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating > [id^="star"]:checked ~ label, /* show gold star when clicked */
        .rating:not(:checked) > label:hover, /* hover current star */
        .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

        .rating > [id^="star"]:checked + label:hover, /* hover current star when changing rating */
        .rating > [id^="star"]:checked ~ label:hover,
        .rating > label:hover ~ [id^="star"]:checked ~ label, /* lighten current selection */
        .rating > [id^="star"]:checked ~ label:hover ~ label { color: #FFED85;  }

        .reset-option {
        display: none;
        }

        .reset-button {
        margin: 6px 12px;
        background-color: rgb(255, 255, 255);
        text-transform: uppercase;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/frontend/templates/js/jssor.slider.min.js')); ?>"></script>
<script>
    function login() {
        $.ajax({
            beforeSend: function(){
                //$("body").append('<div id="modalLoad" class="modal-backdrop in"><div class="modLoading"></div></div>');
            },
            complete: function(){
                //$("#modalLoad").remove();
            },
            type:"GET",url:"<?php echo e(url('quick-login')); ?>",cache:false,success:function(html)
                {
                $("#loginModal").html(html);
                $('#loginModal').modal({
                //backdrop :'static'
                });

            }
        })
    }
    function giveRating() {
        <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->getRoleNames()->count() == 0): ?>
                <?php if($my_review): ?>
                    var point = ("<?php echo e($my_review); ?>".replace('.5', 'half')).replace('0','');
                    $("input#star"+point+"[type='radio']").attr('checked', true);
                    var sim =  <?php echo e($my_review); ?>;
                    if (sim<3) {
                        $('.myratings').css('color','red'); 
                        $(".myratings").text(sim);
                    }else{
                        $('.myratings').css('color','green');
                        $(".myratings").text(sim);
                    }
                <?php endif; ?>
                $('#reviewModal').modal('show');
            <?php else: ?>
                alert('Sorry! Admin can`t give a review.');
            <?php endif; ?>
        <?php else: ?>
            login();
        <?php endif; ?>
    }

    async function saveRating () {
        var rating = $("input[type='radio']:checked").val();
        var property_id = <?php echo e($property->id); ?>;
        var CSRF_TOKEN = $('[name="_token"]').attr('value');
        
        if(rating != undefined) {
            $(this,'button').prop('disabled',true);
            try {
                const response = await fetch("<?php echo e(route('give-rate')); ?>", {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": CSRF_TOKEN
                    },
                    body: JSON.stringify({"rating": rating,"property_id": property_id})
                    
                });
                console.log(response)
                if (!response.ok) {
                    const errorMessage = await response.text();
                    throw new Error(errorMessage);
                    $('#reviewModal #error').html('<div class="alert alert-danger">Upps! There is an error! Please try again</div>');
                    setTimeout(() => {
                        $('#reviewModal #error').html('');
                    }, 2000);
                } else {
                    $('#reviewModal #error').html('<div class="alert alert-success">Your rating has been saved.</div>');
                    document.getElementById("contact_form").reset()
                    setTimeout(() => {
                        $('#reviewModal #error').html('');
                    }, 2000);
                    
                }
                //return response.json();
            } catch (error) {
                console.error(error);
            }
            $(this,'button').prop('disabled',false);
        } else {
            alert('Please give your rate!');
        }
    }

    async function saveProperty() {
        <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->getRoleNames()->count() == 0): ?>
                var property_id = <?php echo e($property->id); ?>;
                var CSRF_TOKEN = $('[name="_token"]').attr('value');
                var saved = $('.saveLink i').attr('class') == 'fa fa-heart-o' ? 'fa-heart' : 'fa-heart-o';
                try {
                    const response = await fetch("<?php echo e(route('saved')); ?>", {
                        method: "post",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": CSRF_TOKEN
                        },
                        body: JSON.stringify({"property_id": property_id})
                        
                    });
                    if (!response.ok) {
                        const errorMessage = await response.text();
                        throw new Error(errorMessage);
                    } else {
                        $('.saveLink').html('<i class="fa '+saved+'"></i>')
                    }
                    
                } catch (error) {
                    console.error(error);
                }
            <?php else: ?>
                alert('Sorry! Only for customers.');
            <?php endif; ?>
        <?php else: ?>
            login();
        <?php endif; ?>
    }

    $(document).ready(function(){

        $("input[type='radio']").click(function(){
            var sim =  $("input[type='radio']:checked").val();
            //alert(sim);
            if (sim<3) {
                $('.myratings').css('color','red'); 
                $(".myratings").text(sim);
            }else{
                $('.myratings').css('color','green');
                $(".myratings").text(sim);
            }
        });
    });
</script>
<?php if(!empty($property['lat']) && !empty($property['lng']) && $property->view_property->view_location): ?>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
<script>
    
    // TO MAKE THE MAP APPEAR YOU MUST
    // ADD YOUR ACCESS TOKEN FROM
    // https://account.mapbox.com
    var defaultLat = <?php echo e($property->lat); ?>;
    var defaultLng = <?php echo e($property->lng); ?>;
            
    mapboxgl.accessToken = "<?php echo e(env('APP_ENV') == 'dev' ? env('MAPBOX_API_PUBLIC') : env('MAPBOX_API')); ?>";
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [defaultLng, defaultLat],
        zoom: 16,
        scrollZoom: false,
        
    });
    map.on('load', function () {
        map.resize();
    });
    
    // Create a default Marker and add it to the map.
    const marker1 = new mapboxgl.Marker()
    .setLngLat([defaultLng, defaultLat])
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
    .addTo(map);
    
    //marker1.togglePopup();
    
    </script>
    <?php endif; ?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var jssor_1_SlideshowTransitions = [
          {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
        ];

        var jssor_1_options = {
          $AutoPlay: 1,
          $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
          },
          $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $SpacingX: 5,
            $SpacingY: 5
          }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 800;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    });
    function bigPhoto(){
        $.ajax(
            {
                beforeSend: function(){
                    //$("body").append('<div id="modalLoad" class="modal-backdrop in"><div class="modLoading"></div></div>');
                },
                complete: function(){
                    //$("#modalLoad").remove();
                },
                type:"GET",url:'<?php echo e(url("/big-photo/".$property->id)); ?>',cache:false,success:function(html)
                    {
                    $("#myModal").html(html);
                    $('#myModal').modal({
                    //backdrop :'static'
                    });
                }
            })

    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/detail.blade.php ENDPATH**/ ?>