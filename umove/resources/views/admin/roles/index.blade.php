<x-admin-layout>
    <x-slot name="header">{{ __('Roles') }} </x-slot>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-security"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                {{ __('Role Management') }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        @can('role-create')
                        <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('roles.create') }}"> <i class="la la-plus"></i> New Role</a>
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
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Show" href="{{ route('roles.show',$role->id) }}"><i class="flaticon-visible"></i></a>
                            @can('role-edit')
                                <a class="btn btn-primary btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Edit" href="{{ route('roles.edit',$role->id) }}"><i class="flaticon-edit"></i></a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline', 'id'=>'role-delete-'.$role->id]) !!}
                                    {!! Form::button('<i class="flaticon2-trash"></i>', ['onclick'=>'deleteRole('.$role->id.')','class' => 'btn btn-danger btn-icon', 'data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Delete','id'=> 'delete']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            {!! $roles->render() !!}
            <!--end: Datatable -->
        </div>
    </div>
    

    @push('scripts')
        <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/admin/role_list.js') }}" type="text/javascript"></script>
        <script>
            function deleteRole(id) {
                event.preventDefault();
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
                        $('form#role-delete-'+id)[0].submit();
                    }
                });
            }
        </script>
    @endpush
    @push('css')
    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush('endpush')
</x-admin-layout>

