<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
        <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
            <span class="kt-header__topbar-username kt-hidden-mobile"><?php echo e(Auth::user()->name); ?></span>
            <!-- <img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg" /> -->

            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold"><?php echo e(Str::limit(Auth::user()->name,1,'')); ?></span>
        </div>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

        <!--begin: Head -->
        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(<?php echo e(url('/assets/media/misc/bg-1.jpg')); ?>)">
            <div class="kt-user-card__avatar">
                <!-- <img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg" /> -->

                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"><?php echo e(Str::limit(Auth::user()->name,1,'')); ?></span>
            </div>
            <div class="kt-user-card__name">
            <?php echo e(Auth::user()->name); ?>

            </div>
            <div class="kt-user-card__badge">
                <span class="btn btn-success btn-sm btn-bold btn-font-md"><?php echo e($messagesCount); ?> messages</span>
            </div>
        </div>

        <!--end: Head -->

        <!--begin: Navigation -->
        
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.navigation','data' => []]); ?>
<?php $component->withName('admin.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <!--end: Navigation -->
    </div>
</div><?php /**PATH /home/u390945238/domains/umove.london/resources/views/components/admin/user-bar.blade.php ENDPATH**/ ?>