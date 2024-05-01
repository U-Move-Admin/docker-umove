<x-app-layout>
    <x-slot name="header">{{ __('My Messages') }} </x-slot>


    <div class="container mx-auto mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bg-white rounded-md">
                    <div class="p-6 border-b text-lg text-bold d-flex justify-content-between">{{ __('My Messages') }} 
                        <a class="text-decoration-none" href="{{ url('/user/my-messages') }}"> <i class="bi bi-arrow-left"></i> Back</a>

                    </div>

                    <div class="panel-body p-6">
                        <div class="list-group">
                            <div href="#" class="list-group-item list-group-item-action active" aria-current="true" style="text-align: right;">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">
                                    <a class="hover:text-teal-500" href="{{ url('/detail/'.$messages['property']['id']) }}" target="_blank">Property id: #{{ $messages['property']['id'] }}</a>
                                </h5>
                                <small>{{ Carbon\Carbon::parse($messages['created_at'])->isoFormat('MM-YYYY HH:mm') }} </small>
                                </div>
                                <p class="mb-1">{{ Str::title($messages['text']) }}</p>
                                <small>{{ $messages['name'] }}</small>
                            </div>
                            @if(count($messages['messages']) > 0)
                            @foreach($messages['messages'] as $item)
                            <div href="#" class="list-group-item list-group-item-action" style=" {{ $item['name'] == 'You' ? '':'text-align: right;'}}">
                                <div class=" ">
                                <h5 class="mb-1"></h5>
                                <small class="text-muted">{{ Carbon\Carbon::parse($item['created_at'])->isoFormat('D-MM-YYYY HH:mm') }} {{ $item['name'] != 'You' ? ($item['readed_a'] == 1 ? 'Seen' : 'Not Seen') : ''}}</small>
                                </div>
                                <p class="mb-1">{{ Str::title($item['text']) }}</p>
                                <small class="text-bold {{ $item['name'] == 'You' ? 'text-success':'text-primary'}}">{{ $item['name'] == 'You' ? config('app.name') : $item['name']}}</small>
                            </div>
                            @endforeach
                            @endif
                            <form method="post" action="{{ url('user/my-messages/'.$messages['id'])}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <textarea required placeholder="Text message" class="form-control rounded-0 " id="sendMessage" rows="3" name="text"></textarea>
                                    <button class="btn btn-primary w-100 btn-lg rounded-0 rounded-bottom" type="submit" id="button-addon1">SEND</button>
                                </div>
                            </form>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

