<x-admin-layout>
    <x-slot name="header">{{ __('Customers') }} </x-slot>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                {{ __('Registered on the Website') }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                   
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Postcode</th>
                        <th>City</th>
                        <th>Country</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $key => $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->tel }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->postcode }}</td>
                        <td>{{ $customer->city }}</td>
                        <td>{{ $customer->country }}</td>
                        
                    </tr>
                    @empty
                        <p>You don't have any customer</p>
                    @endforelse
                    
                    </tbody>
                </table>
            <!--end: Datatable -->
        </div>
    </div>
    

    @push('scripts')
        <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/admin/customer_list.js') }}" type="text/javascript"></script>
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


