<?php $__env->startSection('title','About '.config('app.name')); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(config('app.name')); ?> has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants."/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="<?php echo e('About '.config('app.name').' Estate Agents'); ?>" />
    <meta property="og:image" content="<?php echo e(asset(config('broker.logo'))); ?>">
    <meta property="og:description" content="<?php echo e(config('app.name')); ?> has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <!-- twitter -->
    <meta name="twitter:title" content="<?php echo e('About '.config('app.name').' Estate Agents'); ?>">  
    <meta name="twitter:description" content="<?php echo e(config('app.name')); ?> has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <meta name="twitter:image:src" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    <!-- google -->
    <meta itemprop="name" content="<?php echo e('About '.config('app.name').' Estate Agents'); ?>">  
    <meta itemprop="description" content="<?php echo e(config('app.name')); ?> has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <meta itemprop="image" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template1.elements.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.template1.elements.breadcrumb',['name'=>'About Us'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="contact-2 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1><?php echo e($store['about_company_title']); ?></h1>
            </div>
    
            <div class="contact-info">
                <div class="row">
                    <div class="col-md-12 contact-info">
                        <?php echo $store['about_company']; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/about.blade.php ENDPATH**/ ?>