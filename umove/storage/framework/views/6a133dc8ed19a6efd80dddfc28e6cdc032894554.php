<?php $__env->startComponent('mail::message'); ?>

<h1>Dear <?php echo e($message['name']); ?>,</h1>

<div>
    <?php echo e($message['message']); ?>

</div>
<p>
    Regards,
    <br/>
    <?php echo e(env('APP_NAME')); ?>

</p>
<?php echo $__env->renderComponent(); ?>




<?php /**PATH /home/u390945238/domains/umove.london/resources/views/mail/notif_mail.blade.php ENDPATH**/ ?>