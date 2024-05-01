<header class="top-header top-header-bg d-none d-xl-block d-lg-block d-md-block" id="top-header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="list-inline">
                    <?php if(!empty($store['tel'])): ?><a href="tel:<?php echo e($store['tel']); ?>"><i class="fa fa-phone"></i><?php echo e($store['tel']); ?></a> <?php endif; ?>
                    <a href="mailto:<?php echo e($store['email']); ?>"><i class="fa fa-envelope"></i><?php echo e($store['email']); ?></a>
                </div>  
            </div>
            <div class="col-sm-6">
                <ul class="top-social-media pull-right">
                <?php if(auth()->guard()->check()): ?>
                    <li class="pt0 dropdown">
                        <?php if(auth()->user()->getRoleNames()->count() == 0): ?>
                        <a class="dropdown-toggle pb-3" id="dropdownMenuButton" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-user"></i> Hi, <?php echo e(Auth::user()->name); ?></a>
                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                            <a  class="dropdown-item" href="<?php echo e(url('user/saved-properties')); ?>"><?php echo e(__('Saved Properties')); ?></a>
                            <a class="dropdown-item"  href="<?php echo e(url('user/my-reviews')); ?>"><?php echo e(__('My Reviews')); ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="<?php echo e(url('/logout')); ?>"><?php echo e(__('Logout')); ?></a>
                        </div>
                        <?php else: ?>
                        <a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-user"></i> Hi, <?php echo e(Auth::user()->name); ?></a>
                        <?php endif; ?> 
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e(url('/login')); ?>" class="sign-in"><i class="fa fa-sign-in"></i> Login </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/register')); ?>" class="sign-in"><i class="fa fa-user"></i> Register</a>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->
    
<!-- main header start -->
<header class="main-header do-sticky" id="main-header-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light rounded">
                    <a class="navbar-brand logo navbar-brand d-flex mr-auto" href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(asset('/img/logo-2.png')); ?>" alt="UMove Logo" height="65px" /> <span class="logo-name"><?php echo e(config('app.name')); ?></span> 
                    </a>
                    <form class="form-inline my-2 my-lg-0 hidden-md-up">
                        <a href="#full-page-search" class=" my-2 my-sm-0" style="color:#42A8AD;">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                    <button class="navbar-toggler" type="button" id="drawer" >
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown <?php echo e($active_header == 'buy-listing' ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('listing/buy')); ?>" >
                                    Buy
                                </a>
                            </li>
                            <li class="nav-item dropdown <?php echo e($active_header == 'rent-listing' ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('listing/rent')); ?>" >Rent</a>
                            </li>
                            <li class="nav-item dropdown <?php echo e($active_header == 'services' ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('services')); ?>" >Services</a>
                            </li>
                            <!-- <li class="nav-item <?php echo e($active_header == 'consultant' ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('/agents')); ?>">Agents </a>
                            </li> -->
                            <li class="nav-item <?php echo e($active_header == 'investments' ? 'investments' : ''); ?>">
                                <a class="nav-link" href="/investments">Investments </a>
                            </li>
                            
                            <li class="nav-item <?php echo e($active_header == 'about' ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('/about')); ?>">About Us</a>
                            </li>
                            <li style="align-self: center" class="nav-item <?php echo e($active_header == 'contact' ? 'active' : ''); ?>">
                                <a style="padding: 10px" class="nav-link search-button btn-xs btn-color"  href="<?php echo e(url('/contact')); ?>">Free Property Valuation</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0 hidden-sm-down">
                            <a href="#full-page-search" class=" my-2 my-sm-0">
                                <i class="fa fa-search"></i>
                            </a>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<nav id="sidebar" class="nav-sidebar mCustomScrollbar _mCS_1 mCS-autoHide" >
<div id="mCSB_1" class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;">
    <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
        <!-- Close btn-->
        <div id="dismiss">
            <i class="fa fa-close"></i>
        </div>
        <div class="sidebar-inner">
            <div class="sidebar-logo">
                <img src="<?php echo e(url('/img/logo-2.png')); ?>" alt="sidebarlogo" class="mCS_img_loaded">
            </div>
            <div class="sidebar-navigation">
                <ul class="menu-list">
                    <li class="pt0 <?php echo e($active_header == 'buy-listing' ? 'active' : ''); ?>">
                        <a  class="nav-link" href="<?php echo e(url('/listing/buy')); ?>" >Buy </a>
                    </li>
                    <li class="pt0 <?php echo e($active_header == 'rent-listing' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('/listing/rent')); ?>" >Rent</a>
                    </li>
                    <li class="pt0 <?php echo e($active_header == 'services' ? 'services' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('/services')); ?>">Services </a>
                    </li>
                    <li class="pt0 <?php echo e($active_header == 'investments' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('/investments')); ?>">Investments </a>
                    </li>
                    <li class="pt0 <?php echo e($active_header == 'about' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('/about')); ?>">About </a>
                    </li>
                    <li class="pt0 <?php echo e($active_header == 'contact' ? 'active' : ''); ?>">
                        <a class="valuation-link nav-link" href="<?php echo e(url('/contact')); ?>">Free Property Valuation</a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-navigation">
                <ul class="menu-list">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->getRoleNames()->count() > 0): ?>
                            <li class="pt0">
                                <a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-user"></i> Hi, <?php echo e(Auth::user()->name); ?></a>
                            </li>
                        <?php else: ?>
                            <li class="pt0">
                                <a href="#" class="pt0">Hi, <?php echo e(Auth::user()->name); ?> <em class="fa fa-chevron-down"></em></a>
                                <ul style="display: none;">
                                    <li class="selected--last"><a href="<?php echo e(url('user/saved-properties')); ?>" ><?php echo e(__('Saved Properties')); ?></a></li>
                                    <li class="selected--last"><a href="<?php echo e(url('user/my-reviews')); ?>" ><?php echo e(__('My Reviews')); ?></a></li>
                                    <li class="selected--last">
                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                            <a 
                                                style="padding-left: 30px;"
                                                href="<?php echo e(route('logout')); ?>" 
                                                onclick="event.preventDefault();this.closest('form').submit();"  
                                            ><?php echo e(__('Log Out')); ?></a>
                                        </form>
                                    </li>
                                </ul>
                            </li>  
                        <?php endif; ?> 
                    <?php else: ?>
                        <li class="pt0 <?php echo e($active_header == 'login' ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/login')); ?>">Login</a>
                        </li>
                        <li class="pt0 <?php echo e($active_header == 'register' ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/register')); ?>">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="get-in-touch">
                <h3 class="heading">Get in Touch</h3>
                <?php if(!empty($store['tel'])): ?>
                <div class="media">
                    <i class="fa fa-phone"></i>
                    <div class="media-body">
                        <a href="tel:<?php echo e($store['tel']); ?>"><?php echo e($store['tel']); ?></a>
                    </div>
                </div>
                <?php endif; ?>
                <div class="media">
                    <i class="fa fa-envelope"></i>
                    <div class="media-body">
                        <a href="mailto:<?php echo e($store['email']); ?>"><?php echo e($store['email']); ?></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical mCSB_scrollTools_onDrag" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger mCSB_dragger_onDrag" style="position: absolute; min-height: 50px; display: block; height: 402px; max-height: 579px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></nav>

<!-- main header end -->
<style>
    .top-header {
        z-index: 1000 !important;
    }
    #top-header-2 a {
        position: relative;
    }
    .header-shrink {
        z-index: 1001;
    }
    .top-header .dropdown-toggle::after {
        top: 10px;
        right: -15px;
    }
    #top-header-2 .top-social-media li a.dropdown-item:hover {
        color: #16181b;
    }
    #top-header-2 a.dropdown-item {
        color: #16181b;
    }
    .sidebar-navigation ul li a.valuation-link {
        color: #A73B00
    }
</style><?php /**PATH /homepages/0/d872858855/htdocs/umove/resources/views/frontend/template1/elements/header2.blade.php ENDPATH**/ ?>