<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, []); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e(__('Dashboard')); ?>  <?php $__env->endSlot(); ?>

   
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::Dashboard 6-->

        <!--begin:: Widgets/Stats-->
        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-md-12 col-lg-6">

                        <!--begin::Total Profit-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Properties For Rent
                                    </h4>
                                    <!-- <span class="kt-widget24__desc">
                                        All Customs Value
                                    </span> -->
                                </div>
                                <span class="kt-widget24__stats kt-font-brand">
                                    <?php echo e($rent_count); ?>

                                </span>
                            </div>
                            
                        </div>

                        <!--end::Total Profit-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Feedbacks-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Properties For Buy
                                    </h4>
                                    <span class="kt-widget24__desc">
                                        
                                    </span>
                                </div>
                                <span class="kt-widget24__stats kt-font-success">
                                    <?php echo e($buy_count); ?>

                                </span>
                            </div>
                            
                        </div>

                        <!--end::New Feedbacks-->
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__content kt-section__content--solid kt-section__content--fit">

                        <!--begin::Preview-->
                        <div class="kt-grid-nav">
                            <div class="kt-grid-nav__row">
                                <a href="<?php echo e(url('/dashboard/properties/add/rent')); ?>" class="kt-grid-nav__item">
                                    <i class="kt-grid-nav__icon flaticon-file"></i>
                                    <span class="kt-grid-nav__title">Add Property For Rent</span>
                                </a>
                                <a href="<?php echo e(url('/dashboard/properties/add/buy')); ?>" class="kt-grid-nav__item">
                                    <i class="kt-grid-nav__icon flaticon-time"></i>
                                    <span class="kt-grid-nav__title">Add Property For Buy</span>
                                </a>
                                <a href="<?php echo e(url('/dashboard/customers/create')); ?>" class="kt-grid-nav__item">
                                    <i class="kt-grid-nav__icon flaticon-user"></i>
                                    <span class="kt-grid-nav__title">Add Customer</span>
                                </a>
                            </div>
                            <div class="kt-grid-nav__row">
                                <a href="<?php echo e(url('/dashboard/users')); ?>" class="kt-grid-nav__item">
                                    <i class="kt-grid-nav__icon flaticon-folder"></i>
                                    <span class="kt-grid-nav__title">Users</span>
                                </a>
                                <a href="<?php echo e(url('/dashboard/properties')); ?>" class="kt-grid-nav__item">
                                    <i class="kt-grid-nav__icon flaticon-clipboard"></i>
                                    <span class="kt-grid-nav__title">Properties</span>
                                </a>
                                <a href="<?php echo e(url('/dashboard/helps')); ?>" class="kt-grid-nav__item">
                                    <i class="kt-grid-nav__icon flaticon-info"></i>
                                    <span class="kt-grid-nav__title">Help</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Stats-->
        <div class="row">
            <div class="col-md-12">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('message-list')): ?>
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Recent Messages
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-actions mr-2">
                                <a href="<?php echo e(url('/dashboard/messages')); ?>" class="btn btn-outline-brand btn-sm">
                                    View All
                                </a>
                            </div>
                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget3_tab1_content" role="tab">
                                        Today
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget3_tab2_content" role="tab">
                                        Month
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget3_tab1_content">

                                <!--Begin::Timeline 3 -->
                                <div class="kt-timeline-v3">
                                    <div class="kt-timeline-v3__items">
                                        <?php if(count($today_messages) > 0): ?>
                                            <?php $__currentLoopData = $today_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                                                    <span class="kt-timeline-v3__item-time" style="font-size:12px">
                                                    <?php echo e(Carbon\Carbon::parse($item['created_at'])->format('H:i')); ?> <?php echo e(Carbon\Carbon::parse($item['created_at'])->format('d-M')); ?>

                                                    </span>
                                                    <div class="kt-timeline-v3__item-desc">
                                                        <span class="kt-timeline-v3__item-text">
                                                            <?php echo e($item['text']); ?>

                                                        </span><br>
                                                        <span class="kt-timeline-v3__item-user-name">
                                                            <a href="<?php echo e(route('messages.show',$item['id'])); ?>" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                                By <?php echo e($item['name']); ?>

                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?> 
                                            <div class="alert alert-elevate alert-info" role="alert">
                                                <div class="alert-text">There is no record!</div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!--End::Timeline 3 -->
                            </div>
                            <div class="tab-pane" id="kt_widget3_tab2_content">
                                <div class="kt-timeline-v3">
                                <div class="kt-timeline-v3__items">
                                <!--Begin::Timeline 3 -->
                                <?php if(count($messages)): ?>
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                                        <span class="kt-timeline-v3__item-time" style="font-size:12px">
                                        <?php echo e(Carbon\Carbon::parse($item['created_at'])->format('H:i')); ?> <?php echo e(Carbon\Carbon::parse($item['created_at'])->format('d-M')); ?>

                                        </span>
                                        <div class="kt-timeline-v3__item-desc">
                                            <span class="kt-timeline-v3__item-text">
                                                <?php echo e($item['text']); ?>

                                            </span><br>
                                            <span class="kt-timeline-v3__item-user-name">
                                                <a href="<?php echo e(route('messages.show',$item['id'])); ?>" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                    By <?php echo e($item['name']); ?>

                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?> 
                                    <div class="alert alert-elevate alert-light" role="alert">
                                        <div class="alert-text">There is no record!</div>
                                    </div>
                                <?php endif; ?>
                                </div></div>
                                <!--End::Timeline 3 -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH /home/u390945238/domains/umove.london/resources/views/dashboard.blade.php ENDPATH**/ ?>