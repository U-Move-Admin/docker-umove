<?php $__env->startSection('title','Services '.config('app.name')); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(config('app.name')); ?> has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants."/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="<?php echo e('Services '.config('app.name').' Estate Agents'); ?>" />
    <meta property="og:image" content="<?php echo e(asset(config('broker.logo'))); ?>">
    <meta property="og:description" content="<?php echo e(config('app.name')); ?> has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <!-- twitter -->
    <meta name="twitter:title" content="<?php echo e('Services '.config('app.name').' Estate Agents'); ?>">  
    <meta name="twitter:description" content="<?php echo e(config('app.name')); ?> has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <meta name="twitter:image:src" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    <!-- google -->
    <meta itemprop="name" content="<?php echo e('Services '.config('app.name').' Estate Agents'); ?>">  
    <meta itemprop="description" content="<?php echo e(config('app.name')); ?> has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <meta itemprop="image" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">  
    <style>
        .services-info .number {
            font-size: 200px;
            line-height: 1;
            color: #3a30300a;
            display: inline-block;
            position: absolute;
            z-index: 0;
            right: 20px;
            font-weight: 700;
            font-family: "Poppins", sans-serif;
        }
        .services-info {
            margin: 0 0 30px;
            padding: 30px 25px 30px 30px;
            position: relative;
            text-align: left;
            background: #fff;
            overflow: hidden;
        }
        .services-info:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: 0.6s cubic-bezier(0.24, 0.74, 0.58, 1);
        }
    </style>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template1.elements.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.template1.elements.breadcrumb',['name'=>'Services'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="contact-2 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1>UMove Ltd: Your Go-To Solution for Stress-Free</h1>
            </div>
            <div class="row">
                <div class="col-sm-12 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info">
                        <div class="media-body">
                            
                            <h5 class="text-info">Property Management</h5>
                            <p>We get it; property management can be a real headache. <br/>That's why UMove Ltd is here—to take those problems off your hands, serving as the reliable friend you call when you need something fixed or sorted.</p>
                        </div>
                        <i class="d-none d-sm-block" style="width: inherit"><img width="100px" alt="Eucalyp" src="<?php echo e(asset('/img/team1.png')); ?>" alt=""></i>
                    </div>
                </div>
                <div class="col-sm-12 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info">
                        <div class="media-body">
                            <h5 class="text-info">UMove Ltd "Let Only Services</h5>
                            <ul style="list-style: square; padding-left:15px; line-height: 30px;">
                                <li>On the hunt for the perfect tenant? We've got you covered.</li>
                                <li>Full financial and background checks.</li>
                                <li>Complete letting paperwork, no fuss.</li>
                                <li>All wrapped up for a mere 7% of the monthly rent.</li>
                            </ul>
                        </div>
                        <i class="d-none d-sm-block" style="width: inherit"><img width="100px" alt="srip" src="<?php echo e(asset('/img/customer-service.png')); ?>" alt=""></i>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="featured-properties content-area-2" style="background-color: #f3f6f6">
        <div class="container">
            <div class="main-title">
                <h1>UMove Ltd "Full Management Services</h1>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info" style="min-height: 224px;">
                       <div class="media-body">
                        <div class="number">1</div>
                        <h5 class="heading text-info">Option 1: The Full Monty</h5>
                        <ul style="list-style: square; padding-left:15px; line-height: 30px;">
                            <li> From sourcing impeccable tenants to guaranteeing your rent, we've got it all.</li>
                            <li> Our 24/7 help desk ensures you sleep easy.</li>
                            <li> Benefit from our inclusive breakdown cover—painting, decoration, kitchen and bathroom upgrades.</li>
                            <li> All-inclusive at just 15% of the monthly rent.</li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info" style="min-height: 260px;">
                        <div class="media-body">
                            <div class="number">2</div>
                            <h5 class="heading text-info">Option 2: The Night Owl</h5>
                            <ul style="list-style: square; padding-left:15px; line-height: 30px;" >
                                <li> Guaranteed rent and a 24/7 help desk? What more could you want?</li>
                                <li> Inclusive breakdown cover to keep your property looking fresh.</li>
                                <li> All for a 10% slice of the monthly rent.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info" style="min-height: 224px;">
                        <div class="media-body">
                            <div class="number">3</div>
                            <h5 class="heading text-info">Option 3: The Trusted Advisor</h5>
                            <ul style="list-style: square; padding-left:15px; line-height: 30px;">
                                <li> We guarantee rent and are on-call 24/7 to recommend the contractors you never knew you needed.</li>
                                <li> An all-in deal for only 7% of the monthly rent.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="media services-info" style="min-height: 224px;">
                        <div class="media-body">
                            <div class="number">4</div>
                            <h5 class="heading text-info">Option 4: The Bare Necessities</h5>
                            <ul style="list-style: square; padding-left:15px; line-height: 30px;">
                                <li>24-hour help desk service to answer your burning midnight queries.</li>
                                <li>We'll point you to trusted, vetted contractors.</li>
                                <li>All this for a straightforward 4% of your monthly rent.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-2 content-area-7">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeInUp delay-04s" style="visibility: visible; animation-name: fadeInUp;">
                    <p style="font-size: 20px; line-height: 2; text-align: center;">By choosing UMove, you're not just outsourcing property management —you're buying peace of mind. <br/>Let us solve your property challenges so you can focus on what truly matters. </p>
                </div>
            </div>
        </div>
    </div>
     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/services.blade.php ENDPATH**/ ?>