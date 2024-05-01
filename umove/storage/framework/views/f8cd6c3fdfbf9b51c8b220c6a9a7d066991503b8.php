<div class="kt-notification">
    <a href="<?php echo e(url('/dashboard/my-profile')); ?>" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-calendar-3 kt-font-success"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Profile
            </div>
            <div class="kt-notification__item-time">
                Account settings and more
            </div>
        </div>
    </a>
    <a href="<?php echo e(url('/dashboard/change-password')); ?>" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-password kt-font-success"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                Change My Password
            </div>
        </div>
    </a>
    <!-- <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-mail kt-font-warning"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Messages
            </div>
            <div class="kt-notification__item-time">
                Inbox and tasks
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-rocket-1 kt-font-danger"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Activities
            </div>
            <div class="kt-notification__item-time">
                Logs and notifications
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-hourglass kt-font-brand"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Tasks
            </div>
            <div class="kt-notification__item-time">
                latest tasks and projects
            </div>
        </div>
    </a> -->
    <div class="kt-notification__custom">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();this.closest('form').submit();"  
            class="btn btn-label-brand btn-sm btn-bold"><?php echo e(__('Log Out')); ?></a>
        </form>
    </div>
</div><?php /**PATH /home/u390945238/domains/umove.london/resources/views/components/admin/navigation.blade.php ENDPATH**/ ?>