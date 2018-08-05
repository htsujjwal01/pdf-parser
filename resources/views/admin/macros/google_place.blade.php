
 <div>
     <input
         id="googlePlaceSearch"
         type="text"
         class="form-control"
         placeholder="Enter {{ $name }} Location" >
     <input
         id="googlePlace"
         type="hidden"
         name="{{ $field }}"
         value="{{ isset($location) ? $location : old($field) }}" 
         required/>

     <div id="googleMap"></div>

 </div>
 <script>

     function initMap() {
         var map = new google.maps.Map(document.getElementById("googleMap"), {
             center: {lat: 28.6110474, lng: 77.2268794},
             zoom: 13
         });

         var input = document.getElementById("googlePlaceSearch");
         map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

         var autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.bindTo("bounds", map);

         var infowindow = new google.maps.InfoWindow();
         var marker = new google.maps.Marker({
           map: map,
           anchorPoint: new google.maps.Point(0, -29)
         });

         autocomplete.addListener("place_changed", function() {
           infowindow.close();
           marker.setVisible(false);
           var place = autocomplete.getPlace();

           console.log(place);
           document.getElementById("googlePlace").value = place.place_id;


           if (!place.geometry) {
               window.alert("Autocomplete\'s returned place contains no geometry");
               return;
           }

           // If the place has a geometry, then present it on a map.
           if (place.geometry.viewport) {
               map.fitBounds(place.geometry.viewport);
           } else {
               map.setCenter(place.geometry.location);
               map.setZoom(17);
           }
           marker.setIcon(({
               url: place.icon,
               size: new google.maps.Size(71, 71),
               origin: new google.maps.Point(0, 0),
               anchor: new google.maps.Point(17, 34),
               scaledSize: new google.maps.Size(35, 35)
           }));
           marker.setPosition(place.geometry.location);
           marker.setVisible(true);

           var address = "";
           if (place.address_components) {
               address = [
                 (place.address_components[0] && place.address_components[0].short_name || ""),
                 (place.address_components[1] && place.address_components[1].short_name || ""),
                 (place.address_components[2] && place.address_components[2].short_name || "")
               ].join(" ");
           }

           infowindow.setContent("<div><strong>" + place.name + "</strong><br>" + place.formatted_address);
           infowindow.open(map, marker);

       });
   }

 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.map_api_key') }}&libraries=places&callback=initMap" async defer></script>
