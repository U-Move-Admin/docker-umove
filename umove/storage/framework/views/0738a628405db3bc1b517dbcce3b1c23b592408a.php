<?php $__env->startSection('title', config('app.name').': '.config('broker.home_title')); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(config('broker.home_desc').' | '.config('app.name')); ?>" />

    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="<?php echo e(config('broker.name').': '.config('broker.home_title')); ?>" />
    <meta property="og:description" content="<?php echo e(config('broker.home_desc').' | '.config('broker.name')); ?>">  
    <meta property="og:image" content="<?php echo e(asset(config('broker.logo'))); ?>">
    
    <!-- twitter -->
    <meta name="twitter:title" content="<?php echo e(config('broker.name').': '.config('broker.home_title')); ?>">  
    <meta name="twitter:description" content="<?php echo e(config('broker.home_desc').' | '.config('broker.name')); ?>">  
    <meta name="twitter:image:src" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    
    <!-- google -->
    <meta itemprop="name" content="<?php echo e(config('broker.name').': '.config('broker.home_title')); ?>">  
    <meta itemprop="description" content="<?php echo e(config('broker.home_desc').' | '.config('broker.name')); ?>">  
    <meta itemprop="image" content="<?php echo e(asset(config('broker.logo'))); ?>"> 
    
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template1.elements.top_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.template1.elements.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.template1.elements.search_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
    <div class="services content-area-2 ">
        <div class="container">
            <div class="main-title">
                <h1 style="margin-bottom: 15px;">Welcome to UMOVE Your Property, Our Priority</h1>
                
                <p>👋 Hey there, Londoners! Tired of managing your property single-handedly? Wish you had a reliable friend to call upon?<br/>
                     That's where UMOVE Ltd comes in. Think of us as the go-to mate who sorts things out—efficiently and without a fuss.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info">
                        <i class="flaticon-house" style="padding-top:10px;"></i>
                       <div class="media-body">
                            <h5>What We Offer </h5>
                            <p>Find Quality Tenants with our "Let Only" services. <br/>
                                Full Property Management from tenant vetting to 24/7 support. <br/>
                                Transparent Fees starting as low as 4% of the monthly rent.
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info">
                        <i class="flaticon-agreement" style="padding-top:10px;"></i>
                        <div class="media-body">
                            <h5>Why Choose UMOVE?</h5>
                            <p>Guaranteed Rent: Sleep easy, we've got you covered. (T&C Apply) <br/>
                                24/7 Help Desk: We're always just a call away. <br/>
                                Trusted Contractors: Quality service from vetted professionals.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info">
                        <i class="flaticon-call-center-agent" style="padding-top:10px;"></i>
                        <div class="media-body">
                            <h5>Let's Get Started</h5>
                            <p>Ready for a property management experience that's as easy as a Sunday morning? 
                                <br/>
                                Click below to explore our bespoke services tailored just for you.
                            </p>
                            <a class="text-primary" href="<?php echo e(url('/services')); ?>">Go to Services</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="listing" class="featured-properties content-area-2 bg-white">
        <div class="container">
            <div class="main-title">
                <h1>Featured Listings</h1>
            </div>
            <ul class="list-inline-listing filters filteriz-navigation">
                <li class="active btn filtr-button filtr" data-filter="all">All</li>
                <li data-filter="1" class="btn btn-inline filtr-button filtr">Flat</li>
                <li data-filter="2" class="btn btn-inline filtr-button filtr">House</li>
                <li data-filter="3" class="btn btn-inline filtr-button filtr">Commercial</li>
            </ul>
            <div class="row filter-portfolio">
                <div class="cars">
                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="1">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="<?php echo e(asset('/detail/'.$property['furl'])); ?>" class="property-img">
                                    <div class="price-ratings-box">
                                        <p class="price">
                                          £<?php echo e($property['price']); ?>

                                        </p>
                                    </div>
                                    <img class="img-fluid" src="<?php echo e(!empty($property['images'][0]['image_name']) ? asset('/img/uploads/'.$property['id'].'/'.$property['images'][0]['image_name']) : asset('/frontend/templates/img/noimage.png')); ?>" alt=""> 
                                </a>
                                <div class="property-overlay">
                                    <a href="<?php echo e(asset('/detail/'.$property['furl'])); ?>" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <div class="property-magnify-gallery">
                                        <?php if(!empty($property['images'][0]['image_name'])): ?>
                                        <a href="<?php echo e(asset('/img/uploads/'.$property['id'].'/'.$property['images'][0]['image_name'])); ?>" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="<?php echo e(asset('/img/uploads/'.$property['id'].'/'.$property['images'][0]['image_name'])); ?>" class="hidden"></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="<?php echo e(asset('/detail/'.$property['furl'])); ?>"><?php echo e(Str::title($property['title'])); ?></a>
                                </h1>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-bed"></i> <?php echo e($property['bedroom']); ?>

                                    </li>
                                    <li>
                                        <i class="flaticon-bath"></i> <?php echo e($property['bathroom']); ?>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div id="testimonial" class="testimonial-4 tml-4 content-area-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h1>Our Testimonial</h1>
                    </div>
                </div>
            </div>
            <div class="slick-slider-area">
                <div class="row slick-carousel wow fadeInUp delay-04s slick-initialized slick-slider" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'  style="visibility: visible; animation-name: fadeInUp;">
                    <div class="slick-list draggable" style="padding: 0px;">
                        <div class="slick-track" style="opacity: 1; width: 4560px; transform: translate3d(-1140px, 0px, 0px);">
                            <div class="slick-slide-item wow slick-slide slick-cloned animated" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 380px; visibility: visible;">
                                <div class="testimonial-inner">
                                    <div class="content-box">
                                        <p>The easiest 5 stars I've ever rated someone. Jess was exceptional - so talented, helpful, knowledgeable. We're very pleased with how she helped us, from start to finish and we made a lot more on our previous home than we ever hoped for. Settled in our lovely new house, thanks so much Jess.</p>
                                    </div>
                                    <div class="arrow-down"></div>
                                    <div class="media user">
                                        <div class="media-body align-self-center">
                                            <h5>Maria Blank</h5>
                                            <p>Web Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide-item wow slick-slide slick-cloned animated" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 380px; visibility: visible;">
                                <div class="testimonial-inner">
                                    <div class="content-box">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                    </div>
                                    <div class="arrow-down"></div>
                                    <div class="media user">
                                        <div class="media-body align-self-center">
                                            <h5>Karen Paran Roky</h5>
                                            <p>Support Manager</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide-item slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 380px;">
                                <div class="testimonial-inner">
                                    <div class="content-box">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                    </div>
                                    <div class="arrow-down"></div>
                                    <div class="media user">
                                        <div class="media-body align-self-center">
                                            <h5>
                                                John Pitarshon Sk
                                            </h5>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide-item slick-slide slick-cloned slick-active" data-slick-index="-1" aria-hidden="false" tabindex="-1" style="width: 380px;">
                                <div class="testimonial-inner">
                                    <div class="content-box">
                                        <p>The easiest 5 stars I've ever rated someone. Jess was exceptional - so talented, helpful, knowledgeable. We're very pleased with how she helped us, from start to finish and we made a lot more on our previous home than we ever hoped for. Settled in our lovely new house, thanks so much Jess.</p>
                                    </div>
                                    <div class="arrow-down"></div>
                                    <div class="media user">
                                        <div class="media-body align-self-center">
                                            <h5>
                                            Mr & Mrs Wakefield
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide-item wow slick-slide slick-current slick-active slick-center animated" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 380px; visibility: visible;">
                                <div class="testimonial-inner">
                                    <div class="content-box">
                                        <p>I am renting, with UMove as the letting agent. I found their letting process straightforward and efficient, with a couple of thoughtful touches, and I'm now settled happily (so far) in a new home. Recommended!</p>
                                    </div>
                                    <div class="arrow-down"></div>
                                    <div class="media user">
                                        <div class="media-body align-self-center">
                                            <h5>Robert F.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide-item wow slick-slide slick-active animated" data-slick-index="1" aria-hidden="false" tabindex="0" style="width: 380px; visibility: visible;">
                                <div class="testimonial-inner">
                                    <div class="content-box">
                                        <p>Hands on estate agent who did everything to ensure that the sale went through smoothly. Liaised with solicitors and vendors to ensure quick sale. From viewing to completion was just 6 weeks. Would definitely recommend.</p>
                                    </div>
                                    <div class="arrow-down"></div>
                                    <div class="media user">
                                        <div class="media-body align-self-center">
                                            <h5>Dr Roblin</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/frontend/template1/home.blade.php ENDPATH**/ ?>