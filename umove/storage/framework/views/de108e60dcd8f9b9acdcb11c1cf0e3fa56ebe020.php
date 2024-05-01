<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, []); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e(__('Properties')); ?>  <?php $__env->endSlot(); ?>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Properties
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                
                            </div>
                            <a href="<?php echo e(route('properties.add','buy')); ?>" class="btn btn-primary btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Create for Buy
                            </a>
                            &nbsp;
                            <a href="<?php echo e(route('properties.add','rent')); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Create for Rent
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Create Date</th>
                            <th>Price</th>
                            <th data-toggle="kt-tooltip" title="Property Status">PS</th>
                            <th data-toggle="kt-tooltip" title="Property Type">PT</th>
                            <th>Address</th>
                            <th>Advert Type</th>
                            <th>Note</th>
                            <th>Beds</th>
                            <th>Baths</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-order="<?php echo e($property['created_at']); ?>">
                                    <?php echo e(count($property->images) > 0 ?
                                        $property['created_at'] .', '.url('/img/uploads/'.$property['id'].'/'.$property->images[0]['image_name']) : ''); ?>

                                     
                                    
                                </td>
                                <td>£<?php echo e($property['price']); ?></td>
                                <td><?php echo e(Str::title($property['property_status'])); ?></td>
                                <td>For <?php echo e(config('home.property_type'.($property['property_status'] == 'buy' ? '_for_sale.' : ($property['advert_type'] == 'room_only' ? '_for_room.' : '.')).$property['property_type'])); ?></td>
                                <td>
                                    <div><?php echo e($property['address']); ?></div>    
                                    <div><?php echo e($property['city']); ?> </div>    
                                    <div><?php echo e($property['postcode']); ?></div>    
                                </td>
                                <td><?php echo e(Str::title(Str::replace('_',' ',$property['advert_type']))); ?></td>
                                <td><?php echo e($property['note']); ?></td>
                                <td><?php echo e($property['bedroom']); ?></td>
                                <td><?php echo e($property['bathroom']); ?></td>
                                <td><?php echo e($property['confirmed']); ?></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a class="btn btn-primary btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Show" target="_blank" href="<?php echo e(route('properties.show', $property->id)); ?>"><i class="flaticon-visible"></i> </a>
                                            </td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('property-edit')): ?>
                                                <a class="btn btn-info btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Edit" href="<?php echo e(route('properties.edit', $property->id)); ?>"><i class="flaticon-edit"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('property-edit')): ?>
                                                <?php if($property->confirmed === 1): ?>
                                                <?php echo Form::open(['method' => 'Post','route' => ['property-confirm', $property->id],'style'=>'display:inline', 'id'=>'property-confirm-'.$property->id]); ?>

                                                    <?php echo Form::button('<i class="fa fa-ban"></i>', ['onclick'=>'confirmProperty('.$property->id.','.$property->confirmed.')','class' => 'btn btn-warning btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Confirm','id'=> 'confirm']); ?>

                                                <?php echo Form::close(); ?>

                                                <?php else: ?>
                                                <?php echo Form::open(['method' => 'Post','route' => ['property-confirm', $property->id],'style'=>'display:inline', 'id'=>'property-confirm-'.$property->id]); ?>

                                                    <?php echo Form::button('<i class="fa fa-check-circle"></i>', ['onclick'=>'confirmProperty('.$property->id.', '.$property->confirmed.')','class' => 'btn btn-success btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Confirm','id'=> 'confirm']); ?>

                                                <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('property-delete')): ?>
                                            <?php echo Form::open(['method' => 'DELETE','route' => ['properties.destroy', $property->id],'style'=>'display:inline', 'id'=>'property-delete-'.$property->id]); ?>

                                                <?php echo Form::button('<i class="flaticon2-trash"></i>', ['onclick'=>'deleteProperty('.$property->id.')','class' => 'btn btn-danger btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Delete','id'=> 'delete']); ?>

                                            <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>No data</p>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    

    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/vendors/custom/datatables/datatables.bundle.js')); ?>" type="text/javascript"></script>
    
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo e(asset('js/admin/property_list.js?'.time())); ?>" type="text/javascript"></script>
        <script>
            function deleteProperty(id) {
                event.preventDefault();
                console.log(id)
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    allowOutsideClick: true
                },function(result){
                    console.log(result);
                    if (result) {
                        $('form#property-delete-'+id)[0].submit();
                    }
                });
            }

            function confirmProperty(id, status) {
                event.preventDefault();
                console.log(id)
                swal({
                    title: 'Are you sure?',
                    text: "Property status will be "+ (status == 1 ? 'passive' : 'active'),
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    allowOutsideClick: true
                },function(result){
                    console.log(result);
                    if (result) {
                        $('form#property-confirm-'+id)[0].submit();
                    }
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('assets/vendors/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>

<!-- Script loading  -->

<?php /**PATH /homepages/1/d814676099/htdocs/umove/resources/views/admin/properties/index.blade.php ENDPATH**/ ?>