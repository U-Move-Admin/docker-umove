<!-- Banner start -->
<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo e(url('/img/banner_1.jpg')); ?>" alt="banner-1">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h1 data-animation="animated fadeInDown delay-05s"><?php echo e(config('app.name')); ?></h1>
                            <p data-animation="animated fadeInUp delay-10s">
                                Unlock the Full Potential of Your Property!
                            </p>
                            <a data-animation="animated fadeInUp delay-10s" href="<?php echo e(url('listing/buy')); ?>" class="btn btn-lg btn-round btn-theme">FOR SALE</a>
                            <a data-animation="animated fadeInUp delay-12s" href="<?php echo e(url('listing/rent')); ?>" class="btn btn-lg btn-round btn-white-lg-outline">FOR RENT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div><?php /**PATH /homepages/0/d872858855/htdocs/umove/resources/views/frontend/template1/elements/header.blade.php ENDPATH**/ ?>