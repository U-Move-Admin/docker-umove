<x-admin-layout>
    <x-slot name="header">{{ __('Users') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">{{ $role->name }} -  <small>try to scroll the page</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('roles.index') }}" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                    
                    </div>
                </div>
                <div class="kt-portlet__body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(!empty($rolePermissions))
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Permissions</th>
                                <th>List</th>
                                <th>Create</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Role</th>
                                <?php 
                                if( in_array('role-list', $rolePermissions, true) ) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('role-create', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('role-edit', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('role-delete', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <th scope="row">User</th>
                                <?php 
                                if( in_array('user-list', $rolePermissions, true) ) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('user-create', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('user-edit', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('user-delete', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <th scope="row">Property</th>
                                <?php 
                                if( in_array('property-list', $rolePermissions, true) ) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('property-create', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('property-edit', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('property-delete', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <th scope="row">Investment</th>
                                <?php 
                                if( in_array('investment-list', $rolePermissions, true) ) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('investment-create', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('investment-edit', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('investment-delete', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <th scope="row">Customer</th>
                                <?php 
                                if( in_array('customer-list', $rolePermissions, true) ) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('customer-create', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('customer-edit', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('customer-delete', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <th scope="row">Message</th>
                                <?php 
                                if( in_array('message-list', $rolePermissions, true) ) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('message-action', $rolePermissions, true)) {
                                    echo '<td colspan="2"><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td colspan="2"><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('message-delete', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <th scope="row">Review</th>
                                <?php 
                                if( in_array('review-list', $rolePermissions, true) ) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('review-action', $rolePermissions, true)) {
                                    echo '<td colspan="2"> <span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td colspan="2"><span class="fa fa-times"></span></td>';
                                }
                                if( in_array('review-delete', $rolePermissions, true)) {
                                    echo '<td><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times"></span></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <th scope="row">Store Detail</th>
                                <?php 
                                if( in_array('store-details-update', $rolePermissions, true) ) {
                                    echo '<td colspan="4"><span class="fa fa-check"></span></td>';
                                } else {
                                    echo '<td colspan="4"><span class="fa fa-times"></span></td>';
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
                    
                
</x-admin-layout>

<!-- Script loading  -->

