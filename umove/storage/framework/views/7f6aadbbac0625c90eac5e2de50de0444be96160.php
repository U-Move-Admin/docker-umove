<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, []); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e(__('Edit Property')); ?>  <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Edit <?php echo e(Str::ucfirst($property->property_status)); ?> Property <small>try to scroll the page</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo e(route('properties.index')); ?>" class="btn btn-clean kt-margin-r-10">
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
                    <?php echo Form::model($property, ['method' => 'PATCH','route' => ['properties.update', $property->id], 'class'=> 'kt-form', 'id'=>'property_form', 'enctype'=>'multipart/form-data']); ?>

                        <input type="hidden" name="image_new_sort" id="image_new_sort">
                        <input type="hidden" name="property_status" value="<?php echo e($property->property_status); ?>">
                        <input type="hidden" name="extra_features" >
                        <div class="kt-form__content">
                            <div class="kt-alert m-alert--icon alert alert-danger kt-hidden" role="alert" id="property_form_msg">
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
                            <div class="col-xl-12">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">Property / Room Details:</h3>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">* Postcode</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input name="view_postcode" type="checkbox" <?php echo e($view_property->view_postcode ? 'checked=""' : ''); ?> >
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('postcode', null, array('class' => 'form-control')); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="kt-font-bolder">* Advert Type</label>
                                                <div class="kt-radio-inline">
                                                    <?php if($property['property_status'] == 'rent'): ?>
                                                    <?php $__currentLoopData = config('home.advert_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="kt-radio">
                                                        <input type="radio" name="advert_type" <?php echo e($property->advert_type === $i ? 'checked': ''); ?> value="<?php echo e($i); ?>" onclick="handleAdvertType('<?php echo e($i); ?>')"> <?php echo e($item); ?>

                                                        <span></span>
                                                    </label>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                    <label class="kt-radio">
                                                        <input type="radio" name="advert_type" value="whole_property" checked> Whole Property
                                                        <span></span>
                                                    </label>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">* Flat or House Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_address ? 'checked=""' : ''); ?> name="view_address">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('address', null, array('class' => 'form-control', 'placeholder'=>"Flat 301 or 10 Downing St")); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="kt-font-bolder">* Property Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_property_type ? 'checked=""' : ''); ?> name="view_property_type">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <select name="property_type" class="form-control" disabled>
                                                        <option value="">Please Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Address Line 2 (Optional)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_address2 ? 'checked=""' : ''); ?> name="view_address2">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('address2', null, array('class' => 'form-control', 'placeholder'=>"eg. 10 Downing St or Westminster")); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <label class="kt-font-bolder">* Bedrooms:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                        <input type="checkbox" <?php echo e($view_property->view_bedroom ? 'checked=""' : ''); ?> name="view_bedroom">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <?php echo Form::text('bedroom', null, array('class' => 'form-control bedroom')); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="kt-font-bolder">* Bathrooms</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                        <input type="checkbox" <?php echo e($view_property->view_bathroom ? 'checked' : ''); ?> name="view_bathroom">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <?php echo Form::text('bathroom', null, array('class' => 'form-control bathroom')); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Address Line 3 (Optional)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_address3 ? 'checked' : ''); ?> name="view_address3">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('address3', null, array('class' => 'form-control')); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="kt-font-bolder">* Furnishing Options</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_furnished ? 'checked=""' : ''); ?> name="view_furnished">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <select class="form-control" id="Furnished" name="furnished" data-val-number="The field Furnishing Options must be a number." data-val-required="Does the property come furnished?" >
                                                        <option value="">Please Select -&gt;</option>
                                                        <?php $__currentLoopData = config('home.furnished'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($i); ?>"<?php echo e($property->furnished === $i ? 'selected="selected"' : ''); ?> ><?php echo e($item); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">* City/Town</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_city ? 'checked=""' : ''); ?> name="view_city">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('city', null, array('class' => 'form-control', ' placeholder' => 'eg. London')); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="kt-font-bolder">* Location (Map)
                                                <i class="flaticon2-information" data-toggle="kt-tooltip" title="Please fill up first postcode, flat or house number and city."></i>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_location ? 'checked=""' : ''); ?> name="view_location">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('location', !empty($property->lng) ? 'The location marked' : null, array('class' => 'form-control', 'readonly'=> true, 'placeholder' => 'Please choose location of the property on Map')); ?>

                                                    <?php echo Form::hidden('lng', null, array()); ?>

                                                    <?php echo Form::hidden('lat', null, array()); ?>

                                                    <?php echo Form::hidden('zoom', null, array()); ?>

                                                    <div class="input-group-append">
                                                    <button id="map_modal" class="btn btn-primary" type="button" onclick="handleMap()">MARKUP MAP</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div class="kt-section kt-section--last">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">Property Description</h3>
                                        <div class="form-group row">
                                            <?php echo Form::textarea('description', null, array('id'=>'description','class' => 'form-control')); ?>

                                            <textarea name="desc" id="desc" style="display:none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div class="kt-section kt-section--last">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg"> Property Price</h3>
                                        <?php if($property->property_status == 'rent'): ?>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Monthly Rent For <span class="advert-name">* Entire Property</span>
                                                    <i class="flaticon2-information" data-toggle="kt-tooltip" title="Please enter the amount of rent on a PER MONTH basis."></i>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_price ? 'checked=""' : ''); ?> name="view_price">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <?php echo Form::text('price', null, array('class' => 'form-control price', ' placeholder' => '0.00')); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Minimum Tenancy Length <i class="flaticon2-information" data-toggle="kt-tooltip" title="What would you like the minimum term for your contract to be? Normally 6 months.  NOTE: An AST set at less than 6 months is valid, however, no tenant can be evicted legally in less than 6 months."></i></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info">
                                                                <input type="checkbox" <?php echo e($view_property->view_min_tenancy_length ? 'checked=""' : ''); ?>  name="view_min_tenancy_length" data-toggle="kt-tooltip" title="Show On Public">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                        
                                                    </div>
                                                    <?php echo Form::text('min_tenancy_length', null, array('class' => 'form-control tenancy-month', ' placeholder' => '0.00')); ?>

                                                    <span class="input-group-text">months</span>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Weekly Rent For <span class="advert-name">Entire Property</span>
                                                    <i class="flaticon2-information" data-toggle="kt-tooltip" title="Please enter the amount of rent on a PER WEEK basis."></i>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_weekly_price ? 'checked=""' : ''); ?> name="view_weekly_price">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <?php echo Form::text('weekly_price', null, array('class' => 'form-control price', ' placeholder' => '0.00')); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Maximum Tenancy Length (Optional)<i class="flaticon2-information" data-toggle="kt-tooltip" title="Is this a short / limited time let? If so, enter the maximum tenancy length.
                                                    If you intend on a long-term tenancy, leave this field blank.
                                                    NOTE: An AST set at less than 6 months is valid, however, no tenant can be evicted legally in less than 6 months."></i></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info">
                                                                <input type="checkbox" <?php echo e($view_property->view_max_tenancy_length ? 'checked=""' : ''); ?> name="view_max_tenancy_length" data-toggle="kt-tooltip" title="Show On Public">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('max_tenancy_length', null, array('class' => 'form-control tenancy-month', ' placeholder' => '0.00')); ?>

                                                    <span class="input-group-text">months</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Deposit Amount
                                                    <i class="flaticon2-information" data-toggle="kt-tooltip" title="How much deposit will you require? NB this is legally required to be held in an approved deposit scheme."></i>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_deposit ? 'checked=""' : ''); ?>  name="view_deposit">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('deposit', null, array('class' => 'form-control')); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Maximum Number of Tenants 
                                                    <i class="flaticon2-information" data-toggle="kt-tooltip" title="Please specify the maximum number of occupants you would accept on the tenancy."></i>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_number_tenant ? 'checked=""' : ''); ?> name="view_number_tenant">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('number_tenant', null, array('class' => 'form-control tenants-number')); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Earliest Move In Date</label>
                                                <div class="input-group date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_show_date ? 'checked=""' : ''); ?> name="view_show_date">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <?php echo Form::text('show_date', null, array('class' => 'form-control',  'placeholder' => 'Select date', 'id' => 'kt_datepicker_6')); ?>

                                                    <div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar-check-o"></i>
														</span>
													</div>
												</div>
                                            </div>
                                            <div class="col-6"></div>
                                        </div>
                                        <?php else: ?>
                                       <div class="form-group row">
                                            <div class="col-6">
                                                <label class="kt-font-bolder">Price </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--info" data-toggle="kt-tooltip" title="Show On Public">
                                                                <input type="checkbox" <?php echo e($view_property->view_price ? 'checked=""' : ''); ?> name="view_price">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <?php echo Form::text('price', null, array('class' => 'form-control price', ' placeholder' => '0.00')); ?>

                                                </div>
                                            </div>
                                        </div>   
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div class="kt-section kt-section--last">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">Features</h3>
                                        <?php if($property->property_status == 'rent'): ?>
                                            <div class="form-group row">
                                                <label class="col-3 kt-font-bolder">Bills Included
                                                    <label data-toggle="kt-tooltip" title="Show On Public">
                                                        <input type="checkbox" <?php echo e($view_property->view_bill ? 'checked=""' : ''); ?> name="view_bill">
                                                        <span></span>
                                                    </label>
                                                </label>
                                                <div class="col-3">
                                                    <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                        <label>
                                                            <input type="checkbox"  name="bill" <?php echo e($property->bill ? 'checked=""' : ''); ?>>
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                                <label class="col-3 kt-font-bolder">Parking
                                                    <label data-toggle="kt-tooltip" title="Show On Public">
                                                        <input type="checkbox" <?php echo e($view_property->view_parking ? 'checked=""' : ''); ?> name=view_parking>
                                                        <span></span>
                                                    </label>
                                                </label>
                                                <div class="col-3">
                                                    <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                        <label>
                                                            <input type="checkbox" name="parking" <?php echo e($property->parking ? 'checked=""' : ''); ?> >
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>    
                                            <div class="form-group row">
                                                <label class="col-3 kt-font-bolder">Garden Access
                                                    <label data-toggle="kt-tooltip" title="Show On Public">
                                                        <input type="checkbox" <?php echo e($view_property->view_garden ? 'checked=""' : ''); ?> name="view_garden"> 
                                                        <span></span>
                                                    </label>
                                                </label>
                                                <div class="col-3">
                                                    <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                        <label>
                                                            <input type="checkbox" name="garden" <?php echo e($property->garden ? 'checked=""' : ''); ?>>
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                                <label class="col-3 kt-font-bolder">Fireplace
                                                    <label data-toggle="kt-tooltip" title="Show On Public">
                                                        <input type="checkbox" <?php echo e($view_property->view_fireplace ? 'checked=""' : ''); ?> name="view_fireplace">
                                                        <span></span>
                                                    </label>
                                                </label>
                                                <div class="col-3">
                                                    <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                        <label>
                                                            <input type="checkbox" name="fireplace" <?php echo e($property->fireplace ? 'checked=""' : ''); ?>>
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="row">
                                            <?php $__currentLoopData = config('home.key_features'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-group col-sm-12 col-md-6">
                                                <div class="row">
                                                    <label class="col-sm-6 kt-font-bolder"><?php echo e($item); ?>

                                                        <label data-toggle="kt-tooltip" title="Show On Public">
                                                            <input type="checkbox" <?php echo e($view_property['view_'.$i] ? 'checked=""' : ''); ?> name="view_<?php echo e($i); ?>">
                                                            <span></span>
                                                        </label>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                            <label>
                                                                <input type="checkbox" name="<?php echo e($i); ?>"  <?php echo e($property[$i] ? 'checked=""' : ''); ?>>
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div id="kt_repeater_2">
                                            <div class="form-group  row">
                                                <label class="col-lg-3 kt-font-bolder">Extra Features:</label>
                                                <div data-repeater-list="" class="col-lg-5">
                                                    <?php if(!empty($property->extra_features)): ?> 
                                                    <?php $__currentLoopData = $property->extra_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div data-repeater-item class="kt-margin-b-10">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name='extra_features' placeholder="Feature Detail" value="<?php echo e($item); ?>">
                                                            <div class="input-group-append">
                                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-danger btn-icon">
                                                                    <i class="la la-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                    <div data-repeater-item class="kt-margin-b-10">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name='extra_features' placeholder="Feature Detail">
                                                            <div class="input-group-append">
                                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-danger btn-icon">
                                                                    <i class="la la-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col">
                                                    <div data-repeater-create="" class="btn btn btn-primary">
                                                        <span>
                                                            <i class="la la-plus"></i>
                                                            <span>Add More</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php if($property->property_status == 'rent'): ?>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div class="kt-section kt-section--last">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">Tenant Preferences</h3>
                                        <div class="form-group row">
                                            <label class="col-3 kt-font-bolder">Student Allowed
                                                <label data-toggle="kt-tooltip" title="Show On Public">
                                                    <input type="checkbox" <?php echo e($view_property->view_student_allowed ? 'checked=""' : ''); ?> name="view_student_allowed">
                                                    <span></span>
                                                </label>
                                            </label>
                                            <div class="col-3">
                                                <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                    <label>
                                                        <input type="checkbox"  name="student_allowed" <?php echo e($property->student_allowed ? 'checked=""' : ''); ?>>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                            <label class="col-3 kt-font-bolder">Pets Allowed
                                                <label data-toggle="kt-tooltip" title="Show On Public">
                                                    <input type="checkbox" <?php echo e($view_property->view_pets_allowed ? 'checked=""' : ''); ?>  name="view_pets_allowed">
                                                    <span></span>
                                                </label>
                                            </label>
                                            <div class="col-3">
                                                <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                    <label>
                                                        <input type="checkbox" name="pets_allowed"  <?php echo e($property->pets_allowed ? 'checked=""' : ''); ?>>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>    
                                        <div class="form-group row">
                                            <label class="col-3 kt-font-bolder">Families Allowed
                                                <label data-toggle="kt-tooltip" title="Show On Public">
                                                    <input type="checkbox"  <?php echo e($view_property->view_families_allowed ? 'checked=""' : ''); ?> name="view_families_allowed">
                                                    <span></span>
                                                </label>
                                            </label>
                                            <div class="col-3">
                                                <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                    <label>
                                                        <input type="checkbox" name="families_allowed"  <?php echo e($property->families_allowed ? 'checked=""' : ''); ?>>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                            <label class="col-3 kt-font-bolder">Smokers Allowed
                                                <label data-toggle="kt-tooltip" title="Show On Public">
                                                    <input type="checkbox" <?php echo e($view_property->view_smokers_allowed ? 'checked=""' : ''); ?> name="view_smokers_allowed">
                                                    <span></span>
                                                </label>
                                            </label>
                                            <div class="col-3">
                                                <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                    <label>
                                                        <input type="checkbox" name="smokers_allowed" <?php echo e($property->smokers_allowed ? 'checked=""' : ''); ?>>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 kt-font-bolder">DSS Income Accepted
                                                <label data-toggle="kt-tooltip" title="Show On Public">
                                                    <input type="checkbox" <?php echo e($view_property->view_DSS_income_accepted ? 'checked=""' : ''); ?> name="view_DSS_income_accepted">
                                                    <span></span>
                                                </label>
                                            </label>
                                            <div class="col-3">
                                                <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                    <label>
                                                        <input type="checkbox" name="DSS_income_accepted" <?php echo e($property->DSS_income_accepted ? 'checked=""' : ''); ?>>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                            <label class="col-3 kt-font-bolder">Students Only
                                                <label data-toggle="kt-tooltip" title="Show On Public">
                                                    <input type="checkbox" <?php echo e($view_property->view_student_only ? 'checked=""' : ''); ?> name="view_student_only">
                                                    <span></span>
                                                </label>
                                            </label>
                                            <div class="col-3">
                                                <span class="kt-switch kt-switch--icon kt-switch--outline">
                                                    <label>
                                                        <input type="checkbox" name="student_only" <?php echo e($property->student_only ? 'checked=""' : ''); ?>>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div class="kt-section kt-section--last">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">Image Upload:</h3>
                                        <div id="fine-uploader-manual-trigger"></div>
                                        <div class="pt-1">
                                            <div class="row" id="imageupload">
                                                <?php for($i=0; $i < 20; $i++): ?>
                                                    <?php if(!isset($is_image[$i])) $is_image[$i] = false; ?>
                                                    <div id="cont<?php echo e($i); ?>" class="col-sm-3 sort">
                                                        <div class="thumbnail" style="height:230px;overflow: hidden;padding:3px;" <?php echo e((($is_image[$i])?'style="display:none"':'style="display:block"')); ?> >
                                                            <div id="imageEmpty<?php echo e($i); ?>" align="center" class="empty_image">
                                                                <div class="fa fa-image" style="width: 100px;height: 100px;font-size: 90px;padding-top: 50px;color: #DFDBD1"></div>
                                                            </div>
                                                            <?php echo $__env->make('admin.properties.upload',[
                                                                'is_image'=>$is_image[$i],
                                                                "imageName" => isset($imageName[$i])?$imageName[$i]:'',
                                                                "imageId"   => isset($imageId[$i])?$imageId[$i]:'',
                                                                "imageNo"   => $i,
                                                                "imagePath" => isset($imagePath)?$imagePath:''

                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </div>
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div class="kt-section">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">Agent:</h3>
                                        <div class="form-group row">
                                            <label class="kt-font-bolder col-3 col-form-label">* Is Current User?</label>
                                            <div class="col-9">  
                                                <div class="kt-radio-inline">
                                                    <label class="kt-radio">
                                                        <input type="radio" name="current_user" <?php echo e($property->current_user == 0 ? 'checked=""' : ''); ?> value="0" onclick="handleAgentUser(0)"> No
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio">
                                                        <input type="radio" name="current_user" <?php echo e($property->current_user ? 'checked=""' : ''); ?> value="1" onclick="handleAgentUser(1)"> Yes
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row hide" >
                                            <label class="col-3 col-form-label">Agent</label>
                                            <div class="col-9">
                                                <select class="form-control" id="user_id" name="user_id"  >
                                                    <option value="">Please Select -&gt;</option>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($property->user_id == $item['id'] ? 'selected=""' : ''); ?> value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div class="kt-section">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">Customer:</h3>
                                        <div class="form-group row">
                                            <label class="kt-font-bolder col-3 col-form-label">* Is <?php echo e(config('app.name')); ?> Owner?</label>
                                            <div class="col-9">  
                                                <div class="kt-radio-inline">
                                                    <label class="kt-radio">
                                                        <input type="radio" name="is_owner" value="0" <?php echo e($property->is_owner == 0 ? 'checked=""' : ''); ?> onclick="handleCustomer(0)"> No
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio">
                                                        <input type="radio" name="is_owner" value="1" <?php echo e($property->is_owner ? 'checked=""' : ''); ?> onclick="handleCustomer(1)"> Yes
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row hide" id="owner" style="display: none;">
                                            <label class="col-3 col-form-label">Property Owner</label>
                                            <div class="col-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="customer_id"  >
                                                        <option value="">Please Select -&gt;</option>
                                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item['id']); ?>" <?php echo e($property->customer_id == $item['id'] ? 'selected=""' : ''); ?> ><?php echo e($item['name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button id="add_customer" class="btn btn-primary" type="button" onclick="handleAddCustomer()">New Customer</button>
                                                    </div>
                                                </div>
                                                <span class="form-text text-muted">This field is not show for public.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row hide" >
                                            <label class="col-3 col-form-label">Special Note </label>
                                            <div class="col-9">
                                                <textarea name="note" class="form-control" rows="5"><?php echo e($property->note); ?></textarea>
                                                <span class="form-text text-muted">This field is not show for public.</span>
                                            </div>
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
    <div id="imgModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
    <div id="mapLocation" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
    <div id="customerModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
    <?php $__env->startPush('scripts'); ?>
    
    <script src="<?php echo e(asset('/assets/global/plugins/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fine-uploader/fine-uploader.js')); ?>"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.1.3/cropper.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.1.3/cropper.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script type="text/template" id="qq-template-manual-trigger">
        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop images here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector qq-upload-button">
                    <div>Select File</div>
                </div>
                <button type="button" id="trigger-upload" class="btn btn-primary">
                    <i class="icon-upload icon-white"></i> Upload
                </button>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing images...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul id="ulPhotoInfoList" class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>
            
            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>
            
            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>
            
            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>
    
    <script>
        
        $(function(){
            var advert_type = $('[name="advert_type"]')[0]; 
            $(advert_type).prop('checked',true);
            handleAdvertType('<?php echo e($property->advert_type); ?>');
            handleCustomer('<?php echo e($property->is_owner); ?>');
        });
        function handleAdvertType(type) {
            var property_type = $('select[name=property_type]');
            var advert_name = $('.advert-name');
            if(type === 'room_only') {
                var data = '<option value="">Please Select</option><?php $__currentLoopData = config('home.property_type_for_room'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($i); ?>"><?php echo e($item); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>';
                property_type.html(data);
                advert_name.text('Single Room');
                property_type.attr('disabled', false);
            } else {
                var data = "";
                <?php if($property->property_status == 'buy'): ?>
                    data = '<option value="">Please Select</option><?php $__currentLoopData = config('home.property_type_for_sale'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($i); ?>"><?php echo e($item); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>';
                <?php else: ?>
                    data = '<option value="">Please Select</option><?php $__currentLoopData = config('home.property_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($i); ?>"><?php echo e($item); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>';
                <?php endif; ?>
                property_type.html(data);
                advert_name.text('Entire Property');
                property_type.attr('disabled', false);
            }
            $(property_type).val('<?php echo e($property->property_type); ?>');
        }

        function handleAgentUser(type) {
            if(type === 1) {
                $('select[name="user_id"]').val('<?php echo e(auth()->user()->id); ?>');
            } else {
                $('select[name="user_id"]').val('');
            }
        }

        function handleCustomer(type) {
            if(type === 1) {
                $('#owner').hide();
            } else {
                $('#owner').show();
            }
        }

        $( "#imageupload" ).sortable({
            connectWith: ".sort",
            handle: ".port-header-arrow",
        });
        maxfiles = '<?php echo e(($imageCount > 0?20-$imageCount:20)); ?>';
    	imageCount = $(".image-container img").length;
     	if(imageCount > 0){
     		xmaxfiles = maxfiles - imageCount;
    		n = imageCount;
     	}
     	else{
     		n = 0;
     	}

        <?php if($imageCount > 0): ?> {
            for (let index = 0; index < <?php echo e($imageCount); ?>; index++) {
               $('#imageEmpty'+index).hide();
            }
        }
        <?php endif; ?>
        
        var manualUploader = new qq.FineUploader({
            element: document.getElementById('fine-uploader-manual-trigger'),
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: '/upload',
                customHeaders:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                params: {"num": n,"divId": n}
            },
            thumbnails: {
                placeholders: {
                    waitingPath: "<?php echo e(asset('js/fine-uploader/placeholders/waiting-generic.png')); ?>",
                    notAvailablePath: "<?php echo e(asset('js/fine-uploader/placeholders/not_available-generic.png')); ?>"
                }
            },
            validation: {
                itemLimit: 20,
                acceptFiles: 'image/*',
                //allowedExtensions: ['.jpe', '.jpg', '.jpeg', '.gif', '.png', '.bmp', '.ico', '.svg', '.svgz', '.tif', '.tiff', '.ai', '.drw', '.pct', '.psp', '.xcf', '.psd', '.raw']
                //sizeLimit: 15000000
            },
            retry: {
                enableAuto: true // defaults to false
            },
            maxConnections:10,
            autoUpload: false,
            debug: true,
            callbacks: {
                onComplete: function(id, fileName, responseText){
                    if(responseText.success){
                        var imageNo = $(".image-container img").length;
                        $('#imageEmpty'+imageNo).hide();
                        var image = '<span class="port-header-arrow port-header" style="position: absolute;left: 25px;top: 6px;"><i class="fa fa-arrows-alt text-info"></i></span>'+
                        '<div class="form-group port-header" style="padding-top:3px;margin-bottom:0;" > &nbsp; </div>'+
                        '<div class="image-container port-header" style="height:150px;">'+
                        '<img src="<?php echo e(asset('/img/imagetmp/')); ?>/'+responseText.uuid+'/'+fileName +'" class="scale img-fluid" id="'+fileName+'" style="height:128px">'+
                        '<input type="hidden" name="image['+imageNo+']" value="'+fileName+'">'+
                        '</div>'+
                        '<div id="deleteLink'+imageNo+'" width="100%" align="center" style="margin-top:4px;">'+
                        //'<a href="javascript:;" class="btn btn-icon-only green tooltips" style="margin-right:10px;" data-original-title="Edit" data-container="body" data-placement="bottom" onclick="rot('+imageNo+', \'img/imagetmp/'+responseText.uuid+'\',\''+fileName+'\')"><i class="fa fa-magic"></i></a>'+
                        '<a href="javascript:;" class="btn btn-icon-only red tooltips" data-original-title="Delete" data-container="body" data-placement="bottom" onclick="delete_image(0,'+imageNo+',\''+fileName+'\');"><i class="fa fa-trash"></i></a>'+
                        '</div>';
                        $('#ulPhotoInfoList').html('');
                        $('#image'+imageNo).prepend(image);
                        $('#deleteLink'+imageNo+' a').tooltip();
                    }
                },
                onUpload: function(id) {
                    console.log(id);
                }
            },
            messages:{
                tooManyItemsError:'Your upload limit is {itemLimit}!'
            }
        });
        
        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });
        
        function deletedImage(id,image_id){
            //confirm
            if (confirm("Are you sure?")) {
                $('#image'+image_id).remove();
                $("#imageEmpty"+image_id).show();
                $("#image"+image_id).parent().removeClass("port");
                $('#imageEmpty'+image_id).append('<input type="hidden" name="deleteImage[]" value="'+id+'" />');
            }
        }

        function delete_image(id,no,name) {
            if (confirm("Are you sure?")) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    beforeSend: function(xhr){
                        var tooltip = $("#deleteLink"+no+' .red').attr('aria-describedby');
                        $('#'+tooltip).remove();
        				$('#deleteLink'+no+' .red').html('<i class="fa fa-spin fa-spinner"></i>');
        				$("#deleteLink"+no+' .red').css('disabled',true);
                        
                    },
                    complete: function(){
                        $('#deleteLink'+no+' .red').html('<i class="fa fa-trash"></i>');
                        $("#deleteLink"+no+' .red').css('disabled',false);
                    },
                    type: "POST",
                    url: "<?php echo e(url('/img-del')); ?>",
                    data: "imageId=" + id + "&imageNo=" + no + "&name="+name+"&_token="+ CSRF_TOKEN,
                    cache: false,
                    success: function(data){
                        if(data.status == 'success'){
                            var imageForDelete = document.getElementById('image' + no);
                        	if(imageForDelete != null){
                                imageForDelete.innerHTML='';
                        		$("#imageEmpty"+no).show();
                        		$("#deleteLink"+no).hide();
                        		$("#image"+no).parent().removeClass("port");
                        	}
                        }else{
                            showDialog('Error','Your photo could not deleted! Please try again.','error');
                        }
                    }
                });
        	}
        }
        function rot(id,imgPath,imgName){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                beforeSend: function(){
                    $("body").append('<div id="modalLoad" class="modal-backdrop in"><div class="modLoading"></div></div>');
                },
                complete: function(){
                    $("#modalLoad").remove();
                },
        		type:"POST",
                url: "<?php echo e(url('/img-edit')); ?>",
                data: "imgPath=" + imgPath + "&imgName=" + imgName + "&_token="+ CSRF_TOKEN,
                cache:false,success:function(html)
        		{
                    $("#imgModal").html(html);
        			$('#imgModal').modal({
                        backdrop :'static'
        			});
        			$('#rotate_onay').click(function() {
                        $('#imgModal').modal('hide');
        				var url_data = "imgPath="+imgPath+"&imgName="+imgName+"&imgRotateAngle="+$('#imgRotateAngle').val()+"&imgNo="+id;
        				$.ajax({
                            beforeSend: function(){
                                $('#loader'+id).show();
        						$("#deleteLink"+id).hide();
        						$('#image'+id).html("");
        						$('#image'+id).hide();
                                
        					},
        					complete: function(){
                                $('#loader'+id).hide();
        						$('#imgModal').html('');
        					},
        					type:"POST",
                            url: "<?php echo e(url('/images/rotate_save')); ?>",
                            data:url_data,cache:false,success:function(html){
                                $('#image'+id).html(html);
        						$('#image'+id+' img.scale').load(function() {
                                    $( this ).imageScale({scale: 'best-fit'});
        							$('#image'+id).show();
        							$( this ).css('max-height','140px');
        						});
        					}
        				});
        			});
        		}
        	});
        }
        </script>
    
    <script title="editor">
        var editor_config = {
            fontsize_formats: "8px 10px 12px 14px 18px 24px 36px 64px",
            path_absolute : "/",
            plugins: [
                'advlist autolink lists link charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime table contextmenu paste help wordcount'
            ],
            branding: false,
            toolbar: "insertfile undo redo | styleselect | fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ",
            relative_urls: false,
            height:300,
            entity_encoding : "raw",
            selector:'textarea#description',
        };
        tinymce.init(editor_config);
        $(function(){
            var datepicker = $.fn.datepicker.noConflict();
            $.fn.bootstrapDP = datepicker;
            $('#kt_datepicker_6').bootstrapDP({
                format: 'dd/mm/yyyy',
                todayHighlight: true,
                templates: arrows = {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $(".price").autoNumeric('init');
            $('.tenancy-month').TouchSpin({
                buttondown_class: 'btn btn-secondary',
                buttonup_class: 'btn btn-secondary',
                
                min: 1,
                max: 36,
                boostat: 1,
                maxboostedstep: 1,
            });
            $('.tenants-number').TouchSpin({
                buttondown_class: 'btn btn-secondary',
                buttonup_class: 'btn btn-secondary',
                min: 1,
                max: 20,
                boostat: 1,
                maxboostedstep: 1,
            });
            $('.bathroom, .bedroom').TouchSpin({
                buttondown_class: 'btn btn-secondary',
                buttonup_class: 'btn btn-secondary',
                min: 1,
                max: 10,
                boostat: 1,
                maxboostedstep: 1,
            });
        });
        
        function handleMap(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var postcode = $('[name="postcode"]').val();
            var address = $('[name="address"]').val();
            var city = $('[name="city"]').val();
            if(postcode != "" && address != "" && city != ""){
                $.ajax({
                    beforeSend: function(){
                        $("body").append('<div id="modalLoad" class="modal-backdrop in"><div class="modLoading"></div></div>');
                    },
                    complete: function(){
                        $("#modalLoad").remove();
                    },
                    type:"POST",
                    url: "<?php echo e(url('dashboard/properties/map')); ?>",
                    data: "address=" + address + "&city=" + city + "&postcode=" + postcode + "&_token="+ CSRF_TOKEN,
                    cache:false,success:function(html)
                    {
                        $("#mapLocation").html(html);
                        $('#mapLocation').modal({
                            backdrop :'static'
                        });
                        $('#confirm_location').click(function() {
                            // get Lng Lat
                            if($('[name="lng"]').val() != '' && $('[name="lat"]').val() != '') {
                                $('[name="location"]').val('Location is markup');
                                $('#mapLocation').modal('hide');
                            }else {
                                alert('There is an error! Please markup a location again!')
                            }
                        });
                    }
                }); 
            } else {
                alert('Please fill up required address information!');
            }
            
        }
        
        // create new customer
        function handleAddCustomer (){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                beforeSend: function(){
                    $("body").append('<div id="modalLoad" class="modal-backdrop in"><div class="modLoading"></div></div>');
                },
                complete: function(){
                    $("#modalLoad").remove();
                },
                type:"POST",
                url: "<?php echo e(url('dashboard/customers/quick-add-customer')); ?>",
                data: "_token="+ CSRF_TOKEN,
                cache:false,success:function(html)
                {
                    $("#customerModal").html(html);
                    $('#customerModal').modal({
                        backdrop :'static'
                    });
                    $('#confirm_customer').click(async function() {
                        
                        if($("#kt_form_1").valid()) {
                            var formData = new FormData(document.getElementById("kt_form_1"));
                            var object = {};
                            formData.forEach((value, key) => object[key] = value);
                            var json = JSON.stringify(object);
                            console.log(json);
                            const response = await fetch("<?php echo e(url('dashboard/customers/store-quick-add-customer')); ?>", {
                                'method': 'POST',
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-Token": CSRF_TOKEN
                                },
                                body: json
                            });
                            console.log(response);
                            if (!response.ok) {
                                const errorMessage = await response.json();
                                console.log(errorMessage.errors);
                                if(errorMessage.errors.email !== undefined) {
                                    $('#message_form').html('<div class="alert alert-danger">'+ (errorMessage.errors.email).toString() +'</div>');
                                } else if(errorMessage.errors.tel !== undefined) {
                                    $('#message_form').html('<div class="alert alert-danger">'+ (errorMessage.errors.tel).toString() +'</div>');
                                }else{
                                    $('#message_form').html('<div class="alert alert-danger">Upps! There is an error! Please try again</div>');
                                }
                                //throw new Error(errorMessage);
                                
                                setTimeout(() => {
                                    $('#message_form').html('');
                                }, 5000);
                            } else {
                                const data = await response.json();
                                console.log(data);
                                $('[name="customer_id"]').append('<option value="'+data.id+'">'+data.name+'</option>');
                                document.getElementById("kt_form_1").reset();
                                $('#customerModal').modal('hide');
                                // setTimeout(() => {
                                //     $('#message_form').html('');
                                // }, 2000);
                                
                            }
                            return false;
                        } else {
                            console.log('novalid');
                        }
                    });
                }
            }); 
            
            
        }
        </script>
        <script src="<?php echo e(asset('/js/admin/property_form.js')); ?>" type="text/javascript"></script>
    
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('js/fine-uploader/fine-uploader-new.css')); ?>" rel="stylesheet">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css" />
    <style>
        #trigger-upload {
            color: white;
            background-color: #00ABC7;yu
            font-size: 14px;
            padding: 7px 20px;
            background-image: none;
        }

        #fine-uploader-manual-trigger .qq-upload-button {
            margin-right: 15px;
        }

        #fine-uploader-manual-trigger .buttons {
            width: 36%;
        }

        #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
            width: 60%;
        }
        .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 20px;
            line-height: 1.42857;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: border 0.2s ease-in-out;
            -o-transition: border 0.2s ease-in-out;
            transition: border 0.2s ease-in-out; }
            .thumbnail > img,
            .thumbnail a > img {
                display: block;
                max-width: 100%;
                height: auto;
                margin-left: auto;
                margin-right: auto; }
            .thumbnail .caption {
                padding: 9px;
                color: #333333; }

            a.thumbnail:hover,
            a.thumbnail:focus,
            a.thumbnail.active {
            border-color: #337ab7; }
        label {
            align-self: center;
        }


        .help-block-error {
            color: red;
        }
    </style>
    <?php $__env->stopPush(); ?>
  
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>

<!-- Script loading  -->

<?php /**PATH /homepages/1/d814676099/htdocs/umove/resources/views/admin/properties/edit.blade.php ENDPATH**/ ?>