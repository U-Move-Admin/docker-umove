<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, []); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e(__('Users')); ?>  <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Create a New User <small>try to scroll the page</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-clean kt-margin-r-10">
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
                    <form class="kt-form" id="kt_form_1" action="<?php echo e(route('users.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

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
                        </div>
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="form-group row ">
                                            <label class="col-3 col-form-label">Is Agent?</label>
                                            <div class="col-9">
                                                <div class="kt-checkbox-list">
                                                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" >
                                                        <input type="checkbox" name="is_agent" checked> 
                                                        Yes
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Name*</label>
                                            <div class="col-9">
                                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label class="col-3 col-form-label">Email*</label>
                                            <div class="col-9">
                                            <?php echo Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tel*</label>
                                            <div class="col-9">
                                            <?php echo Form::text('tel', null, array('placeholder' => 'Telephone','class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label class="col-3 col-form-label">Password*</label>
                                            <div class="col-9">
                                            <?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password')); ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Confirm Password*</label>
                                            <div class="col-9">
                                            <?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="form-group row form-group-last">
                                            <label class="col-3 col-form-label">Roles*</label>
                                            <div class="col-9">
                                                <div class="kt-checkbox-list">
                                                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" >
                                                        <input id="all-permissions" type="checkbox" name="all[]"> 
                                                        Select All 
                                                        <span></span>
                                                    </label>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" >
                                                        <input type="checkbox" name="roles[]" value="<?php echo e($role->id); ?>"> 
                                                        <?php echo e(ucfirst($role->name)); ?> <br> 
                                                        <span></span>
                                                        
                                                    </label>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div id="roles-error" class="form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/admin/user_form.js')); ?>" type="text/javascript"></script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>

<!-- Script loading  -->

<?php /**PATH /home/u390945238/domains/umove.london/resources/views/admin/users/create.blade.php ENDPATH**/ ?>