<?php $__env->startSection('title', 'Properties For '.ucfirst($property_status).' | '.config('app.name')); ?>
<?php $__env->startSection('meta'); ?> 
    <meta name="description" content="<?php echo e('Properties for '.$property_status.' in London through '.config('app.name').' Real Estate Agents. Houses, flats, apartments ,rooms or commercial properties for '.$property_status); ?>"/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="Properties For <?php echo e(ucfirst($property_status).' | '.config('app.name')); ?>" />
    <meta property="og:description" content="<?php echo e('Properties for '.$property_status.' in London through '.config('app.name').' Real Estate Agents. Houses, flats, apartments ,rooms or commercial properties for '.$property_status); ?>">  
    <meta property="og:image" content="<?php echo e(asset(config('broker.logo'))); ?>">
    
    <!-- twitter -->
    <meta name="twitter:title" content="Properties For <?php echo e(ucfirst($property_status).' | '.config('app.name')); ?>">  
    <meta name="twitter:description" content="<?php echo e('Properties for '.$property_status.' in London through '.config('app.name').' Real Estate Agents. Houses, flats, apartments ,rooms or commercial properties for '.$property_status); ?>">  
    <meta name="twitter:image:src" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    
    <!-- google -->
    <meta itemprop="name" content="Properties For <?php echo e(ucfirst($property_status).' | '.config('app.name')); ?>">  
    <meta itemprop="description" content="<?php echo e('Properties for '.$property_status.' in London through '.config('app.name').' Real Estate Agents. Houses, flats, apartments ,rooms or commercial properties for '.$property_status); ?>">  
    <meta itemprop="image" content="<?php echo e(asset(config('broker.logo'))); ?>"> 
    
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template1.elements.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="properties-list-rightside content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="option-bar d-xl-block d-lg-block d-md-block d-sm-block ">
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-6 col-sm-5">
                                <h4>
                                    <span class="heading-icon">
                                        <i class="fa fa-caret-right icon-design"></i>
                                        <i class="fa fa-th-<?php echo e(Request::get('list') == 'grid' ? 'large' : 'list'); ?>"></i>
                                    </span>
                                    <span class="heading">Properties For <?php echo e(ucfirst($property_status)); ?></span>
                                </h4>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-7">
                                <div class="sorting-options clearfix">
                                    <a href="" onclick="return listingType(this,'list')" class="change-view-btn <?php echo e(Request::get('list') == null ? 'active-view-btn' : ''); ?>"><i class="fa fa-th-list"></i></a>
                                    <a href="" onclick="return listingType(this,'grid')" class="change-view-btn <?php echo e(Request::get('list') == 'grid' ? 'active-view-btn' : ''); ?>"><i class="fa fa-th-large"></i></a>
                                </div>
                                <div class="search-area">
                                    <select class="selectpicker search-fields" name="location" onchange="sortOrder(this.value)">
                                        <option value="">Sort by</option>
                                        <option value="price-desc" <?php echo e(Request::get('sort') == 'price-desc' ? 'selected' : ''); ?>>Price - High to Low</option>
                                        <option value="price-asc" <?php echo e(Request::get('sort') == 'price-asc' ? 'selected' : ''); ?>>Price Low to High</option>
                                        <option value="created_at-desc" <?php echo e(Request::get('sort') == 'created_at-desc' ? 'selected' : ''); ?>>Date - New to Old</option>
                                        <option value="created_at-asc" <?php echo e(Request::get('sort') == 'created_at-asc' ? 'selected' : ''); ?>>Date - Old to New</option>    
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subtitle">
                        <?php echo e($properties->total()); ?> Properties
                    </div>
                    <div class="row d-block d-sm-none">
                        <div class="col-lg-12">
                            <a class="btn btn-theme btn-block mb-30" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Filter
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <div id="collapseExample" class="collapse sidebar mbl">
                            <!-- <?php echo $__env->make('frontend.template1.elements.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
                            <?php echo $__env->make('frontend.template1.elements.search_listing', ['data' => $data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <?php if(Request::get('list') == 'grid'): ?>
                        <div class="row">
                            <?php if(isset($properties) && $properties->total() > 0): ?>
                                <?php echo $__env->make('frontend.template1.elements.grid_data',['emlaks'=>$properties,'class'=>'col-lg-6 col-md-6 col-sm-12'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <div class="col-lg-12">
                                    <div align="center" class="alert bg-white option-bar" style="padding:50px 0;height:inherit">
                                        <span style="font-weight:bold;">There is no any record!</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($properties->total() > 14): ?>
                            <div class="row pagination-box hidden-mb-45">
                                <div class="col-sm-4">
                                    Total <?php echo e($properties->total()); ?> properties. View : <?php echo e($properties->firstItem() .' - '.$emlaks->lastItem()); ?>

                                </div>
                                <div class="col-sm-8">
                                    <div class="pagination-box hidden-mb-45 float-right">
                                        <nav>
                                            <?php echo e($properties->links('vendor.pagination.default')); ?>

                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                    <?php if(isset($properties) && $properties->total() > 0): ?>
                            <?php echo $__env->make('frontend.template1.elements.listing_data',['emlaks'=>$properties,'col1'=>'col-lg-5 col-md-5 col-pad','col2'=>'col-lg-7 col-md-7 align-self-center col-pad'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <div align="center" class="alert bg-white option-bar" style="padding:50px 0;height:inherit">
                                <span style="font-weight:bold;">Sorry, There is no any record !</span>
                            </div>
                        <?php endif; ?>
                        <?php if($properties->total() > 14): ?>
                            <div class="row pagination-box hidden-mb-45">
                                <div class="col-sm-4">
                                    Total <?php echo e($properties->total()); ?> properties. View : <?php echo e($properties->firstItem() .' - '.$properties->lastItem()); ?>

                                </div>
                                <div class="col-sm-8">
                                    <div class="pagination-box hidden-mb-45 float-right">
                                        <nav>
                                            <?php echo e($properties->links('vendor.pagination.default')); ?>

                                        </nav>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar mbl d-none d-xl-block d-lg-block d-md-block d-sm-block">
                        <!-- <?php echo $__env->make('frontend.template1.elements.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
                        <?php echo $__env->make('frontend.template1.elements.search_listing', ['data' => $data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/0/d872858855/htdocs/umove/resources/views/frontend/template1/listing.blade.php ENDPATH**/ ?>