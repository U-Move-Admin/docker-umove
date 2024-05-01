
<div class="search-area" id="search-area-1">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                <form id="search_home_form" method="GET">
                    <div class="row">
                        <div class="col-xs-12 col-lg-4 col-md-4">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="property_status" id="property_status">
                                    <option value="">Property Type</option>
                                    @foreach (config('home.sale') as $key => $item)
                                        <option value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-4 col-md-4">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="bedroom" id="bedroom">
                                    <option value="">Bedrooms</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-4 col-md-4">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="city" id="city" >
                                    <option value="">City</option>
                                    <option value="london">London</option>
                                    <option value="cambridge">Cambridge</option>
                                    <option value="oxford">Oxford</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-8 col-md-8">
                            <div class="form-group">
                                <div class="fiyat">
                                    <input id=""  type="text" name="min_price" placeholder="Min Price" value="1000" style="border:none;" >
                                    <input id=""  type="text" name="max_price" placeholder="Max Price" value="2500" style="border:none;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-4 col-md-4">
                            <div class="form-group">
                                <button class="search-button btn-md btn-color" onclick="search_home()">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>