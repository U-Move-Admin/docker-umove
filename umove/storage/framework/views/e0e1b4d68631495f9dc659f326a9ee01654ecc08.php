<?php
$title = 'For '.Str::title($property['property_status']).' '.config('home.property_type'.($property['property_status'] == 'buy' ? '_for_sale.' : ($property['advert_type'] == 'room_only' ? '_for_room.' : '.')).$property['property_type']) .' '. ($property->view_property->view_address ? $property->address.', ' : '').($property->view_property->view_city ? $property->city : '');
?>

<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, []); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e(__('Properties')); ?>  <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Property SKU <?php echo e($property->id); ?></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo e(route('properties.index')); ?>" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                    
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <div class="form-group">
                                <strong><i class="fa fa-bed"></i> <?php echo e($property->bedroom); ?> Beds</strong> <strong><i class="fa fa-bath"></i> <?php echo e($property->bathroom); ?> Bathrooms</strong>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-map-marker"></i> <?php echo e($property->view_property->view_address ? $property->address.', ' : ''); ?><?php echo e($property->view_property->view_city ? $property->city : ''); ?> <?php echo e($property->view_property->view_postcode ? $property->postcode : ''); ?>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group text-right"><h2><strong> £<?php echo $property->price; ?> / For <?php echo e(Str::title($property['property_status'])); ?></strong></h2></div>
                            <div class="form-group"><?php if(!empty($property->weekly_price)): ?> <p> <strong>Weekly :</strong> £<?php echo e($property->weekly_price); ?></p> <?php endif; ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 slider" >
                            <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-60">
                                <!-- main slider carousel items -->
                                <?php if(count($property->images) > 0): ?>
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
                            <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#details" role="tab" aria-selected="true">Property Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#owner" role="tab" aria-selected="true">Owner/Agent Details</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="details" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="row">
                                                <li class="col-md-6 col-sm-6 mb-2">
                                                    <strong>Property Id/SKU: <?php echo e($property['id']); ?> </strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_advert_type ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_advert_type ? 'line-through;' : ''); ?>">
                                                    <strong>Advert Type: <?php echo e(Str::title($property->advert_type)); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_property_status ?  'title="Not Show on Public"' : ''; ?> style="text-decoration: <?php echo e($property->view_property->property_status ? 'line-through;' : ''); ?>">
                                                    <strong>Property Type:  <?php echo e(config('home.property_type'.($property['property_status'] == 'buy' ? '_for_sale.' : ($property['advert_type'] == 'room_only' ? '_for_room.' : '.')).$property['property_type'])); ?></strong>
                                                </li>
                                                <?php if($property->property_status == 'rent'): ?>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_min_tenancy_length ?  'title="Not Show on Public"' : ''; ?> style="text-decoration: <?php echo e($property->view_property->view_min_tenancy_length ? 'line-through;' : ''); ?>">
                                                    <strong>Minimum Tenancy Length:  <?php echo e($property['min_tenancy_length']); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_weekly_price ?  'title="Not Show on Public"' : ''; ?> style="text-decoration: <?php echo e($property->view_property->view_weekly_price ? 'line-through;' : ''); ?>">
                                                    <strong>Weekly Rent For:  <?php echo e($property['weekly_price']); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_max_tenancy_length ?  'title="Not Show on Public"' : ''; ?> style="text-decoration: <?php echo e($property->view_property->view_max_tenancy_length ? 'line-through;' : ''); ?>">
                                                    <strong>Maximum Tenancy Length (Optional):  <?php echo e($property['max_tenancy_length']); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_number_tenant ?  'title="Not Show on Public"' : ''; ?> style="text-decoration: <?php echo e($property->view_property->view_number_tenant ? 'line-through;' : ''); ?>">
                                                    <strong>Maximum Number of Tenants :  <?php echo e($property['number_tenant']); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_show_date ?  'title="Not Show on Public"' : ''; ?> style="text-decoration: <?php echo e($property->view_property->view_show_date ? 'line-through;' : ''); ?>">
                                                    <strong>Earliest Move In Date :  <?php echo e($property['show_date']); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_deposit ?  'title="Not Show on Public"' : ''; ?> style="text-decoration: <?php echo e($property->view_property->view_deposit ? 'line-through;' : ''); ?>">
                                                    <strong>Deposit:  <?php echo e($property->deposit); ?></strong>
                                                </li>
                                                <?php endif; ?>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_furnished ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_furnished ? 'line-through;' : ''); ?>">
                                                    <strong>Furnished: <?php echo e(Str::title($property->furnished)); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_show_date ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_show_date ? 'line-through;' : ''); ?>">
                                                    <strong>Show Date: <?php echo e($property->show_date); ?></strong>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="owner" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="row">
                                                <li class="col-md-6 col-sm-6 mb-2">
                                                    <strong>Agent Id:</strong> <?php echo e($property->user->name); ?>

                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->advert_type ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->furnished ? 'line-through;' : ''); ?>">
                                                    <strong>Customer/Owner: </strong><?php echo e($property->is_owner == 1 ? config('app.name') : ($property['customer_id'] ? $property['customer']['name'] : null )); ?>

                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#features" role="tab" aria-selected="true">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#description" role="tab" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#showmap" role="tab" aria-selected="false">Map</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-selected="false">Messages</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="description" role="tabpanel">
                                <?php echo $property['description']; ?>

                                </div>
                                <div class="tab-pane active" id="features" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="row">
                                                <?php if($property->property_status == 'rent'): ?>
                                                    <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_bill ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_bill ? 'line-through;' : ''); ?>">
                                                        <strong> <i class="flaticon-draw-check-mark"></i> Bills included: <?php echo e($property->bill ? 'Yes' : 'No'); ?></strong>
                                                    </li>
                                                    <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_garden ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_garden ? 'line-through;' : ''); ?>">
                                                        <strong> <i class="flaticon-draw-check-mark"></i> Garden Access: <?php echo e($property->garden ? 'Yes' : 'No'); ?></strong>
                                                    </li>
                                                    <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_parking ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_parking ? 'line-through;' : ''); ?>">
                                                        <strong> <i class="flaticon-draw-check-mark"></i> Parking: <?php echo e($property->parking ? 'Yes' : 'No'); ?></strong>
                                                    </li>
                                                    <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_new_build ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_new_build ? 'line-through;' : ''); ?>">
                                                        <strong> <i class="flaticon-draw-check-mark"></i> Fireplace: <?php echo e($property->fireplace ? 'Yes' : 'No'); ?></strong>
                                                    </li>
                                                    <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_bill ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_bill ? 'line-through;' : ''); ?>">
                                                        <strong> <i class="flaticon-draw-check-mark"></i> Bills included: <?php echo e($property->bill ? 'Yes' : 'No'); ?></strong>
                                                    </li>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = config('home.key_features'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property['view_'.$i] ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property['view_'.$i] ? 'line-through;' : ''); ?>">
                                                        <strong> <i class="flaticon-draw-check-mark"></i> <?php echo e($item); ?>: <?php echo e($property[$i] ? 'Yes' : 'No'); ?></strong>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($property->extra_features): ?>
                                                    <?php $__currentLoopData = $property->extra_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="col-md-6 col-sm-6 col-lg-6 mb-2" >
                                                        <strong> <?php echo e($item); ?> </strong>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_private_residents_lounge ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_private_residents_lounge ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i> Private Residents Lounge: <?php echo e($property->bill ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->new_build ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_new_build ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i> New Build: <?php echo e($property->new_build ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_underfloor_heating ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_underfloor_heating ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i> Underfloor Heating: <?php echo e($property->underfloor_heating ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_private_residents_terrace_garden ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_private_residents_terrace_garden ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i> Private Residents Terrace Garden: <?php echo e($property->private_residents_terrace_garden ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_recently_renovated_throughout ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_recently_renovated_throughout ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i>Recently Renovated Throughout: <?php echo e($property->recently_renovated_throughout ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 col-lg-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_five_double_bedrooms ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_five_double_bedrooms ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i> Five Double Bedrooms: <?php echo e($property->five_double_bedrooms ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <?php endif; ?>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_kitchen_diner ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_kitchen_diner ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i> Kitchen Diner: <?php echo e($property->kitchen_diner ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_large_lounge ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_large_lounge ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i>Large Lounge: <?php echo e($property->large_lounge ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                            </ul>
                                            <?php if($property->property_status == 'rent'): ?>
                                            <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                                            <h4 class="heading-3 mb-3">Tenant Preferences</h4>
                                            <ul class="row">
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_student_allowed ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_student_allowed ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i>Student Allowed: <?php echo e($property->student_allowed ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_pets_allowed ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_pets_allowed ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i>Pets Allowed: <?php echo e($property->pets_allowed ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_smokers_allowed ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_smokers_allowed ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i>Smokers Allowed: <?php echo e($property->smokers_allowed ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_families_allowed ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_families_allowed ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i>Families Allowed: <?php echo e($property->families_allowed ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                                <li class="col-md-6 col-sm-6 mb-2" data-toggle="kt-tooltip" <?php echo $property->view_property->view_students_only ?  'title="Not Show on Public"' : ''; ?>  style="text-decoration: <?php echo e($property->view_property->view_students_only ? 'line-through;' : ''); ?>">
                                                    <strong> <i class="flaticon-draw-check-mark"></i>Students Only: <?php echo e($property->students_only ? 'Yes' : 'No'); ?></strong>
                                                </li>
                                            </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="showmap" role="tabpanel">
                                    <?php if($property->view_property->view_location != 1): ?>
                                    <p class="alert alert-info">Map is not showing for public</p>
                                    <?php endif; ?>
                                    <div class="map">
                                        <div id="map">Map Loading...</div>
                                    </div>
                                    <input type="hidden" id="map_was_opened" value="0">
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    <?php if($property->messages->count()  == 0): ?>
                                    <p>There is no messages for this property</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('css'); ?>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/frontend/templates/css/quill-emoji.css')); ?>">
    <style>
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
    </style>
    <?php $__env->stopPush(); ?>
    <?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('/frontend/templates/js/jssor.slider.min.js')); ?>"></script>
    <?php if(!empty($property['lat']) && !empty($property['lng'])): ?>
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
        <script>
            // TO MAKE THE MAP APPEAR YOU MUST
            // ADD YOUR ACCESS TOKEN FROM
            // https://account.mapbox.com
            var defaultLat = <?php echo e($property->lat); ?>;
            var defaultLng = <?php echo e($property->lng); ?>;
                    
            mapboxgl.accessToken = "<?php echo e(env('APP_ENV') == 'dev' ? env('MAPBOX_API_PUBLIC') : env('MAPBOX_API')); ?>";
            
            $('[href="#showmap"]').click(function() {
                setTimeout(() => {
                    var map_was_opened = $('#map_was_opened').val();
                    if(map_was_opened != 1) {
                        $('#map_was_opened').val(1);
                        var map = new mapboxgl.Map({
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
                    }
                }, 0);
                
            });
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
    </script>
    <?php $__env->stopSection(); ?>            
                
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>

<!-- Script loading  -->

<?php /**PATH /homepages/1/d814676099/htdocs/umove/resources/views/admin/properties/show.blade.php ENDPATH**/ ?>