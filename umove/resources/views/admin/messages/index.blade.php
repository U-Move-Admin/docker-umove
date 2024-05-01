<x-admin-layout>
    <x-slot name="header">{{ __('Messages') }} </x-slot>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                {{ __('Messages') }}
                </h3>
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
                        <th>From</th>
                        <th>Property Id</th>
                        <th>Date</th>
                        <th>Read</th>
                        <th>Message</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th width="100px">View</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $key => $message)
                    <tr>
                        <td>{{ $message['name'] }}</td>
                        <td><a href="{{ url('detail/'.$message['property_id']) }}" target="_blank">{{ $message['property_id'] }}</a></td>
                        <td>{{ Carbon\Carbon::parse($message['created_at'])->isoFormat('MMMM Do, YYYY, HH:mm ') }}</td>
                        <td><span class="kt-badge kt-badge--{!! $message['readed_a'] != 1 ? 'warning' : 'primary'  !!}  kt-badge--inline kt-badge--pill">{!! $message['readed_a'] != 1 ? 'No' : 'Yes'  !!}</span></td>
                        <td>{{ Str::title($message['text']) }}</td>
                        <td>{{ $message['tel'] }}</td>
                        <td>{{ $message['email'] }}</td>
                        <td>
                        <a class="btn btn-primary btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Show" href="{{ route('messages.show',($message->message_id ? $message->message_id : $message->id)) }}"><i class="flaticon-visible"></i> </a>
                        
                        @can('message-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['messages.destroy', $message->id],'style'=>'display:inline', 'id'=>'customer-delete-'.$message->id]) !!}
                            {!! Form::button('<i class="flaticon2-trash"></i>', ['onclick'=>'deleteCustomer('.$message->id.')','class' => 'btn btn-danger btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Delete','id'=> 'delete']) !!}
                        {!! Form::close() !!}
                        @endcan
                        </td>
                    </tr>
                    @empty
                        <p>You don't have any message</p>
                    @endforelse
                    
                    </tbody>
                </table>
            
            <!--end: Datatable -->
        </div>
    </div>
    

    @push('scripts')
        <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/admin/message_list.js') }}" type="text/javascript"></script>
        <script>
            function deleteCustomer(id) {
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
                        $('form#customer-delete-'+id)[0].submit();
                    }
                });
            }
        </script>
    @endpush
    @push('css')
    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush('endpush')
   
</x-admin-layout>


