<?php $__env->startSection('title','Invesments | '.config('app.name')); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e('Invesments '.config('app.name')); ?>"/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="<?php echo e('Invesments '.config('app.name')); ?>" />
    <meta property="og:image" content="<?php echo e(asset(config('broker.logo'))); ?>">
    <meta property="og:description" content="<?php echo e('Invesments '.config('app.name')); ?>">  
    <!-- twitter -->
    <meta name="twitter:title" content="<?php echo e('Invesments '.config('app.name')); ?>">  
    <meta name="twitter:description" content="<?php echo e('Invesments '.config('app.name')); ?>">  
    <meta name="twitter:image:src" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    <!-- google -->
    <meta itemprop="name" content="<?php echo e('Invesments '.config('app.name')); ?>">  
    <meta itemprop="description" content="<?php echo e('Invesments '.config('app.name')); ?>">  
    <meta itemprop="image" content="<?php echo e(asset(config('broker.logo'))); ?>">  
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
<style>
    .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        flex-direction: column;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper-slide .rightside {
        display: flex; 
        flex:1; 
        align-items: center; 
        justify-content: center; 
        height: 100%;
      }
      .swiper-slide .row.light {
        background: #bbd5d6;
      }
      section {
          display: flex;
      }
      .section-about {
        padding: 120px 0;
        background: #F2F1EE;
      }
      .section-content {
        padding: 98px 0;
        background: #FFFFFF;
      }
      .section-about .content-block p{
        font-size: 38px;
        line-height: 50px;
      }
      .section-content .content-block p{
        font-size: 18px;
        line-height: 50px;
      }
      .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -20px;
        margin-left: -20px;
        }
        .justify-content-center {
            justify-content: center !important;
        }
        .container-fluid {
        width: 100%;
        max-width: 1280px;
        padding-left: 30px;
        padding-right: 30px;
    }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template1.elements.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div>
                        <div class="row light">
                            <div class="col-md-6">
                                <div class="rightside">
                                    <h2>Investments & Developments</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo e(asset('/img/image_1.jpg')); ?>" alt="image slider 1" >
                            </div>
                        </div>
                        <div class="section section-about">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-11">
                                        <div class="content-block text-lg font-weight-light text-center">
                                            <p>Whether you’re a private investor slowly growing your portfolio or a FTSE100 property company selling a block of flats, we’re experienced in sourcing and disposing of investments, whatever the scope of your requirements.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section section-content">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-11">
                                        <div class="content-block text-lg font-weight-light text-left">
                                            <p><b>Acquisitions</b></p>    
                                            <p>In a marketplace where supply has never met demand, we believe the multi-discipline methodology of our agency gives us an edge. Not only does it mean we spot more investment and development opportunities, but it also allows us to collaborate and share our expertise with other teams.</p>    
                                            <p>When it comes to mixed use buildings – be it a typical West End ‘shop with uppers’, or a freehold that mixes flats and offices – we work in tandem with our commercial team to give you the best comprehensive advice. With our thriving lettings department, we’re perfectly placed to advise on residential rental valuations, how to maximise achievable rent, and how to manage tenancies.</p>    
                                            <p>We take an innovative and energetic attitude to the investment market, seeing things differently to our peers. We listen to your needs and draw on our extensive network to find you the complete solution.</p>    
                                            <p><b>Disposal</b></p>    
                                            <p>We don’t just understand buildings; we understand people and buying trends. We know what the market needs and where, at any given moment. So, when you decide to dispose of your investment – be it anything from an individual flat to a freehold building – we know how to get you the best price.</p>    
                                            <p>Over the years, we’ve built up solid connections with a strong network of both domestic and overseas buyers, as well as search agents. This puts us in prime position for finding you the most competent and committed buyer.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div>
                        <div class="row light">
                            <div class="col-md-6">
                                <div class="rightside">
                                    <h2>Investments & Developments</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo e(asset('/img/image_2.jpg')); ?>" alt="image slider 2" >
                            </div>
                        </div>
                        <div class="section section-about">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-11">
                                        <div class="content-block text-lg font-weight-light text-center">
                                            <p>Whether you’re a private investor slowly growing your portfolio or a FTSE100 property company selling a block of flats, we’re experienced in sourcing and disposing of investments, whatever the scope of your requirements.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div>
                        <div class="row light">
                            <div class="col-md-6">
                                <div class="rightside">
                                    <h2>Investments & Developments</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo e(asset('/img/image_3.jpg')); ?>" alt="image slider 3" >
                            </div>
                        </div>
                        <div class="section section-about">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-11">
                                        <div class="content-block text-lg font-weight-light text-center">
                                            <p>Whether you’re a private investor slowly growing your portfolio or a FTSE100 property company selling a block of flats, we’re experienced in sourcing and disposing of investments, whatever the scope of your requirements.</p>
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

<?php $__env->startSection('script'); ?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        effect: "fade",
      });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/investments.blade.php ENDPATH**/ ?>