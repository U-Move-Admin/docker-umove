<x-admin-layout>
    <x-slot name="header">{{ __('Help') }} </x-slot>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                {{ __('Help') }}
                </h3>
            </div>
            
        </div>
        <div class="kt-portlet__body">
            <div class="kt-section">
                <div class="kt-section__content kt-section__content--solid kt-section__content--fit">

                    <!--begin::Preview-->
                    <ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3 kt-margin-t-20 kt-margin-b-20" id="kt_nav" role="tablist">
                        <li class="kt-nav__item">
                            <a class="kt-nav__link" href="{{ url('dashboard/helps/dashboard') }}" role="link">
                                <span class="kt-nav__link-icon"><i class="flaticon-home"></i></span>
                                <span class="kt-nav__link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a class="kt-nav__link" href="{{ url('dashboard/helps/change-my-password') }}" role="link">
                                <span class="kt-nav__link-icon"><i class="flaticon-home"></i></span>
                                <span class="kt-nav__link-text">Change My Password</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a class="kt-nav__link  collapsed" role="tab" id="kt_nav_link_1" data-toggle="collapse" href="#nav_1" aria-expanded="  false">
                                <i class="kt-nav__link-icon flaticon-placeholder-1"></i>
                                <span class="kt-nav__link-text">Properties Page</span>
                                <span class="kt-nav__link-badge">
                                    <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">new</span>
                                </span>
                                <span class="kt-nav__link-arrow"></span>
                            </a>
                            <ul class="kt-nav__sub collapse" id="nav_1" role="tabpanel" aria-labelledby="nav_1" data-parent="#kt_nav">
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/property-list') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">List</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/add-property') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Add</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/edit-property') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="kt-nav__item ">
                            <a class="kt-nav__link  collapsed" role="tab" id="" data-toggle="collapse" href="#nav_2" aria-expanded="  false">
                                <i class="kt-nav__link-icon flaticon-customer"></i>
                                <span class="kt-nav__link-text">Customer Page</span>
                                <span class="kt-nav__link-arrow"></span>
                            </a>
                            <ul class="kt-nav__sub collapse" id="nav_2" role="tabpanel" aria-labelledby="nav_1" data-parent="#kt_nav">
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/customer-list') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">List</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/add-customer') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Add</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/edit-customer') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="kt-nav__item">
                            <a class="kt-nav__link" href="{{ url('dashboard/helps/store-detail') }}" role="link">
                                <span class="kt-nav__link-icon"><i class="flaticon2-website"></i></span>
                                <span class="kt-nav__link-text">Store Detail</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a class="kt-nav__link  collapsed" role="tab" id="" data-toggle="collapse" href="#nav_3" aria-expanded="  false">
                                <i class="kt-nav__link-icon flaticon-users"></i>
                                <span class="kt-nav__link-text">User Management</span>
                                <span class="kt-nav__link-arrow"></span>
                            </a>
                            <ul class="kt-nav__sub collapse" id="nav_3" role="tabpanel" aria-labelledby="nav_3" data-parent="#kt_nav">
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/user-list') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">List</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/add-user') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Add</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/edit-user') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Edit</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/reset-user-password') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Reset Password</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="kt-nav__item ">
                            <a class="kt-nav__link  collapsed" role="tab" id="" data-toggle="collapse" href="#nav_4" aria-expanded="  false">
                                <i class="kt-nav__link-icon flaticon-security"></i>
                                <span class="kt-nav__link-text">Role Management</span>
                                <span class="kt-nav__link-arrow"></span>
                            </a>
                            <ul class="kt-nav__sub collapse" id="nav_4" role="tabpanel" aria-labelledby="nav_4" data-parent="#kt_nav">
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/role-list') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">List</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/add-role') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Add</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ url('dashboard/helps/edit-role') }}" class="kt-nav__link">
                                        <span class="kt-nav__link-bullet kt-nav__link-bullet--line"><span></span></span>
                                        <span class="kt-nav__link-text">Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
        </script>
    @endpush

</x-admin-layout>


