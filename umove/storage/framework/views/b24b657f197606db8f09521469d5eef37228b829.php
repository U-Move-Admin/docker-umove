<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e(__('My Reviews')); ?>  <?php $__env->endSlot(); ?>


    <div class="container mx-auto mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bg-white rounded-md">
                    <div class="p-6 border-b text-lg text-bold"><?php echo e(__('My Reviews')); ?> </div>

                    <div class="panel-body p-6">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <table class="table-auto w-full border-collapse border border-slate-500 first-letter mt-4 mb-3">
                            <thead>
                                <tr>
                                    <th class="border border-slate-600 p-2">Property ID</th>
                                    <th class="border border-slate-600 p-2">Rating</th>
                                    <th class="border border-slate-600 p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="border border-slate-600 p-2 text-center">#<?php echo e($item['property']['id']); ?></td>
                                    <td class="border border-slate-600 p-2 text-center"><?php echo e($item['rating']); ?> <i class="fa fa-star"></i></td>
                                    <td class="border border-slate-600 p-2 text-center">
                                        <a class="hover:text-teal-500" href="<?php echo e(url('/detail/'.$item['property']['id'])); ?>" target="_blank">View Property</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>

<?php /**PATH /homepages/0/d872858855/htdocs/umove/resources/views/app/my_reviews.blade.php ENDPATH**/ ?>