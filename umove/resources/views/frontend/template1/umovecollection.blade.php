@extends('layouts.frontend.template1')
@section('title', 'Properties For '.ucfirst($property_status).' | '.config('app.name'))
@section('meta') 
    <meta name="description" content="{{ 'Properties for '.$property_status.' in London through '.config('app.name').' Real Estate Agents. Houses, flats, apartments ,rooms or commercial properties for '.$property_status }}"/>
    <!-- facebook --> 
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="Properties For {{ ucfirst($property_status).' | '.config('app.name') }}" />
    <meta property="og:description" content="{{ 'Properties for '.$property_status.' in London through '.config('app.name').' Real Estate Agents. Houses, flats, apartments ,rooms or commercial properties for '.$property_status }}">  
    <meta property="og:image" content="{{ asset(config('broker.logo')) }}">
    
    <!-- twitter -->
    <meta name="twitter:title" content="Properties For {{ ucfirst($property_status).' | '.config('app.name') }}">  
    <meta name="twitter:description" content="{{ 'Properties for '.$property_status.' in London through '.config('app.name').' Real Estate Agents. Houses, flats, apartments ,rooms or commercial properties for '.$property_status }}">  
    <meta name="twitter:image:src" content="{{ asset(config('broker.logo')) }}">  
    
    <!-- google -->
    <meta itemprop="name" content="Properties For {{ ucfirst($property_status).' | '.config('app.name') }}">  
    <meta itemprop="description" content="{{ 'Properties for '.$property_status.' in London through '.config('app.name').' Real Estate Agents. Houses, flats, apartments ,rooms or commercial properties for '.$property_status }}">  
    <meta itemprop="image" content="{{ asset(config('broker.logo')) }}"> 
    
    <link rel="canonical" href="{{ url()->current() }}">    
@endsection
@section('content')
    @include('frontend.template1.elements.header2')
    <div class="properties-list-rightside content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="option-bar d-xl-block d-lg-block d-md-block d-sm-block ">
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-6 col-sm-5">
                                <h4>
                                    <span class="heading-icon">
                                        <i class="fa fa-caret-right icon-design"></i>
                                        <i class="fa fa-th-{{ Request::get('list') == 'grid' ? 'large' : 'list' }}"></i>
                                    </span>
                                    <span class="heading">Properties For {{ ucfirst($property_status) }}</span>
                                </h4>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-7">
                                <div class="sorting-options clearfix">
                                    <a href="" onclick="return listingType(this,'list')" class="change-view-btn {{ Request::get('list') == null ? 'active-view-btn' : '' }}"><i class="fa fa-th-list"></i></a>
                                    <a href="" onclick="return listingType(this,'grid')" class="change-view-btn {{ Request::get('list') == 'grid' ? 'active-view-btn' : '' }}"><i class="fa fa-th-large"></i></a>
                                </div>
                                <div class="search-area">
                                    <select class="selectpicker search-fields" name="location" onchange="sortOrder(this.value)">
                                        <option value="">Sort by</option>
                                        <option value="price-desc" {{ Request::get('sort') == 'price-desc' ? 'selected' : '' }}>Price - High to Low</option>
                                        <option value="price-asc" {{ Request::get('sort') == 'price-asc' ? 'selected' : '' }}>Price Low to High</option>
                                        <option value="created_at-desc" {{ Request::get('sort') == 'created_at-desc' ? 'selected' : '' }}>Date - New to Old</option>
                                        <option value="created_at-asc" {{ Request::get('sort') == 'created_at-asc' ? 'selected' : '' }}>Date - Old to New</option>    
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subtitle">
                        {{$properties->total()}} Properties
                    </div>
                    <div class="row d-block d-sm-none">
                        <div class="col-lg-12">
                            <a class="btn btn-theme btn-block mb-30" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Filter
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <div id="collapseExample" class="collapse sidebar mbl">
                            <!-- @include('frontend.template1.elements.categories') -->
                            @include('frontend.template1.elements.search_listing', ['data' => $data])
                            </div>
                        </div>
                    </div>
                    @if (Request::get('list') == 'grid')
                        <div class="row">
                            @if (isset($properties) && $properties->total() > 0)
                                @include('frontend.template1.elements.grid_data',['emlaks'=>$properties,'class'=>'col-lg-6 col-md-6 col-sm-12'])
                            @else
                                <div class="col-lg-12">
                                    <div align="center" class="alert bg-white option-bar" style="padding:50px 0;height:inherit">
                                        <span style="font-weight:bold;">There is no any record!</span>
                                    </div>
                                </div>
                            @endif
                            @if ($properties->total() > 14)
                            <div class="row pagination-box hidden-mb-45">
                                <div class="col-sm-4">
                                    Total {{$properties->total()}} properties. View : {{$properties->firstItem() .' - '.$emlaks->lastItem()}}
                                </div>
                                <div class="col-sm-8">
                                    <div class="pagination-box hidden-mb-45 float-right">
                                        <nav>
                                            {{ $properties->links('vendor.pagination.default') }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    @else
                    @if (isset($properties) && $properties->total() > 0)
                            @include('frontend.template1.elements.listing_data',['emlaks'=>$properties,'col1'=>'col-lg-5 col-md-5 col-pad','col2'=>'col-lg-7 col-md-7 align-self-center col-pad'])
                        @else
                            <div align="center" class="alert bg-white option-bar" style="padding:50px 0;height:inherit">
                                <span style="font-weight:bold;">Sorry, There is no any record !</span>
                            </div>
                        @endif
                        @if ($properties->total() > 14)
                            <div class="row pagination-box hidden-mb-45">
                                <div class="col-sm-4">
                                    Total {{$properties->total()}} properties. View : {{$properties->firstItem() .' - '.$properties->lastItem()}}
                                </div>
                                <div class="col-sm-8">
                                    <div class="pagination-box hidden-mb-45 float-right">
                                        <nav>
                                            {{ $properties->links('vendor.pagination.default') }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar mbl d-none d-xl-block d-lg-block d-md-block d-sm-block">
                        <!-- @include('frontend.template1.elements.categories') -->
                        @include('frontend.template1.elements.search_listing', ['data' => $data])
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection