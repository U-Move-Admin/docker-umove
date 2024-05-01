@extends('layouts.frontend.template1')
@section('title','About '.config('app.name'))
@section('meta')
    <meta name="description" content="{{ config('app.name') }} has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants."/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ 'About '.config('app.name').' Estate Agents' }}" />
    <meta property="og:image" content="{{ asset(config('broker.logo')) }}">
    <meta property="og:description" content="{{ config('app.name') }} has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <!-- twitter -->
    <meta name="twitter:title" content="{{ 'About '.config('app.name').' Estate Agents' }}">  
    <meta name="twitter:description" content="{{ config('app.name') }} has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <meta name="twitter:image:src" content="{{ asset(config('broker.logo')) }}">  
    <!-- google -->
    <meta itemprop="name" content="{{ 'About '.config('app.name').' Estate Agents' }}">  
    <meta itemprop="description" content="{{ config('app.name') }} has come a long way from its beginnings in East London. Nowadays Umove is managing properties in an around London with the best interest of its investors and tenants.">  
    <meta itemprop="image" content="{{ asset(config('broker.logo')) }}">  
    <link rel="canonical" href="{{ url()->current() }}">    
@endsection
@section('content')
    @include('frontend.template1.elements.header2')
    @include('frontend.template1.elements.breadcrumb',['name'=>'About Us'])
    <div class="contact-2 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1>{{ $store['about_company_title'] }}</h1>
            </div>
    
            <div class="contact-info">
                <div class="row">
                    <div class="col-md-12 contact-info">
                        {!! $store['about_company'] !!} 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection