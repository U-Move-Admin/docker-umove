<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item " aria-haspopup="true">
                <x-admin.aside-menu.link :href="url('/dashboard')">
                    <x-admin.aside-menu.icon class="flaticon-home" />
                    <x-admin.aside-menu.span class="kt-menu__link-text">Dashboard</x-admin.aside-menu.span>
                </x-admin.aside-menu.link>
            </li>
            @if(auth()->user()->hasAnyPermission(['property-list','property-create','property-edit','property-delete','investment-list']))
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Property</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-placeholder-1"></i><span class="kt-menu__link-text">Properties</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <x-admin.aside-menu.kt-menu__subnav>    
                        @can('property-list')
                        <x-admin.aside-menu.li class="kt-menu__item--parent">
                            <x-admin.aside-menu.span class="kt-menu__link">
                                <x-admin.aside-menu.span class="kt-menu__link-text">Properties</x-admin.aside-menu.span>
                            </x-admin.aside-menu.span>
                        </x-admin.aside-menu.li>
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="url('/dashboard/properties')">List</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        @endcan
                        @can('property-create')
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="url('/dashboard/properties/add/rent')">Add For Rent</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="url('/dashboard/properties/add/buy')">Add For Buy</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        @endcan
                    </x-admin.aside-menu.kt-menu__subnav>
                </div>
            </li>
            @can('investment-list')
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="{{ route('investments.index') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-analytics"></i><span class="kt-menu__link-text">Investments</span></a>
            </li>
            @endcan
            @endif
            @if(auth()->user()->hasAnyPermission(['customer-list','customer-create','customer-edit','customer-delete','review-list']))
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Customers</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-customer"></i><span class="kt-menu__link-text">Customers</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <x-admin.aside-menu.kt-menu__subnav>    
                        @can('customer-list')
                        <x-admin.aside-menu.li class="kt-menu__item--parent">
                            <x-admin.aside-menu.span class="kt-menu__link">
                                <x-admin.aside-menu.span class="kt-menu__link-text">Customers</x-admin.aside-menu.span>
                            </x-admin.aside-menu.span>
                        </x-admin.aside-menu.li>
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="route('customers.index')" :active="request()->routeIs('customers.index')">Unregistered</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="url('dashboard/customers/users')" :>Registered</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        @endcan
                        @can('customer-create')
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="route('customers.create')">Add Customer</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        @endcan
                    </x-admin.aside-menu.kt-menu__subnav>
                </div>
            </li>
            @can('review-list')
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="{{ route('reviews.index') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-star"></i><span class="kt-menu__link-text">Reviews</span></a>
            </li>
            @endcan
            @endif
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Settings</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            @if(auth()->user()->hasAnyPermission(['store-details-update']))
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="{{ route('store') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-website"></i><span class="kt-menu__link-text">Store Details</span></a>
            </li>
            @endif
            @if(auth()->user()->hasAnyPermission(['user-list','user-create','user-edit','user-delete']))
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-users"></i><span class="kt-menu__link-text">User Management</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <x-admin.aside-menu.kt-menu__subnav>    
                        @can('user-list')
                        <x-admin.aside-menu.li class="kt-menu__item--parent">
                            <x-admin.aside-menu.span class="kt-menu__link">
                                <x-admin.aside-menu.span class="kt-menu__link-text">User Management</x-admin.aside-menu.span>
                            </x-admin.aside-menu.span>
                        </x-admin.aside-menu.li>
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="route('users.index')">Users</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        @endcan
                        @can('user-create')
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="route('users.create')">Create User</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        @endcan
                    </x-admin.aside-menu.kt-menu__subnav>
                </div>
            </li>
            @endif
            @if(auth()->user()->hasAnyPermission(['role-list','role-create','role-edit','role-delete']))
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-security"></i><span class="kt-menu__link-text">Roles</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <x-admin.aside-menu.kt-menu__subnav>    
                        @can('role-list')
                        <x-admin.aside-menu.li class="kt-menu__item--parent">
                            <x-admin.aside-menu.span class="kt-menu__link">
                                <x-admin.aside-menu.span class="kt-menu__link-text">Roles</x-admin.aside-menu.span>
                            </x-admin.aside-menu.span>
                        </x-admin.aside-menu.li>
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="route('roles.index')">Roles</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        @endcan
                        @can('role-create')
                        <x-admin.aside-menu.li>
                            <x-admin.aside-menu.link-bullet :href="route('roles.create')">Create Role</x-admin.aside-menu.link>
                        </x-admin.aside-menu.li>
                        @endcan
                    </x-admin.aside-menu.kt-menu__subnav>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>