<x-admin-layout>
    <x-slot name="header">{{ __('Reviews') }} </x-slot>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                {{ __('Reviews Management') }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>Property ID</th>
                        <th>Customer</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $item)
                    <tr>
                        <td>{{ $item['property']['id'] }}</td>
                        <td>{{ $item['user']['name'] }}</td>
                        <td>{{ $item->rating }}</td>
                        <td class="border border-slate-600 p-2 text-center">
                                <a class="hover:text-teal-500" href="{{ url('/detail/'.$item['property']['id']) }}" target="_blank">View Property</a>
                            </td>
                    </tr>
                    @empty
                        <p>You don't have any reviews</p>
                    @endforelse
                    
                    </tbody>
                </table>
           
        
        </div>
    </div>
</x-admin-layout>


