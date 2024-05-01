<div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title">Please Markup The Location</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Address: {{ $address }} {{ $city }} {{ $postcode }}</p>
            
            <div class="map">
                <div id="map">Map Loading...</div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-primary" id="confirm_location" value="Save">  </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<style>
    #map {
        height: 600px;
    }
</style> 
   
<script>
        
        
    mapboxgl.accessToken = "{{ env('APP_ENV') == 'dev' ? env('MAPBOX_API_PUBLIC') : env('MAPBOX_API') }}";
    var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
    var defaultLng = $('[name="lng"]').val();
    var defaultLat = $('[name="lat"]').val();
    var address = "{{ $address }}";
    var postcode =  "{{ $postcode }}";
    var city =  "{{ $city }}";
    var country = 'UK';
    var getAddress = address + ' ' +  postcode + ' ' +  city + ' ' + country;
    var type = 'query';
    if( defaultLat != null && defaultLng != null){
        type = 'center';    
    }
    setTimeout(() => {
        setLocation(getAddress, type); 
    }, '1000');
    
    
    function setLocation(value, type) {
        mapboxClient.geocoding
        .forwardGeocode({
            query: value,
            autocomplete: false,
            limit: 1
        })
        .send()
        .then((response) => {
            if (
            !response ||
            !response.body ||
            !response.body.features ||
            !response.body.features.length
            ) {
                console.error('Invalid response:');
                console.error(response);
                return;
            }
            var feature = response.body.features[0];
            
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: feature.center,
                zoom:  $('[name="zoom"]').val() != '' ? $('[name="zoom"]').val() : 16,
                //scrollZoom: false,
            });
            // Create a marker and add it to the map.
            var marker = new mapboxgl.Marker({
                draggable: true
            });
            console.log(type);
            if(type == 'center') {
                marker = marker.setLngLat([defaultLng, defaultLat])
                .addTo(map);
            }

            function add_marker (event) {
                marker = marker.setLngLat(feature.center).addTo(map);
                var coordinates = event.lngLat;
                console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
                marker.setLngLat(coordinates).addTo(map);
                $('[name="lng"]').val(coordinates.lng);
                $('[name="lat"]').val(coordinates.lat);
                $('[name="zoom"]').val(Math.round(map.getZoom()));
            }

            function onDragEnd() {
                const lngLat = marker.getLngLat();
                $('[name="lng"]').val(lngLat.lng);
                $('[name="lat"]').val(lngLat.lat);
                $('[name="zoom"]').val(Math.round(map.getZoom()));
                console.log('Lng:', lngLat.lng, 'Lat:', lngLat.lat);
            }
        
            map.on('click', add_marker);
            marker.on('dragend', onDragEnd);
            map.on('zoom', () => {
            console.log(Math.round(map.getZoom()) );
                if(Math.round(map.getZoom()) != $('[name="zoom"]').val()) $('[name="zoom"]').val(Math.round(map.getZoom()));
            });

            
        });
    }
    
</script>
    
