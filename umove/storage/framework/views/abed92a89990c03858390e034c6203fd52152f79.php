<?php if(count($categories) > 0): ?>
    <div class="widget categories">
        <h5 class="sidebar-title">Categories</h5>
        <ul>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(url('/'.$item->for_sale.'-'.$item->property_type)); ?>"><?php echo e(config('home.satilik.'.$item['for_sale'])); ?> <?php echo e(config('home.emlak_tip.'.$item['property_type'])); ?><span>(<?php echo e($item->count); ?>)</span></a></li> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>   
<?php endif; ?><?php /**PATH /homepages/0/d872858855/htdocs/umove/resources/views/frontend/template1/elements/categories.blade.php ENDPATH**/ ?>