@foreach ($emlaks as $key => $emlak)
<div class="property-box-5">
    <div class="row">
        <div class="{{$col1}} ">
            <div class="property-thumbnail">
                <a href="{{ asset('/detail/'. $emlak['furl']) }}" class="property-img">
                    <div class="price-ratings-box">
                        <p class="price">
                            £{!! $emlak['price'] !!}
                            @if(!empty($emlak->rental_type) && $emlak->property_status === 'rent')
                            /<small>{{ $emlak->price_type }}</small>
                            @endif
                        </p>
                    </div>
                    <img src="{{ !empty($emlak['images'][0]['image_name'])  ? asset('/img/uploads/'.$emlak['id'].'/'.$emlak['images'][0]['image_name']) : asset('/frontend/templates/img/noimage.png') }}" alt="{{$emlak->title}}" class="img-fluid" />
                </a>
                <div class="property-overlay">
                    <a href="{{ asset('/detail/'. $emlak['furl']) }}" class="overlay-link">
                        <i class="fa fa-link"></i>
                    </a>
                    <!--
                    <a class="overlay-link property-video" title="Test Title">
                        <i class="fa fa-video-camera"></i>
                    </a>
                    -->
                   @if($emlak['isphoto'] && count($emlak['images']) > 0 )
                        <div class="property-magnify-gallery">
                            @foreach($emlak['images'] as $k => $image)
                                @if($k == 0)
                                    <a href="{{ asset('/img/uploads/'.$emlak->id.'/'.$image['name']) }}" class="overlay-link">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                @else
                                    <a href="{{ asset('img/uploads/'.$emlak->id.'/'.$image['name']) }}" class="hidden"></a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="{{$col2}} ">
            <div class="detail">
                <!-- title -->
                <h1 class="title">
                    <a href="{{ asset('/detail/'. $emlak['furl']) }}">
                        {{ ucfirst($emlak['bedroom']) }} Bedroom,  {{ ucfirst($emlak['bathroom']) }} Bath, {{ ucfirst($emlak['property_status']) }} Property
                    </a>
                </h1>
                <!-- Location -->
                <div class="location">
                    <a href="{{ asset('/detail/'. $emlak['furl']) }}">
                        <i class="fa fa-map-marker"></i>{{ ucfirst($emlak->city) . ' - '. ucfirst($emlak->address) }}
                    </a>
                </div>
                <!-- Paragraph -->
                <p>
                    {{ $emlak->title  }}
                </p>
                <ul class="facilities-list clearfix">
                    {!! (!empty($emlak->bedroom))?'<li><i class="flaticon-bed"></i> '.$emlak->bedroom.' Bedroom </li>':'' !!}
                    {!! (!empty($emlak->bath))?'<li><i class="flaticon-bath"></i> '.$emlak->bathroom.' Bath </li>':'' !!}
                    
                </ul>
              
            </div>
        </div>
    </div>
</div>
@endforeach