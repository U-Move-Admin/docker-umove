@extends('layouts.frontend.template1')
@php
$title = 'For '.Str::title($property['property_status']).' '.config('home.property_type'.($property['property_status'] == 'buy' ? '_for_sale.' : ($property['advert_type'] == 'room_only' ? '_for_room.' : '.')).$property['property_type']) .' '. ($property->view_property->view_address ? $property->address.', ' : '').($property->view_property->view_city ? $property->city : '');
@endphp
@section('title', $title.' - '.config('app.name'))
@section('meta')
    <link rel="canonical" href="{{ url()->current() }}">    
@endsection
@section('content')
    @include('frontend.template1.elements.header2')
    @php 
    if(!empty($property->extra_features)) {
        $property->extra_features = explode(",",$property->extra_features);
    }
    @endphp
    <div class="properties-details-page content-area-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12 slider" >
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-60">
                        <div class="heading-properties">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3> <span><i class="flaticon-bed"></i> {{$property->bedroom}} Beds</span> <span><i class="flaticon-bath"></i> {{$property->bathroom}} Bathrooms</span> </h3>
                                        <p><i class="fa fa-map-marker"></i> {{ $property->view_property->view_address ? $property->address.', ' : '' }}{{ $property->view_property->view_city ? $property->city : '' }} {{ $property->view_property->view_postcode ? $property->postcode : '' }} </p>
                                    </div>
                                    <div class="p-r">
                                        <h3>£{!! $property->price !!} / {{ Str::title($property['property_status']) }} </h3>
                                        @if(!empty($property->weekly_price)) <p> <strong>Weekly :</strong> £{{ $property->weekly_price }}</p> @endif
                                        <p id="review" onClick="giveRating()">
                                            {!! number_format($reviews,1) !!} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main slider carousel items -->
                        @if(count($property->images) > 0)
                            <a  href="javascript:void(0)" onclick="bigPhoto()" style="position:absolute;top: 117px;z-index: 1;background: rgba(68, 68, 68, 0.6);color: #fff;right: 10px;padding: 5px;border-radius: 50%;"><i class="fa fa-search-plus"></i></a>
                            <a class="saveLink" href="javascript:void(0)" onclick="saveProperty()" >
                                <i class="fa fa-heart{{ $saved ? null : '-o' }}"></i>
                            </a>
                            
                            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:800px;height:600px;overflow:hidden;visibility:hidden;">
                                
                                <!-- Loading Screen -->
                                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/frontend/templates/img/jssor/spin.svg" />
                                </div>
                                <div id="slides" data-u="slides" u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:800px;height:500px;overflow:hidden;">
                                    @foreach($property->images as $k => $image)
                                        <div>   
                                            <img data-u="image" src="{{ asset('/img/uploads/'.$property['id'].'/big/'.$image->image_name) }}"  alt="{{$image->image_name}}" style="width:100%" /> 
                                            <img data-u="thumb" src="{{ asset('/img/uploads/'.$property['id'].'/sm/'.$image->image_name) }}"  alt="{{$image->image_name}}" style="width:100%">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Thumbnail Navigator -->
                                <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:800px;height:120px;background-color:#fff;" data-autocenter="1" data-scale-bottom="0.75">
                                    <div data-u="slides">
                                        <div data-u="prototype" class="p" style="width:155px;height:110px;">
                                            <div data-u="thumbnailtemplate" class="t"></div>
                                            <svg viewbox="0 0 16000 16000" class="cv">
                                                <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                                <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                                <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Arrow Navigator -->
                                <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:220px;left:30px;" data-scale="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                        <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                                        <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                                    </svg>
                                </div>
                                <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:220px;right:30px;" data-scale="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                        <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                                        <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                                    </svg>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- Property details start -->
                    @if(!empty($property['description']))
                    <div class="property-description mb-5">
                        <h3 class="heading">Description</h3>
                        {!! $property['description'] !!}
                    </div>
                    @endif
                    
                    @if(!empty($property['lat']) && !empty($property['lng']) && $property->view_property->view_location)
                    <div class="map mb-5" style="height: 500px;">
                        <div id="map" style="height: 400px;"></div>
                    </div>
                    @endif

                    <div class="property-details mb-5">
                        <h3 class="heading">Property Details</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <strong>Property Type:</strong> {{ $property_type_name }}
                                    </li>
                                    @if($property['advert_type'] == 'commercial' && $property['view_property']['view_sq_ft'])
                                    <li><span><i class="flaticon-square-layouting-with-black-square-in-east-area"></i> {{$property['sq_ft']}} sq ft</span></li>
                                    @endif
                                    @if($property->view_property->view_furnished)
                                    <li>
                                        <strong>Furnished:</strong>{{ config('home.furnished.'.$property->furnished) }}
                                    </li>
                                    @endif
                                    @if($property->view_property->view_show_date && !empty($property->show_date))
                                    <li>
                                        <strong>Earliest Move In Date :</strong> {{ Carbon\Carbon::createFromFormat('Y-m-d', $property['show_date'])->format('d M Y') }}
                                    </li>
                                    @endif
                                    @if($property->view_property->view_min_tenancy_length && !empty($property->min_tenancy_length))
                                    <li>
                                        <strong>Minimum Tenancy Length:</strong> {{ $property->min_tenancy_length }}
                                    </li>
                                    @endif
                                    @if($property->view_property->view_min_tenancy_length && !empty($property->min_tenancy_length))
                                    <li>
                                        <strong>Minimum Tenancy Length:</strong> {{ $property->min_tenancy_length }}
                                    </li>
                                    @endif
                                    @if($property->view_property->view_max_tenancy_length && !empty($property->max_tenancy_length))
                                    <li>
                                        <strong>Maximum Tenancy Length:</strong> {{ $property->max_tenancy_length }}
                                    </li>
                                    @endif
                                    @if($property->view_property->view_number_tenant && !empty($property->number_tenant))
                                    <li>
                                        <strong>Maximum Tenancy Length:</strong> {{ $property->number_tenant }}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    @if($property->property_status == 'rent' || $property->property_status == 'to-let')
                                    @if($property->view_property->view_price && !empty($property->price))
                                    <li>
                                        <strong>Monthly Price :</strong> {{ $property->price }}
                                    </li>
                                    @endif
                                    @if($property->view_property->view_weekly_price && !empty($property->weekly_price))
                                    <li>
                                        <strong>Weekly Price :</strong> {{ $property->weekly_price }}
                                    </li>
                                    @endif
                                    @if($property->view_property->view_deposit && !empty($property->deposit))
                                    <li>
                                        <strong>Deposit :</strong> {{ $property->deposit }}
                                    </li>
                                    @endif
                                    
                                    @endif
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="amenities-box mb-5">
                        <h3 class="heading">Features</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    @if($property->property_status == 'rent' || $property->property_status == 'to-let')
                                    @if($property->view_property->view_bill) {!! ($property->bill ? '<li><span> <i class="flaticon-draw-check-mark"></i> Bills included: Yes</span></li>' : '<li><span> <i>X</i> Bills included: No</span></li>')  !!} @endif
                                    @if($property->view_property->view_garden) {!! ($property->garden ? '<li><span> <i class="flaticon-draw-check-mark"></i> Garden Access: Yes</span></li>' : '<li><span> <i>X</i> Garden Access: No</span></li>')  !!} @endif
                                    @endif
                                    @if($property->view_property->view_new_build) {!! ($property->new_build ? '<li><span> <i class="">X</i> New Build: Yes </span></li>' : '<li><span> <i>X</i> New Build: No </span></li>')  !!} @endif
                                    @if($property->view_property->view_underfloor_heating ) {!! ($property->underfloor_heating ? '<li><span> <i class="flaticon-draw-check-mark"></i> Underfloor Heating:  Yes</span></li>' : '<li><span> <i>X</i> Underfloor Heating:  No</span></li>') !!} @endif
                                    @if($property->view_property->view_kitchen_diner) {!!  ($property->kitchen_diner ? '<li><span> <i class="flaticon-draw-check-mark"></i> Kitchen Diner: Yes</span></li>' : '<li><span> <i>X</i> Kitchen Diner: No</span></li>') !!}@endif
                                    @if($property->view_property->view_large_lounge) {!!  ($property->large_lounge ? '<li><span> <i class="flaticon-draw-check-mark"></i> Large Lounge: Yes </span></li>' : '<li><span> <i>X</i> Large Lounge: No </span></li>') !!} @endif
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    @if($property->property_status == 'rent' || $property->property_status == 'to-let')
                                    @if($property->view_property->view_parking) {!! ($property->parking ? '<li><span> <i class="flaticon-draw-check-mark"></i> Parking: Yes </span></li>' : '<li><span> <i>X</i> Parking: No </span></li>') !!} @endif
                                    @if($property->view_property->view_fireplace) {!! ($property->fireplace ? '<li><span> <i class="flaticon-draw-check-mark"></i> Fireplace: Yes </span></li>' : '<li><span> <i>X</i> Fireplace:: No </span></li>') !!} @endif
                                    @endif
                                    @if($property->view_property->view_private_residents_lounge)  {!! ($property->private_residents_lounge ? '<li><span> <i class="flaticon-draw-check-mark"></i> Private Residents Lounge: Yes </span></li>' : '<li><span> <i>X</i> Private Residents Lounge: No </span></li>') !!}</span></li>@endif
                                    @if($property->view_property->view_private_residents_terrace_garden) {!! ($property->private_residents_terrace_garden ? ' <li><span> <i class="flaticon-draw-check-mark"></i> Private Residents Terrace Garden: Yes </span></li>' : ' <li><span> <i>X</i> Private Residents Terrace Garden: No </span></li>') !!}@endif
                                    @if($property->view_property->view_recently_renovated_throughout) {!!  ($property->recently_renovated_throughout ? '<li><span> <i class="flaticon-draw-check-mark"></i> Recently Renovated Throughout: Yes </span></li>' : '<li><span> <i>X</i> Recently Renovated Throughout: No </span></li>')  !!} @endif
                                    @if($property->view_property->view_five_double_bedrooms) {!!  ($property->five_double_bedrooms ? '<li><span> <i class="flaticon-draw-check-mark"></i> Five Double Bedrooms: Yes </span></li>' : '<li><span> <i>X</i> Five Double Bedrooms: No </span></li>') !!} @endif
                                </ul>
                            </div>
                            
                        </div>
                        @if(!empty($property->extra_features)) 
                        <ul class="row">
                            @foreach($property->extra_features as $i => $item)
                            <div class="col-6"><i class="flaticon-draw-check-mark"></i> {{ $item }}  </div>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    
                    @if($property->property_status == 'rent' || $property->property_status == 'to-let')
                    <div class="features-opions af mb-45">
                        <h3 class="heading-3">Tenant Preferences</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                    @if($property->view_property->view_student_allowed) {!! ($property->student_allowed ? '<li><span> <i class="flaticon-draw-check-mark"></i> Student Allowed: Yes</span></li>' : '<li><span> <i>X</i> Student Allowed: No</span></li>') !!} @endif
                                    @if($property->view_property->view_pets_allowed){!! ($property->pets_allowed ? '<li><span> <i class="flaticon-draw-check-mark"></i> Pets Allowed: Yes</span></li>' : '<li><span> <i>X</i> Pets Allowed: No</span></li>') !!} @endif
                                    @if($property->view_property->view_smokers_allowed){!! ($property->smokers_allowed ? '<li><span> <i class="flaticon-draw-check-mark"></i> Smokers Allowed: Yes</span></li>' : '<li><span> <i>X</i> Smokers Allowed: No</span></li>') !!} @endif
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <ul>
                                @if($property->view_property->view_families_allowed) {!! ($property->families_allowed ? '<li><span> <i class="flaticon-draw-check-mark"></i> Families Allowed: Yes</span></li>' : '<li><span> <i>X</i> Families Allowed: No</span></li>') !!} @endif
                                @if($property->view_property->view_DSS_income_accepted) {!! ($property->DSS_income_accepted ? '<li><span> <i class="flaticon-draw-check-mark"></i> DSS Income Accepted: Yes</span></li>' : '<li><span> <i>X</i> DSS Income Accepted: No</span></li>') !!} @endif
                                @if($property->view_property->view_students_only) {!! ($property->students_only ? '<li><span> <i class="flaticon-draw-check-mark"></i> Students Only: Yes</span></li>' :  '<li><span> <i>X</i> Students Only: No</span></li>') !!} @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar mbl">
                        @include('frontend.template1.elements.detail_contact_form')
                        <!-- Social list start -->
                        <div class="social-list widget clearfix" style="border-top: 1px solid #ddd;">
                            <h5 class="sidebar-title">Share</h5>
                            <ul>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="facebook-bg" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/home?status={{ url()->current() }}" target="_blank" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{$title}}"  target="_blank" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                <li class="hidden-xs"><a href="https://web.whatsapp.com/send?text={{ url()->current() }}" class="whatsapp-bg" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        @if($property->property_status == 'for-sale' || $property->property_status == 'buy')
                        @include('frontend.template1.elements.mortgage')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
    <div class="modal fade in" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"></div>
    <div class="modal fade in" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel">
        <div class="modal-dialog modal-xs" role="document" style="width:100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rate This Property</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#reviewModal').modal('hide');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" aling="center" >
                    <div class="card">
                        <div class="card-body text-center"> 
                        <span class="myratings"> - </span>
                        <fieldset class="rating" aling="center">
                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            <input type="radio" class="reset-option" name="rating" value="reset" />
                        </fieldset>
                        </div>
                        <div class="card-footer">
                            <div id="error"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-primary" onClick="saveRating()" value="Save">  </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/frontend/templates/css/quill-emoji.css') }}">
    @if($reviews != null)
    <style>
        .fa-star:nth-child(-n+{{intval($reviews)}}) { 
            color: #ffc12b 
        }
    </style>
    @endif

    <style>
        .saveLink {
            position:absolute;
            top: 117px;
            z-index: 1;
            background: rgba(250, 250, 250, 0.6);
            color: #444;
            font-size: 25px;
            left: 10px;
            padding: 10px 15px;
            padding-bottom: 8px;
            border-radius: 50%;
        }
        .saveLink:hover .fa-heart-o:before {
            content: "\f004";
        }
        .saveLink:hover .fa-heart:before {
            content: "\f08a";
        }
        
        
        .p-r i {
            color: #DDD;
        }
       
        #map {
            height: 500px !important;
        }
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider arrow skin 106 css*/
        .jssora106 {display:block;position:absolute;cursor:pointer;}
        .jssora106 .c {fill:#fff;opacity:.3;}
        .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
        .jssora106:hover .c {opacity:.5;}
        .jssora106:hover .a {opacity:.8;}
        .jssora106.jssora106dn .c {opacity:.2;}
        .jssora106.jssora106dn .a {opacity:1;}
        .jssora106.jssora106ds {opacity:.3;pointer-events:none;}

        /*jssor slider thumbnail skin 101 css*/
        .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
        .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;border:2px solid #000;box-sizing:border-box;z-index:1;}
        .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
        .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
        .jssort101 .p:hover{padding:2px;}
        .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
        .jssort101 .p:hover.pdn{padding:0;}
        .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
        .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
        .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
        .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
        .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}

        
        .rating { 
            border: none;
            width: 225px;
            margin: auto;
        }
        .myratings{
            font-size: 85px;
            color: green;
        }

        .rating > [id^="star"] { display: none; } 
        .rating > label:before { 
            margin: 5px;
            font-size: 2.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before { 
            content: "\f089";
            position: absolute;
        }

        .rating > label { 
            color: #ddd; 
            float: right; 
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating > [id^="star"]:checked ~ label, /* show gold star when clicked */
        .rating:not(:checked) > label:hover, /* hover current star */
        .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

        .rating > [id^="star"]:checked + label:hover, /* hover current star when changing rating */
        .rating > [id^="star"]:checked ~ label:hover,
        .rating > label:hover ~ [id^="star"]:checked ~ label, /* lighten current selection */
        .rating > [id^="star"]:checked ~ label:hover ~ label { color: #FFED85;  }

        .reset-option {
        display: none;
        }

        .reset-button {
        margin: 6px 12px;
        background-color: rgb(255, 255, 255);
        text-transform: uppercase;
        }
    </style>
@endsection

@section('script')
<script src="{{ asset('/frontend/templates/js/jssor.slider.min.js') }}"></script>
<script>
    function login() {
        $.ajax({
            beforeSend: function(){
                //$("body").append('<div id="modalLoad" class="modal-backdrop in"><div class="modLoading"></div></div>');
            },
            complete: function(){
                //$("#modalLoad").remove();
            },
            type:"GET",url:"{{ url('quick-login')}}",cache:false,success:function(html)
                {
                $("#loginModal").html(html);
                $('#loginModal').modal({
                //backdrop :'static'
                });

            }
        })
    }
    function giveRating() {
        @auth
            @if(Auth::user()->getRoleNames()->count() == 0)
                @if($my_review)
                    var point = ("{{ $my_review }}".replace('.5', 'half')).replace('0','');
                    $("input#star"+point+"[type='radio']").attr('checked', true);
                    var sim =  {{ $my_review }};
                    if (sim<3) {
                        $('.myratings').css('color','red'); 
                        $(".myratings").text(sim);
                    }else{
                        $('.myratings').css('color','green');
                        $(".myratings").text(sim);
                    }
                @endif
                $('#reviewModal').modal('show');
            @else
                alert('Sorry! Admin can`t give a review.');
            @endif
        @else
            login();
        @endauth
    }

    async function saveRating () {
        var rating = $("input[type='radio']:checked").val();
        var property_id = {{ $property->id }};
        var CSRF_TOKEN = $('[name="_token"]').attr('value');
        
        if(rating != undefined) {
            $(this,'button').prop('disabled',true);
            try {
                const response = await fetch("{{ route('give-rate') }}", {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": CSRF_TOKEN
                    },
                    body: JSON.stringify({"rating": rating,"property_id": property_id})
                    
                });
                console.log(response)
                if (!response.ok) {
                    const errorMessage = await response.text();
                    throw new Error(errorMessage);
                    $('#reviewModal #error').html('<div class="alert alert-danger">Upps! There is an error! Please try again</div>');
                    setTimeout(() => {
                        $('#reviewModal #error').html('');
                    }, 2000);
                } else {
                    $('#reviewModal #error').html('<div class="alert alert-success">Your rating has been saved.</div>');
                    document.getElementById("contact_form").reset()
                    setTimeout(() => {
                        $('#reviewModal #error').html('');
                    }, 2000);
                    
                }
                //return response.json();
            } catch (error) {
                console.error(error);
            }
            $(this,'button').prop('disabled',false);
        } else {
            alert('Please give your rate!');
        }
    }

    async function saveProperty() {
        @auth
            @if(Auth::user()->getRoleNames()->count() == 0)
                var property_id = {{ $property->id }};
                var CSRF_TOKEN = $('[name="_token"]').attr('value');
                var saved = $('.saveLink i').attr('class') == 'fa fa-heart-o' ? 'fa-heart' : 'fa-heart-o';
                try {
                    const response = await fetch("{{ route('saved') }}", {
                        method: "post",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": CSRF_TOKEN
                        },
                        body: JSON.stringify({"property_id": property_id})
                        
                    });
                    if (!response.ok) {
                        const errorMessage = await response.text();
                        throw new Error(errorMessage);
                    } else {
                        $('.saveLink').html('<i class="fa '+saved+'"></i>')
                    }
                    
                } catch (error) {
                    console.error(error);
                }
            @else
                alert('Sorry! Only for customers.');
            @endif
        @else
            login();
        @endauth
    }

    $(document).ready(function(){

        $("input[type='radio']").click(function(){
            var sim =  $("input[type='radio']:checked").val();
            //alert(sim);
            if (sim<3) {
                $('.myratings').css('color','red'); 
                $(".myratings").text(sim);
            }else{
                $('.myratings').css('color','green');
                $(".myratings").text(sim);
            }
        });
    });
</script>
@if(!empty($property['lat']) && !empty($property['lng']) && $property->view_property->view_location)
<script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
<script>
    
    // TO MAKE THE MAP APPEAR YOU MUST
    // ADD YOUR ACCESS TOKEN FROM
    // https://account.mapbox.com
    var defaultLat = {{ $property->lat }};
    var defaultLng = {{ $property->lng }};
            
    mapboxgl.accessToken = "{{ env('APP_ENV') == 'dev' ? env('MAPBOX_API_PUBLIC') : env('MAPBOX_API') }}";
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [defaultLng, defaultLat],
        zoom: 16,
        scrollZoom: false,
        
    });
    map.on('load', function () {
        map.resize();
    });
    
    // Create a default Marker and add it to the map.
    const marker1 = new mapboxgl.Marker()
    .setLngLat([defaultLng, defaultLat])
    // .setPopup(new mapboxgl.Popup().setHTML(
    //     "<div class='map-properties contact-map-content'>" +
    //     "<div class='map-content' >" +
    //     "<img align='center' width='70' src='{{ url('/img/logo-2.png') }}' alt='Umove'>"+
    //     "<p class='address'> </p>" +
    //     "<ul class='map-properties-list'> " +
    //     //"<li><i class='fa fa-phone'></i>  0 (xxx) xxxx </li> " +
    //     "<li><i class='fa fa-envelope'></i>  info@umove.london </li> " +
    //     "</ul>" +
    //     "</div>" +
    //     "</div>"
    // ))
    .addTo(map);
    
    //marker1.togglePopup();
    
    </script>
    @endif
<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var jssor_1_SlideshowTransitions = [
          {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
        ];

        var jssor_1_options = {
          $AutoPlay: 1,
          $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
          },
          $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $SpacingX: 5,
            $SpacingY: 5
          }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 800;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    });
    function bigPhoto(){
        $.ajax(
            {
                beforeSend: function(){
                    //$("body").append('<div id="modalLoad" class="modal-backdrop in"><div class="modLoading"></div></div>');
                },
                complete: function(){
                    //$("#modalLoad").remove();
                },
                type:"GET",url:'{{ url("/big-photo/".$property->id)}}',cache:false,success:function(html)
                    {
                    $("#myModal").html(html);
                    $('#myModal').modal({
                    //backdrop :'static'
                    });
                }
            })

    }
</script>
@endsection
