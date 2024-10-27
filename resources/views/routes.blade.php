<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trasy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 h-full">

            <div class="overflow-hidden h-full">
                <div class="grid grid-cols-12 space-x-8">

                    <div class="col-span-9 h-full">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-full">

                                {{-- Mapa google --}}
                                <div id="map" style="height: 620px;"></div>
                                <div class="w-full p-1 bg-lime-600"></div>
                                {{-- Linkowanie mapy z Google Api --}}
                                <script
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U&callback=initMap&libraries=marker&v=weekly"
                                defer
                                ></script>

                            </div>
                    </div>
                    <div class="col-span-3 justify-between shadow-sm border sm:rounded-lg bg-white">

                         <!-- Navigation Links -->
                        <div class="flex flex-col">
                            @livewire('routes-map')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>

        var savedShape = null;
        let lastOverlay = null; // To keep track of the last drawn overlay

        function loadSavedShape(map,lastOverlay,savedShape) {
            if (lastOverlay) {
                        lastOverlay.setMap(null); // Remove the overlay from the map
                        lastOverlay = null; // Clear the reference to the overlay
            }
            if (!savedShape || !savedShape.type || !savedShape.coordinates) {
                console.error("Invalid shape data.");

                return lastOverlay;
            }

            // Load the saved shape onto the map
            if (savedShape.type === 'rectangle') {
                const rectangleBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(savedShape.coordinates[2].lat, savedShape.coordinates[2].lng), // SW
                new google.maps.LatLng(savedShape.coordinates[0].lat, savedShape.coordinates[0].lng)  // NE
                );
                lng = savedShape.coordinates[0].lng;
                lat =savedShape.coordinates[0].lat;
                var myLatlng = new google.maps.LatLng(lat, lng);
                map.setCenter(myLatlng, 6);
                map.setZoom(16);

                const rectangle = new google.maps.Rectangle({
                bounds: rectangleBounds,
                map: map, // Add the rectangle to the map
                });

                // Save the loaded shape as the current last overlay
                lastOverlay = rectangle;


                const bounds = lastOverlay.getBounds();
                const ne = bounds.getNorthEast();
                const sw = bounds.getSouthWest();
                const nw = new google.maps.LatLng(ne.lat(), sw.lng());
                const se = new google.maps.LatLng(sw.lat(), ne.lng());
                const rectanglePath = [
                    { lat: ne.lat(), lng: ne.lng() }, // NE
                    { lat: nw.lat(), lng: nw.lng() }, // NW
                    { lat: sw.lat(), lng: sw.lng() }, // SW
                    { lat: se.lat(), lng: se.lng() }, // SE

                ];
                console.log("Rectangle Path:", rectanglePath);
                lastOverlay.overlayType = 'rectangle';
                }


                if (savedShape.type === 'polygon') {
                // Create an array of LatLng objects from the coordinates
                const polygonPath = savedShape.coordinates.map(coord => {
                return { lat: coord.lat, lng: coord.lng };
                });

                lng = savedShape.coordinates[0].lng;
                lat =savedShape.coordinates[0].lat;
                var myLatlng = new google.maps.LatLng(lat, lng);
                map.setCenter(myLatlng, 6);
                map.setZoom(16);
                const polygon = new google.maps.Polygon({
                paths: polygonPath,
                map: map, // Add the polygon to the map
                });

                // Save the loaded shape as the current last overlay
                lastOverlay = polygon;

                const path = lastOverlay.getPath();
                const coordinates = [];
                path.forEach((latLng) => {
                    coordinates.push({ lat: latLng.lat(), lng: latLng.lng() });
                });
                lastOverlay.overlayType = 'polygon';

                console.log("Polygon Coordinates:", coordinates);
                //updateLivewireVariable(coordinates, 'polygon');
            }


            // You can add similar handling for other shapes like 'circle' or 'polygon' if needed
            return lastOverlay;
            }
    let currentPolyline; // Variable to hold the current polyline
    let markers = []; // Array to hold marker instances
    function loadRoute(amap,route)
      {
            clearMap();
            // Create an array of Google Maps LatLng objects
            const routeCoordinates = route.points.map(coord => {
                return { lat: coord.lat, lng: coord.lng };
                });

            // Create a polyline to display the route
            currentPolyline  = new google.maps.Polyline({
            path: routeCoordinates,
            geodesic: true,
            strokeColor: "#FF0470",
            strokeOpacity: 1.0,
            strokeWeight: 4
            });
            // Set the polyline on the map
            amap.setCenter(route.points[0]);
            amap.setZoom(16);
            currentPolyline.setMap(amap);
            // Add markers at each point
            addMarkers(amap, route.points);
      }
      function formatCoordinates(lat, lng) {
                // Function to convert decimal degrees to DMS format
                function toDMS(degree) {
                    const isNegative = degree < 0;
                    degree = Math.abs(degree);

                    const degrees = Math.floor(degree);
                    const minutes = Math.floor((degree - degrees) * 60);
                    const seconds = ((degree - degrees) * 60 - minutes) * 60;

                    // Construct the DMS string
                    return `${degrees}°${minutes}'${seconds.toFixed(2)}"${isNegative ? 'S' : 'N'}`;
                }

                const formattedLat = toDMS(lat);
                const formattedLng = toDMS(lng);

                return `${formattedLat} ${formattedLng.replace(/N$/, 'E').replace(/S$/, 'W')}`;
            }
      function addMarkers(amap, points) {
        const infoWindow = new google.maps.InfoWindow();
            points.forEach((point, index) => {
                const isLastPoint = index === points.length - 1; // Check if it's the last point
                let markerOptions = null;
                // Create an info window to share between markers.
                let labela = `${index + 1}`;
                markerOptions = {
                        position: { lat: point.lat, lng: point.lng },
                        map: amap,
                        label: labela, // Don't label the last point
                        title: `Punkt ${index + 1}`, // Tooltip with the point number

                        label: {
                            text: labela, // codepoint from https://fonts.google.com/icons

                            color: "#ffffff",
                            fontSize: "18px",
                        },
                };
                if(isLastPoint){
                        // Marker options for regular markers
                    markerOptions = {
                        position: { lat: point.lat, lng: point.lng },
                        map: amap,
                        icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                        scaledSize: new google.maps.Size(40, 40),
                        },
                        optimized: false,
                        zIndex: 98,
                        title: `Punkt końcowy` // Tooltip with the point number
                    };


                }
                else if(index==0){
                    markerOptions = {
                        position: { lat: point.lat, lng: point.lng },
                        map: amap,
                        icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                        scaledSize: new google.maps.Size(40, 40), // Scale the icon to the desired size

                        //size: new google.maps.Size(20, 32),
                        // The origin for this image is (0, 0).
                        //origin: new google.maps.Point(0, 0),
                        // The anchor for this image is the base of the flagpole at (0, 32).
                        //anchor: new google.maps.Point(0, 32),
                        },
                        optimized: false,
                        zIndex: 99,
                        title: `Punkt startowy` // Tooltip with the point number
                    };
                }

                    // Create a regular marker for all points
                    const marker = new google.maps.Marker(markerOptions); // Create the marker
                    var localDate = new Date(point.created_at).toLocaleString('pl-PL');
                    marker.addListener("click", () => {
                        infoWindow.close();
                        infoWindow.setHeaderContent("Dane punktu "+ `${index + 1}`+":");
                        infoWindow.setContent([

                            formatCoordinates(point.lat, point.lng),
                            "Wysłano: "+localDate,
                        ].join("<br>"));

                        infoWindow.open(marker.getMap(), marker);
                    });
                    markers.push(marker); // Store marker in the markers array

                    });
        }
      // Function to clear the entire map (polylines and other overlays)
       // Function to clear the map (remove the current polyline)
        function clearMap() {
            if (currentPolyline) {
                currentPolyline.setMap(null); // Remove the current polyline from the map
                currentPolyline = null; // Clear the reference
            }
            // Remove all markers from the map
            markers.forEach(marker => marker.setMap(null));
            markers = []; // Clear the markers array
        }
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {

        });


        Livewire.on('route', (event) => {

            lastOverlay = loadSavedShape(map,lastOverlay,event.base_area);
            const routeData = JSON.parse(event.route);
            loadRoute(map,routeData);

        });
      }

        window.initMap = initMap;
      </script>
</x-app-layout>

