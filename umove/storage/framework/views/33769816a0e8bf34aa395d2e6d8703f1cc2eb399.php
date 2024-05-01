<?php $__env->startComponent('mail::message'); ?>

<div>
    Hi there,
    <br/>
    <p>
    <?php echo e($message['message']); ?>

    </p>
    <br/>
    Thanks,
    <br/>
    <?php echo e($message['name']); ?>

    <br/>
    T:  <?php echo e($message['phone']); ?>  
    <br/>
    E:  <?php echo e($message['email']); ?>  
</div>

<?php echo $__env->renderComponent(); ?>




<?php /**PATH /home/u390945238/domains/umove.london/resources/views/mail/contact.blade.php ENDPATH**/ ?>