<?php $__env->startSection('title', config('broker.search_title').' - '); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(config('broker.search_desc')); ?>"/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="<?php echo e(config('broker.name') .' '.config('broker.search_title')); ?>" />
    <meta property="og:description" content="<?php echo e(config('broker.search_desc')); ?>">  
    <meta property="og:image" content="<?php echo e(asset( config('broker.img_path').'logo2.png')); ?>">
    
    <!-- twitter -->
    <meta name="twitter:title" content="<?php echo e(config('broker.name') .' '. config('broker.search_title')); ?>">  
    <meta name="twitter:description" content="<?php echo e(config('broker.search_desc')); ?>">  
    <meta name="twitter:image:src" content="<?php echo e(asset( config('broker.img_path').'logo2.png')); ?>">  
    
    <!-- google -->
    <meta itemprop="name" content="<?php echo e(config('broker.name') .' '.config('broker.search_title')); ?>">  
    <meta itemprop="description" content="<?php echo e(config('broker.search_desc')); ?>">  
    <meta itemprop="image" content="<?php echo e(asset( config('broker.img_path').'logo2.png')); ?>"> 
    
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template1.elements.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo e($emlaks->links('frontend.template1.elements.breadcrumb',['name'=>'Properties'])); ?>

    <div class="properties-list-rightside content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                        <div class="row clearfix">
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <h4>
                                    <span class="heading-icon">
                                        <i class="fa fa-caret-right icon-design"></i>
                                        <i class="fa fa-th-<?php echo e(Request::get('list') == 'grid' ? 'large' : 'list'); ?>"></i>
                                    </span>
                                    <span class="heading"> Properties</span>
                                </h4>
                            </div>
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7">
                                <div class="sorting-options clearfix">
                                    <a href="" onclick="return listingType(this,'list')" class="change-view-btn <?php echo e(Request::get('list') == null ? 'active-view-btn' : ''); ?>"><i class="fa fa-th-list"></i></a>
                                    <a href="" onclick="return listingType(this,'grid')" class="change-view-btn <?php echo e(Request::get('list') == 'grid' ? 'active-view-btn' : ''); ?>"><i class="fa fa-th-large"></i></a>
                                </div>
                                <div class="search-area">
                                    <select class="selectpicker search-fields" name="location" onchange="sortOrder(this.value)">
                                        <option value="">Sort</option>
                                        <option value="fiyat-desc" <?php echo e(Request::get('sort') == 'fiyat-desc' ? 'selected' : ''); ?>>Fiyat Azalan</option>
                                        <option value="fiyat-asc" <?php echo e(Request::get('sort') == 'fiyat-asc' ? 'selected' : ''); ?>>Fiyat Artan</option>
                                        <option value="giris_tarihi-desc" <?php echo e(Request::get('sort') == 'giris_tarihi-desc' ? 'selected' : ''); ?>>Giriş Tarihi Azalan</option>
                                        <option value="giris_tarihi-asc" <?php echo e(Request::get('sort') == 'giris_tarihi-asc' ? 'selected' : ''); ?>>Giriş Tarihi Artan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subtitle">
                        <?php echo e($emlaks->total()); ?> properties
                    </div>
                    <?php if(Request::get('list') == 'grid'): ?>
                        <div class="row">
                            <?php if(isset($emlaks) && $emlaks->total() > 0): ?>
                                <?php echo $__env->make('frontend.template1.elements.grid_data',['emlaks'=>$emlaks,'class'=>'col-lg-6 col-md-6 col-sm-12'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <div class="col-lg-12">
                                    <div align="center" class="alert bg-white option-bar" style="padding:50px 0;height:inherit">
                                        <span style="font-weight:bold;">Sorry, There is no any record !</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($emlaks->total() > 14): ?>
                            <div class="row pagination-box hidden-mb-45">
                                <div class="col-sm-4">
                                    Total <?php echo e($emlaks->total()); ?> properties. View : <?php echo e($emlaks->firstItem() .' - '.$emlaks->lastItem()); ?>

                                </div>
                                <div class="col-sm-8">
                                    <div class="pagination-box hidden-mb-45 float-right">
                                        <nav>
                                            <?php echo e($emlaks->links('vendor.pagination.default')); ?>

                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <?php if(isset($emlaks) && $emlaks->total() > 0): ?>
                            <?php echo $__env->make('frontend.template1.elements.listing_data',['emlaks'=>$emlaks,'col1'=>'col-lg-5 col-md-5 col-pad','col2'=>'col-lg-7 col-md-7 align-self-center col-pad'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <div align="center" class="alert bg-white option-bar" style="padding:50px 0;height:inherit">
                                <span style="font-weight:bold;">Sorry, There is no any record !</span>
                            </div>
                        <?php endif; ?>
                        <?php if($emlaks->total() > 14): ?>
                            <div class="row pagination-box hidden-mb-45">
                                <div class="col-sm-4">
                                    Total <?php echo e($emlaks->total()); ?> properties. View : <?php echo e($emlaks->firstItem() .' - '.$emlaks->lastItem()); ?>

                                </div>
                                <div class="col-sm-8">
                                    <div class="pagination-box hidden-mb-45 float-right">
                                        <nav>
                                            <?php echo e($emlaks->links('vendor.pagination.default')); ?>

                                        </nav>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar mbl">
                        <?php echo $__env->make('frontend.template1.elements.search_listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/search.blade.php ENDPATH**/ ?>