<x-app-layout>
    <x-slot name="header">{{ __('My Reviews') }} </x-slot>


    <div class="container mx-auto mt-5">
        <div class="row ">
            <div class="col-md-3">
                <div class="list-group" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="tab" data-bs-target="#inbox" type="button" role="tab" aria-controls="inbox" aria-selected="true">
                        Inbox
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="tab" data-bs-target="#sent" type="button" role="tab" aria-controls="sent" aria-selected="false">Sent</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content bg-white rounded-md border border-slate-500" id="myTabContent">
                    <div class="tab-pane fade show active" id="inbox" role="tabpanel" aria-labelledby="inbox-tab" tabindex="0">
                        <div class="panel panel-default" >
                            <div class="p-6 border-b text-lg text-bold">{{ __('Inbox: All Messages') }} </div>

                            <div class="panel-body">
                                @if(count($replies) > 0)
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="p-2">Text</th>
                                            <th class="p-2">Read</th>
                                            <th class="p-2">Date</th>
                                            <th class="p-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($replies as $k => $item)
                                        <tr>
                                            <td class="p-2 ">
                                                <a href="{{ url('user/my-messages/'.($item['message_id'] ? $item['message_id'] : $item['id'])) }}" class="">
                                                {{ $item['text'] }} 
                                                </a>
                                            </td>
                                            <td class="p-2 ">
                                                <span class="badge text-bg-{{ $item['readed_c'] ? 'primary' : 'warning' }}">{{ $item['readed_c'] ? 'Yes' : 'No' }}</span>    
                                            </td>
                                            <td class="p-2 ">{{ Carbon\Carbon::parse($item['created_at'])->isoFormat('DD MMM YYYY') }}</td>
                                            <td class="p-2 text-center">
                                                <a class=" hover:text-teal-500" href="{{ url('/detail/'.$item['property']['id']) }}" target="_blank">View Property</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div>You don't have any messages</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab" tabindex="0">
                        <div class="panel panel-default" >
                            <div class="p-6 border-b text-lg text-bold">{{ __('Sent') }} </div>

                            <div class="panel-body">
                                @if(count($messages) > 0)
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="p-2">Text</th>
                                            <th class="p-2">Date</th>
                                            <th class="p-2">Recieved</th>
                                            <th class="p-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($messages as $k => $item)
                                        <tr>
                                            <td class="p-2 ">
                                                <a href="{{ url('user/my-messages/'.($item['message_id'] ? $item['message_id'] : $item['id'])) }}" class="">
                                                    {{ $item['text'] }}
                                                </a>
                                            </td>
                                            <td class="p-2 ">{{ Carbon\Carbon::parse($item['created_at'])->isoFormat('D MMM YYYY') }}</td>
                                            <td class="p-2 ">
                                                <span class="badge text-bg-{{ $item['readed_c'] ? 'primary' : 'warning' }}">{{ $item['readed_a'] ? 'Yes' : 'No' }}</span>    
                                            </td>
                                            <td class="p-2 text-center">
                                                <a class="hover:text-teal-500" href="{{ url('/detail/'.$item['property']['id']) }}" target="_blank">View Property</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div>You don't have any messages</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</x-admin-layout>

