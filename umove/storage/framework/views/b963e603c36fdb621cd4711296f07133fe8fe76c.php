<?php $__env->startComponent('mail::message'); ?>

<p>
    You have new message from a customer.
</p>
<div>
    <a href="<?php echo e(env('APP_URL').'/detail'.$property_id); ?>" class="button button-primary" target="_blank" rel="noopener">View Property - <?php echo e($property_id); ?></a>
</div>
</br>
<p><?php echo $text; ?></p>   
<p>You can see this message on Admin Panel.</p>
<a href="<?php echo e(env('APP_URL').'/login'); ?>" class="button button-green" target="_blank" rel="noopener">Login</a>
<div>
    <p>
        Regards,
    </p>
    <p>
        <?php echo e($name); ?>

    </p>
    <p>
        T:  <?php echo e($tel); ?>  
    </p>
    <p>
        E:  <?php echo e($email); ?>  
    </p>
    <p>
        <?php echo e(env('APP_NAME')); ?>

    </p>

</div>

<?php echo $__env->renderComponent(); ?>




<?php /**PATH /home/u390945238/domains/umove.london/resources/views/mail/property_message.blade.php ENDPATH**/ ?>