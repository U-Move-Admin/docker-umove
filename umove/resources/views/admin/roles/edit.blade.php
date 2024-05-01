<x-admin-layout>
    <x-slot name="header">{{ __('Roles') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title"> Edit Role -  <small>try to scroll the page</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('roles.index') }}" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-brand" id="submit">
                                <i class="la la-check"></i>
                                <span class="kt-hidden-mobile">Update</span>
                            </button>
                        </div>
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
                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id], 'class'=> 'kt-form', 'id'=>'kt_form_1']) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="row">Permissions</th>
                                            <th>List</th>
                                            <th>Create</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Role</th>
                                            @foreach($permission as $v)
                                            
                                            @php if($v->name === 'role-list') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if ($v->name ==='role-create') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'role-edit') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'role-delete') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } @endphp
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">User</th>
                                            @foreach($permission as $v)
                                            @php if($v->name === 'user-list') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'user-create') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'user-edit') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'user-delete') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } @endphp
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Property</th>
                                            @foreach($permission as $v)
                                            @php if($v->name === 'property-list') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'property-create') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'property-edit') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'property-delete') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } @endphp
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Investment</th>
                                            @foreach($permission as $v)
                                            @php if($v->name === 'investment-list') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'investment-create') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'investment-edit') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'investment-delete') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } @endphp
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Customer</th>
                                            @foreach($permission as $v)
                                            @php if($v->name === 'customer-list') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'customer-create') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'customer-edit') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'customer-delete') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } @endphp
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Message</th>
                                            @foreach($permission as $v)
                                            @php if($v->name === 'message-list') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'message-action') {
                                                echo '<td colspan="2"><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'message-delete') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } @endphp
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Review</th>
                                            @foreach($permission as $v)
                                            @php if($v->name === 'review-list') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'review-action') {
                                                echo '<td colspan="2"><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } else if($v->name === 'review-delete') {
                                                echo '<td><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } @endphp
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Store Detail</th>
                                            @foreach($permission as $v)
                                            @php if($v->name === 'store-details-update') {
                                                echo '<td colspan="4"><label class="kt-checkbox kt-checkbox--brand">'.
                                                '<input name="permission[]" value="'.$v->id.'" type="checkbox"'.
                                                (Arr::has($rolePermissions, $v->id) ? "checked=\"checked\"" : "").'>'.
                                                $v->name.'<span></span></label></td>';
                                            } @endphp
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                <span class="check-error"></span>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/admin/role_form.js') }}" type="text/javascript"></script>
    @endpush
</x-admin-layout>

<!-- Script loading  -->