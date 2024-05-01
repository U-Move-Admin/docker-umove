<x-admin-layout>
    <x-slot name="header">{{ __('Users') }} </x-slot>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                {{ __('User Management') }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        @can('user-create')
                        <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('users.create') }}"> <i class="la la-plus"></i> New User</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>Is Agent</th>
                        <th>Roles</th>
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tel }}</td>
                        <td>{{ $user->is_agent ? 'Yes' : 'No' }}</td>
                        <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                        </td>
                        <td>
                        <a class="btn btn-primary btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Show" href="{{ route('users.show',$user->id) }}"><i class="flaticon-visible"></i> </a>
                        @can('user-edit')
                        <a class="btn btn-info btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Edit" href="{{ route('users.edit',$user->id) }}"><i class="flaticon-edit"></i></a>
                        <a class="btn btn-warning btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Reset Password" href="{{ route('users.password.reset',$user->id) }}"><i class="flaticon2-lock"></i></a>
                        @endcan'
                        @can('user-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline', 'id'=>'user-delete-'.$user->id]) !!}
                            {!! Form::button('<i class="flaticon2-trash"></i>', ['onclick'=>'deleteUser('.$user->id.')','class' => 'btn btn-danger btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Delete','id'=> 'delete']) !!}
                        {!! Form::close() !!}
                        @endcan
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            
            <!--end: Datatable -->
        </div>
    </div>
    

    @push('scripts')
        <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/admin/role_list.js') }}" type="text/javascript"></script>
        <script>
            function deleteUser(id) {
                event.preventDefault();
                console.log(id)
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    allowOutsideClick: true
                },function(result){
                    console.log(result);
                    if (result) {
                        $('form#user-delete-'+id)[0].submit();
                    }
                });
            }
        </script>
    @endpush
    @push('css')
    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush('endpush')
</x-admin-layout>


