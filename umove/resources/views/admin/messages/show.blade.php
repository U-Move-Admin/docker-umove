<x-admin-layout>
    <x-slot name="header">{{ __('Messages') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Customer: {{ Str::ucfirst($messages['name']) }} </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('messages.index') }}" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                    
                    </div>
                </div>
                <div class="kt-portlet__body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tel:</strong>
                                {{ $messages['tel'] }}
                            </div>
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $messages['email'] }}
                            </div>
                            <div class="form-group">
                                <strong>Message:</strong>
                                {{ $messages['text'] }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="background-position: center;min-height: 500px; background-image: url({{ asset('img/uploads/'.$messages['property_id'].'/'.$messages['property']['images'][0]['image_name'])}})">
                                <h3 class="kt-widget19__title kt-font-light">
                                    {{$messages['property']['title'] || null }}
                                </h3>
                                <div class="kt-widget19__shadow"></div>
                                <div class="kt-widget19__labels">
                                    <a href="#" class="btn btn-label-light-o2 btn-bold btn-sm ">Recent</a>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-widget19__wrapper">
                                <div class="kt-widget19__content">
                                   
                                    <div class="kt-widget19__info">
                                        <a href="#" class="kt-widget19__username">
                                        {{$messages['property']['address']}}
                                        </a>
                                        <span class="kt-widget19__time">
                                        {{$messages['property']['city']}}, {{$messages['property']['postcode']}}
                                        </span>
                                    </div>
                                    <div class="kt-widget19__stats">
                                        <span class="kt-widget19__number kt-font-brand">
                                        {{$messages['property']['bedroom']}} bedrooms
                                        </span>
                                        <a href="#" class="kt-widget19__comment">
                                        {{$messages['property']['bathroom']}} bath
                                        </a>
                                    </div>
                                </div>
                                <div class="kt-widget19__text">
                                {!! $messages['property']['description'] !!}
                                </div>
                            </div>
                            <div class="kt-widget19__action">
                                <a href="{{ url('detail/'.$messages['property_id'])}}" class="btn btn-sm btn-label-brand btn-bold">View</a>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="row">
                                <div class="col-lg-12" id="message_content">
                                    <div class="kt-widget3">
                                        <div class="kt-widget3__item">
                                            <div class="kt-widget3__header">
                                                <div class="kt-widget3__info" style="padding-left:0">
                                                    <div href="#" class="kt-widget3__username kt-font-info">
                                                        {{ $messages['name']}}
                                                    </div>
                                                    <span class="kt-widget3__time">
                                                        {{ Carbon\Carbon::parse($messages['created_at'])->isoFormat('D-MM-YYYY HH:mm') }} {{ $messages['name'] == 'You' ? ($messages['readed_c'] == 1 ? ' - Seen' :  - 'Not Seen') : ''}}
                                                    </span>
                                                </div>
                                                <span class="kt-widget3__status kt-font-info">
                                                
                                                </span>
                                            </div>
                                            <div class="kt-widget3__body">
                                                <p class="kt-widget3__text text-dark">
                                                {{ Str::title($messages['text']) }}
                                                </p>
                                            </div>
                                        </div>
                                        @foreach($messages['messages'] as $item)
                                        <div class="kt-widget3__item" style=" {{ $item['name'] == 'You' ? 'text-align: right;':''}} ">
                                            <div class="kt-widget3__header"  style=" {{ $item['name'] == 'You' ? 'display: block;':''}} ">
                                                <div class="kt-widget3__info" style="padding-left:0">
                                                    <div href="#" class="kt-widget3__username {{ $item['name'] == 'You' ? 'kt-font-success' : 'kt-font-info'}}">
                                                        {{ $item['name'] == 'You' ? config('app.name') : $item['name']}}
                                                    </div>
                                                    <span class="kt-widget3__time">
                                                        {{ Carbon\Carbon::parse($item['created_at'])->isoFormat('D-MM-YYYY HH:mm') }}  {{ $item['name'] == 'You' ? ($item['readed_c'] == 1 ? ' - Seen' :  - 'Not Seen') : ''}}
                                                    </span>
                                                </div>
                                                <span class="kt-widget3__status kt-font-info">
                                                
                                                </span>
                                            </div>
                                            <div class="kt-widget3__body">
                                                <p class="kt-widget3__text text-dark">
                                                {{ Str::title($item['text']) }}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <form id="form">
                                        <div class="form-group">
                                            <label>Reply</label>
                                            <textarea name="reply"  aria-describedby="reply" class="form-control form-control-lg" cols="30" rows="5"></textarea>
                                        </div>
                                        
                                    </form>
                                    <div class="form-group">
                                        <button id="submit" onClick="handleMessage()" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        var message_id = {{ $message_id }};
        
        async function getMessage(data) {
            $('.kt-widget3').append('<div class="kt-widget3__item text-right" >'+
                '<div class="kt-widget3__header" style="display: block;">'+
                    '<div class="kt-widget3__info">'+
                        '<div href="#" class="kt-widget3__username kt-font-success">'+
                            data.name+
                        '</div>'+
                        '<span class="kt-widget3__time">'+
                            data.date+
                        '</span>'+
                    '</div>'+
                    '<span class="kt-widget3__status kt-font-info"></span>'+
                '</div>'+
                '<div class="kt-widget3__body">'+
                    '<p class="kt-widget3__text text-dark">'+
                    data.text+
                    '</p>'+
                '</div>'+
            '</div>');
            
             

        }
       

        async function handleMessage() {
            var reply = $('[name="reply"]').val();
            var CSRF_TOKEN = $('[name="_token"]').attr('value');
            var formData = new FormData(document.getElementById("form"));
            var object = {};
            formData.forEach((value, key) => object[key] = value);
            var json = JSON.stringify(object);

            if(reply != '') {
                $('#submit').attr('class','btn btn-primary kt-spinner kt-spinner--right kt-spinner--md kt-spinner--light disabled');
                $('#submit').attr('disabled',true);
                try {
                    const response = await fetch("{{ route('messages.update', $message_id) }}", {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": CSRF_TOKEN
                        },
                        body: json
                    });
                    if (response.ok) {
                        $('[name="reply"]').val('');
                        const data = await response.json();
                        await getMessage(data);
                        $('#submit').attr('class','btn btn-primary');
                        $('#submit').attr('disabled',false);
                    } 
                    //return response.json();
                } catch (error) {
                    console.error(error);
                    $('#submit').attr('class','btn btn-primary');
                    $('#submit').attr('disabled',false);
                }
            } else {
                alert('Please fill up all fields!');
            }
        }
    </script>
    @endpush                
</x-admin-layout>

<!-- Script loading  -->

