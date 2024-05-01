<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1><?php echo e(config('app.name')); ?></h1>
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(url('/')); ?>">Homepage</a></li>
                <?php if(isset($name2)): ?>
                <li class="active"><a href="<?php echo e(url('/'.$url2)); ?>"><?php echo e($name2); ?></a></li>  
                <?php endif; ?>
                <li class="active"><?php echo e($name); ?></li>
            </ul>
        </div>
    </div>
</div><?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/elements/breadcrumb.blade.php ENDPATH**/ ?>