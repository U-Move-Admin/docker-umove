<x-app-layout>
    <x-slot name="header">{{ __('Saved Properties') }} </x-slot>


    <div class="container mx-auto mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bg-white rounded-md">
                    <div class="p-6 border-b text-lg text-bold">Saved Properties</div>

                    <div class="panel-body p-6">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table-auto w-full border-collapse border border-slate-500 first-letter mt-4 mb-3">
                            <thead>
                                <tr>
                                    <th class="border border-slate-600 p-2">Property ID</th>
                                    <th class="border border-slate-600 p-2">Details</th>
                                    <th class="border border-slate-600 p-2">Location</th>
                                    <th class="border border-slate-600 p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $k => $item)
                                <tr>
                                    <td class="border border-slate-600 p-2 text-center">#{{ $item['property']['id'] }}</td>
                                    <td class="border border-slate-600 p-2 text-center">For {{ Str::title($item['property']['property_status']. ' - '. $item['property']['property_type']) }}</td>
                                    <td class="border border-slate-600 p-2 text-center">{{ $item['property']['address'] . ' '. $item['property']['city'] }}</td>
                                    <td class="border border-slate-600 p-2 text-center">
                                        <a class="hover:text-teal-500" href="{{ url('/detail/'.$item['property']['id']) }}" target="_blank">View Property</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

