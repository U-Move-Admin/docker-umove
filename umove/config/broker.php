<?php 
if($_SERVER['HTTP_HOST'] == 'agent.janansoft.co.uk'){
    $array = [
        'name' => 'Umove',
        'img_path' => '/properties/',
        'url' => 'https://agent.janansoft.co.uk',
        'google_api' => '',
        'home_title'=>'For Buy and Rent Properties',
        'home_desc'=>'Properties for Sale, Short & Long Let as house, flat, apartment ,room and commercial properties in London',
        'consultant_title'=>'Agents',
        'consultant_desc'=>'Agent',
        'consultants_title'=>'Our Agents',
        'consultants_desc'=>'Our Agents',
        'contact_desc'=>'Contact Information',
        'search_title'=>'Search Properties',
        'search_desc'=>'Properties, for rent, sell, buy house, flat, room and commercial',
        
    ];
}else{
    $array = [
        'name' => 'Umove',
        'img_path' => '/properties/',
        'logo' => 'img/logo-3.png',
        'url' => 'localhost:8088',
        'google_api' => '',
        'home_title'=>'For Buy and Rent Properties',
        'home_desc'=>'Properties for Sale, Short & Long Let as house, flat, apartment ,room and commercial properties in London',
        'consultant_title'=>'Agents - ',
        'consultant_desc'=>'Agent',
        'consultants_title'=>'Our Agents',
        'consultants_desc'=>'Our Agents',
        'contact_desc'=>'Best property services in London, with an emphasis on quality, research and improvements. Sales or long and short term rental properties, new homes, serviced apartments, management and more.',
        'search_title'=>'Search Properties',
        'search_desc'=>'Properties, for rent, sell, buy house, flat, room and commercial',
    ];
}
return $array;