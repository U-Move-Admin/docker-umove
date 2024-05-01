<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, []); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e(__('Users')); ?>  <?php $__env->endSlot(); ?>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                <?php echo e(__('User Management')); ?>

                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-create')): ?>
                        <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo e(route('users.create')); ?>"> <i class="la la-plus"></i> New User</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>
            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>Is Agent</th>
                        <th>Roles</th>
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->tel); ?></td>
                        <td><?php echo e($user->is_agent ? 'Yes' : 'No'); ?></td>
                        <td>
                        <?php if(!empty($user->getRoleNames())): ?>
                            <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="badge badge-success"><?php echo e($v); ?></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </td>
                        <td>
                        <a class="btn btn-primary btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Show" href="<?php echo e(route('users.show',$user->id)); ?>"><i class="flaticon-visible"></i> </a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-edit')): ?>
                        <a class="btn btn-info btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Edit" href="<?php echo e(route('users.edit',$user->id)); ?>"><i class="flaticon-edit"></i></a>
                        <a class="btn btn-warning btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Reset Password" href="<?php echo e(route('users.password.reset',$user->id)); ?>"><i class="flaticon2-lock"></i></a>
                        <?php endif; ?>'
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-delete')): ?>
                        <?php echo Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline', 'id'=>'user-delete-'.$user->id]); ?>

                            <?php echo Form::button('<i class="flaticon2-trash"></i>', ['onclick'=>'deleteUser('.$user->id.')','class' => 'btn btn-danger btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Delete','id'=> 'delete']); ?>

                        <?php echo Form::close(); ?>

                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            
            <!--end: Datatable -->
        </div>
    </div>
    

    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/vendors/custom/datatables/datatables.bundle.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('js/admin/role_list.js')); ?>" type="text/javascript"></script>
        <script>
            function deleteUser(id) {
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
                        $('form#user-delete-'+id)[0].submit();
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


<?php /**PATH /home/u390945238/domains/umove.london/resources/views/admin/users/index.blade.php ENDPATH**/ ?>