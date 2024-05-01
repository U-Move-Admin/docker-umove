<x-admin-layout>
    <x-slot name="header">{{ __('Help') }} </x-slot>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-info"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                {{ Str::title(__($data)) }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <a href="{{ route('help') }}" class="btn btn-clean kt-margin-r-10">
                    <i class="la la-arrow-left"></i>
                    <span class="kt-hidden-mobile">Back</span>
                </a>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="embed-responsive embed-responsive-16by9">
            <video width="400" controls autoplay>
                <source src="{{ url('videos/'.$data.'.mov') }}" type="video/mp4">
            </video>
                
               
            </div>
            
        </div>
    </div>
    

    @push('scripts')
        <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/admin/customer_list.js') }}" type="text/javascript"></script>
        <script>
        </script>
    @endpush
    @push('css')
    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush('endpush')
   
</x-admin-layout>


