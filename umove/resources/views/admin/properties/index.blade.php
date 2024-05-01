<x-admin-layout>
    <x-slot name="header">{{ __('Properties') }} </x-slot>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Properties
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                
                            </div>
                            <a href="{{ route('properties.add','buy')}}" class="btn btn-primary btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Create for Buy
                            </a>
                            &nbsp;
                            <a href="{{ route('properties.add','rent')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Create for Rent
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Create Date</th>
                            <th>Price</th>
                            <th data-toggle="kt-tooltip" title="Property Status">PS</th>
                            <th data-toggle="kt-tooltip" title="Property Type">PT</th>
                            <th>Address</th>
                            <th>Advert Type</th>
                            <th>Note</th>
                            <th>Beds</th>
                            <th>Baths</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($properties as $property)
                            <tr>
                                <td data-order="{{$property['created_at']}}">
                                    {{ count($property->images) > 0 ?
                                        $property['created_at'] .', '.url('/img/uploads/'.$property['id'].'/'.$property->images[0]['image_name']) : '' }}
                                     
                                    
                                </td>
                                <td>£{{ $property['price'] }}</td>
                                <td>{{ Str::title($property['property_status']) }}</td>
                                <td>For {{ config('home.property_type'.($property['property_status'] == 'buy' ? '_for_sale.' : ($property['advert_type'] == 'room_only' ? '_for_room.' : '.')).$property['property_type'])  }}</td>
                                <td>
                                    <div>{{ $property['address'] }}</div>    
                                    <div>{{ $property['city'] }} </div>    
                                    <div>{{ $property['postcode'] }}</div>    
                                </td>
                                <td>{{ Str::title(Str::replace('_',' ',$property['advert_type'])) }}</td>
                                <td>{{ $property['note'] }}</td>
                                <td>{{ $property['bedroom'] }}</td>
                                <td>{{ $property['bathroom'] }}</td>
                                <td>{{ $property['confirmed'] }}</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a class="btn btn-primary btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Show" target="_blank" href="{{ route('properties.show', $property->id) }}"><i class="flaticon-visible"></i> </a>
                                            </td>
                                            <td>
                                                @can('property-edit')
                                                <a class="btn btn-info btn-icon" data-toggle="kt-tooltip" data-placement="top" title="Edit" href="{{ route('properties.edit', $property->id) }}"><i class="flaticon-edit"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                @can('property-edit')
                                                @if($property->confirmed === 1)
                                                {!! Form::open(['method' => 'Post','route' => ['property-confirm', $property->id],'style'=>'display:inline', 'id'=>'property-confirm-'.$property->id]) !!}
                                                    {!! Form::button('<i class="fa fa-ban"></i>', ['onclick'=>'confirmProperty('.$property->id.','.$property->confirmed.')','class' => 'btn btn-warning btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Confirm','id'=> 'confirm']) !!}
                                                {!! Form::close() !!}
                                                @else
                                                {!! Form::open(['method' => 'Post','route' => ['property-confirm', $property->id],'style'=>'display:inline', 'id'=>'property-confirm-'.$property->id]) !!}
                                                    {!! Form::button('<i class="fa fa-check-circle"></i>', ['onclick'=>'confirmProperty('.$property->id.', '.$property->confirmed.')','class' => 'btn btn-success btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Confirm','id'=> 'confirm']) !!}
                                                {!! Form::close() !!}
                                                @endif
                                                @endcan
                                            </td>
                                            <td>
                                            @can('property-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['properties.destroy', $property->id],'style'=>'display:inline', 'id'=>'property-delete-'.$property->id]) !!}
                                                {!! Form::button('<i class="flaticon2-trash"></i>', ['onclick'=>'deleteProperty('.$property->id.')','class' => 'btn btn-danger btn-icon','data-toggle'=>'kt-tooltip', 'data-placement'=>'top', 'title'=>'Delete','id'=> 'delete']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @empty
                            <p>No data</p>
                        @endforelse
                    </tbody>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    

    @push('scripts')
        <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ asset('js/admin/property_list.js?'.time()) }}" type="text/javascript"></script>
        <script>
            function deleteProperty(id) {
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
                        $('form#property-delete-'+id)[0].submit();
                    }
                });
            }

            function confirmProperty(id, status) {
                event.preventDefault();
                console.log(id)
                swal({
                    title: 'Are you sure?',
                    text: "Property status will be "+ (status == 1 ? 'passive' : 'active'),
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    allowOutsideClick: true
                },function(result){
                    console.log(result);
                    if (result) {
                        $('form#property-confirm-'+id)[0].submit();
                    }
                });
            }
        </script>
    @endpush
    @push('css')
    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush('endpush')
</x-admin-layout>

<!-- Script loading  -->

