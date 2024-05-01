@if (count($categories) > 0)
    <div class="widget categories">
        <h5 class="sidebar-title">Categories</h5>
        <ul>
            @foreach ($categories as $item)
            <li><a href="{{url('/'.$item->for_sale.'-'.$item->property_type)}}">{{ config('home.satilik.'.$item['for_sale']) }} {{ config('home.emlak_tip.'.$item['property_type']) }}<span>({{$item->count}})</span></a></li> 
            @endforeach
        </ul>
    </div>   
@endif