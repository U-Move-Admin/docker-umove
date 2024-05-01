@extends('layouts.frontend.template1')
@section('title','Contact | '.config('app.name') )
@section('title',config('app.name').': Contact our estate agency office in London')
@section('meta')
    <meta name="description" content="{{ config('broker.contact_desc').' | '.config('app.name') }}"/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ config('app.name').': Contact our estate agency office in London' }}" />
    <meta property="og:description" content="{{ config('broker.contact_desc').' | '.config('app.name') }}">  
    <meta property="og:image" content="{{ asset(config('broker.logo')) }}">
    
    <!-- twitter -->
    <meta name="twitter:title" content="{{ config('app.name').': Contact our estate agency office in London' }}">  
    <meta name="twitter:description" content="{{ config('broker.contact_desc').' | '.config('app.name') }}">  
    <meta name="twitter:image:src" content="{{ asset(config('broker.logo')) }}">  
    
    <!-- google -->
    <meta itemprop="name" content="{{ config('app.name').': Contact our estate agency office in London' }}">  
    <meta itemprop="description" content="{{ config('broker.contact_desc').' | '.config('app.name') }}">  
    <meta itemprop="image" content="{{ asset(config('broker.logo')) }}"> 
    
    <link rel="canonical" href="{{ url()->current() }}">    
@endsection
@section('content')
    @include('frontend.template1.elements.header2')
    @include('frontend.template1.elements.breadcrumb',['name'=>'Contact'])
    <div class="contact-2 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1>Contact Us</h1>
            </div>
            <div class="contact-info ">
                <div class="row">
                    <div class="col-md-4 col-sm-6 contact-info">
                        <i class="fa fa-map-marker"></i>
                        <p>{{ $store['store_name'] }}</p>
                        <strong>{{ $store['address'] }}, {{ $store['postcode'] }}, {{ $store['city'] }}, {{ $store['country'] }}</strong>
                    </div>
                    <div class="col-md-4 col-sm-6 contact-info">
                        <i class="fa fa-phone"></i>
                        <p>Phone Number</p>
                        <strong> {{ $store['tel'] == null ? "we'll update the best number soon!" : $store['tel'] }}</strong>
                    </div>
                    <div class="col-md-4 col-sm-6 contact-info">
                        <i class="fa fa-envelope"></i>
                        <p>E-mail</p>
                        <strong>{{ $store['email'] }}</strong>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
                <div class="notification-box mb-30">
                    <h3>Your message has been sent successfully</h3>
                </div>
            @endif
            <form action="{{ asset('/contact') }}" method="post" id="contact" class="search-area search_home_form needs-validation" novalidate>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group service">
                            <select class="selectpicker search-fields" name="service" id="service">
                                <option value="">Services interested in  </option>
                                <option {{old('service') == 'Property Evaluation' ? 'selected' : ''}} value="Property Evaluation">Property Evaluation</option>
                                <option {{old('service') == 'Buy' ? 'selected' : ''}} value="Buy">Buy</option>
                                <option {{old('service') == 'Rent' ? 'selected' : ''}} value="Rent">Rent</option>
                                <option {{old('service') == 'Investments' ? 'selected' : ''}} value="Investments">Investments</option>
                            </select>
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            @if($errors->has('service'))
                                {{ $errors->first('service') }}    
                            @endif
                        </div>
                        <div class="form-group name">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}" required>
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            @if($errors->has('name'))
                                {{ $errors->first('name') }}    
                            @endif
                        </div>
    
                        <div class="form-group email">
                            <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{old('email')}}" required>
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            @if($errors->has('name'))
                                {{ $errors->first('name') }}    
                            @endif
                        </div>
                        <div class="form-group number">
                            <input type="text" name="phone" class="form-control" placeholder="Phone" required value="{{old('phone')}}" >
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            @if($errors->has('phone'))
                                {{ $errors->first('phone') }}    
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group message">
                            <textarea rows="3" class="form-control" name="message" placeholder="Message" required>{{old('message')}}</textarea>
                            <div class="invalid-feedback">
                            Required field
                            </div>
                            @if($errors->has('message'))
                                {{ $errors->first('message') }}    
                            @endif
                        </div>
                    </div>
                    <div id="html_element" class="col-lg-6">
                    </div>
                    <div class="col-lg-12">
                        <br>
                        <div class="send-btn text-center">
                            <button id="submit-contact" type="submit" class="btn btn-color btn-md">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="section">
        <div class="map">
            <div id="map"></div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet">
@endsection
@section('script')
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <script>
        var widgetId2;
        var onloadCallback = function() {
            widgetId2 = grecaptcha.render('html_element', {
                'sitekey' : '6LfQQ5ghAAAAAGjgUz0hwCjZ6qVxiiqOdj0FUL69',
            });
        };

    </script>
    <script>
        // TO MAKE THE MAP APPEAR YOU MUST
        // ADD YOUR ACCESS TOKEN FROM
        // https://account.mapbox.com
        var defaultLat = {{ $store['lat'] }};
        var defaultLng = {{ $store['lng'] }};
                
        mapboxgl.accessToken = "{{ env('APP_ENV') == 'dev' ? env('MAPBOX_API_PUBLIC') : env('MAPBOX_API') }}";
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [defaultLng, defaultLat],
            zoom: {{ $store['zoom'] }},
            scrollZoom: false
        });
        
        // Create a default Marker and add it to the map.
        const marker1 = new mapboxgl.Marker()
        .setLngLat([defaultLng, defaultLat])
        .setPopup(new mapboxgl.Popup().setHTML(
            "<div class='map-properties contact-map-content'>" +
            "<div class='map-content' >" +
            "<img align='center' width='70' src='{{ url($logo) }}' alt='Umove'>"+
            "<p class='address'> </p>" +
            "<ul class='map-properties-list'> " +
            //"<li><i class='fa fa-phone'></i>  0 (xxx) xxxx </li> " +
            "<li><i class='fa fa-envelope'></i>  {{ $store['email'] }} </li> " +
            "</ul>" +
            "</div>" +
            "</div>"
        ))
        .addTo(map);
        
        marker1.togglePopup();
        
        
        
        </script>
@endsection