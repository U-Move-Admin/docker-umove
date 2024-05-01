<?php $__currentLoopData = $emlaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $emlak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="property-box-5">
    <div class="row">
        <div class="<?php echo e($col1); ?> ">
            <div class="property-thumbnail">
                <a href="<?php echo e(asset('/detail/'. $emlak['furl'])); ?>" class="property-img">
                    <div class="price-ratings-box">
                        <p class="price">
                            £<?php echo $emlak['price']; ?>

                            <?php if(!empty($emlak->rental_type) && $emlak->property_status === 'rent'): ?>
                            /<small><?php echo e($emlak->price_type); ?></small>
                            <?php endif; ?>
                        </p>
                    </div>
                    <img src="<?php echo e(!empty($emlak['images'][0]['image_name'])  ? asset('/img/uploads/'.$emlak['id'].'/'.$emlak['images'][0]['image_name']) : asset('/frontend/templates/img/noimage.png')); ?>" alt="<?php echo e($emlak->title); ?>" class="img-fluid" />
                </a>
                <div class="property-overlay">
                    <a href="<?php echo e(asset('/detail/'. $emlak['furl'])); ?>" class="overlay-link">
                        <i class="fa fa-link"></i>
                    </a>
                    <!--
                    <a class="overlay-link property-video" title="Test Title">
                        <i class="fa fa-video-camera"></i>
                    </a>
                    -->
                   <?php if($emlak['isphoto'] && count($emlak['images']) > 0 ): ?>
                        <div class="property-magnify-gallery">
                            <?php $__currentLoopData = $emlak['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($k == 0): ?>
                                    <a href="<?php echo e(asset('/img/uploads/'.$emlak->id.'/'.$image['name'])); ?>" class="overlay-link">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(asset('img/uploads/'.$emlak->id.'/'.$image['name'])); ?>" class="hidden"></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="<?php echo e($col2); ?> ">
            <div class="detail">
                <!-- title -->
                <h1 class="title">
                    <a href="<?php echo e(asset('/detail/'. $emlak['furl'])); ?>">
                        <?php echo e(ucfirst($emlak['bedroom'])); ?> Bedroom,  <?php echo e(ucfirst($emlak['bathroom'])); ?> Bath, <?php echo e(ucfirst($emlak['property_status'])); ?> Property
                    </a>
                </h1>
                <!-- Location -->
                <div class="location">
                    <a href="<?php echo e(asset('/detail/'. $emlak['furl'])); ?>">
                        <i class="fa fa-map-marker"></i><?php echo e(ucfirst($emlak->city) . ' - '. ucfirst($emlak->address)); ?>

                    </a>
                </div>
                <!-- Paragraph -->
                <p>
                    <?php echo e($emlak->title); ?>

                </p>
                <ul class="facilities-list clearfix">
                    <?php echo (!empty($emlak->bedroom))?'<li><i class="flaticon-bed"></i> '.$emlak->bedroom.' Bedroom </li>':''; ?>

                    <?php echo (!empty($emlak->bath))?'<li><i class="flaticon-bath"></i> '.$emlak->bathroom.' Bath </li>':''; ?>

                    
                </ul>
              
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /homepages/1/d814676099/htdocs/umove/resources/views/frontend/template1/elements/listing_data.blade.php ENDPATH**/ ?>