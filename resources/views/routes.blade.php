<x-app-layout>
    <x-slot name="header">

            {{ __('Sprawdź trasy pokonane przez pojazdy.') }}

    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 h-full">

            <div class="overflow-hidden h-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 lg:space-x-8">

                    <div class="lg:col-span-8 2xl:col-span-9 h-full">
                            <div class="bg-white overflow-hidden shadow-sm rounded-lg lg:w-full mx-4 mb-2 lg:m-0">

                                {{-- Mapa google --}}
                                <div id="map" style="height: 620px;"></div>

                                <div class="w-full p-1 bg-lime-600"></div>
                                {{-- Linkowanie mapy z Google Api --}}
                                <script
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U&callback=initMap&libraries=marker&v=weekly"
                                defer
                                ></script>
                                <div class="py-1 px-4" id="dane_dash" wire:loading.remove>
                                    <div class="flex flex-col lg:flex-row justify-between border-y-2 border-gray-300 mt-2 py-1 space-y-2 lg:space-y-0" >
                                        <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0">
                                            <div class="text-lg font-bold lg:leading-8 text-cyan-800 text-balance place-content-center text-center lg:text-right">Punkt nr: <span id="pkt_nr">-</span></div>
                                            <dl class=" mx-4 text-sm lg:text-base leading-7 text-stone-700 w-auto place-content-center">
                                                <div class="relative w-full">
                                                    <div class=" bg-blue-100 rounded flex p-1 h-full items-center pr-3">

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="3" class="text-sky-950 w-5 h-5 flex-shrink-0 mr-2" stroke="currentColor" className="size-6">
                                                          <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                          <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                                        </svg>
                                                        <span id="pkt_coords">00°00'00.00"- 00°00'00.00"-</span>

                                                      </div>
                                                </div>



                                            </dl>
                                        </div>

                                        <div class="text-sm lg:text-base lg:leading-8 text-cyan-800 place-content-center text-center lg:text-right">
                                            Wysłano: <span id="pkt_data">-----------------------</span>

                                        </div>
                                    </div>
                                    <div class="py-4" wire:loading.remove>
                                        <div class="w-full">
                                            <div class="flex flex-col lg:flex-row rounded-lg bg-stone-100 items-center w-full shrink-0 grow-0 basis-auto shadow-md outline outline-2 outline-lime-600">
                                                <div class="flex justify-center items-center rounded-md bg-lime-600 w-full h-full p-1 lg:p-4 lg:w-auto ring-1 ring-sky-950/10">
                                                  <svg class="h-4 w-4 text-stone-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" >
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                                  </svg>
                                                </div>
                                                <p id="lokacja"
                                                class="font-semibold text-base text-center sm:text-left sm:text-lg text-sky-950 lg:px-4 mx-2 lg:mx-0 pt-1 lg:pt-0 w-auto text-wrap lg:text-nowrap">
                                                   <span id="pkt_lokacja">Wybierz punkt do sprawdzenia.</span>
                                                </p>
                                          </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>

                    <div class="lg:col-span-4 2xl:col-span-3 mx-4 lg:m-0 lg:justify-between shadow-sm border rounded-lg bg-white">

                         <!-- Navigation Links -->
                        <div class="flex flex-col h-full">
                            @livewire('routes-map')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        let infoWindow;
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

            if(route)
            {
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
            amap.setZoom(14);
            currentPolyline.setMap(amap);
            // Add markers at each point
            addMarkers(amap, route.points);
            }



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
            function geocodeLatLng(geocoder, Glat, Glng) {
                        var latlng = {
                            lat: parseFloat(Glat),
                            lng: parseFloat(Glng),
                        };

                        geocoder
                            .geocode({ location: latlng })
                            .then((response) => {
                            if (response.results[0]) {
                                document.getElementById("pkt_lokacja").innerText = response.results[0].formatted_address;
                            } else {
                                document.getElementById("pkt_lokacja").innerText = "Wybierz punkt do sprawdzenia.";
                            }
                            })
                            .catch((e) => document.getElementById("pkt_lokacja").innerText = "Błąd"+ e );
                    }
      function addMarkers(amap, points) {
         infoWindow = new google.maps.InfoWindow();
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
                if(isLastPoint & points.length >1){
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
                    const geocoder = new google.maps.Geocoder();


                    // Create a regular marker for all points
                    const marker = new google.maps.Marker(markerOptions); // Create the marker
                    var localDate = new Date(point.created_at).toLocaleString('pl-PL');
                    marker.addListener("click", () => {
                        // Clear previous underlines
            document.querySelectorAll('.xd').forEach(el => el.classList.remove('underline'));
            // Underline the clicked marker's corresponding element
            const markerElement = document.querySelector(`.xd[data-index='${index}']`);
            if (markerElement) {
                markerElement.classList.add('underline');
            }
                        infoWindow.close();
                        document.getElementById("pkt_nr").innerText = `${index + 1}`;
                        var localDate2 = new Intl.DateTimeFormat('pl-PL', {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: false // 24-hour format
                    }).format(new Date(point.created_at));
                        document.getElementById("pkt_data").innerText = localDate2;
                        geocodeLatLng(geocoder,point.lat,point.lng);
                        document.getElementById("pkt_coords").innerText = formatCoordinates(point.lat, point.lng);
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


        let isListenerAdded = false; // Flag to track if the listener has been added
        let routeData;
Livewire.on('route', (event) => {
    document.getElementById("pkt_nr").innerText = "-";
    document.getElementById("pkt_data").innerText = "-----------------------";
    document.getElementById("pkt_lokacja").innerText = "Wybierz punkt do sprawdzenia.";
    document.getElementById("pkt_coords").innerText = `00°00'00.00"- 00°00'00.00"-`;
    if(event.base_area)
    {
        lastOverlay = loadSavedShape(map, lastOverlay, event.base_area);
    }else{
        //lastOverlay.setMap(null); // Remove the overlay from the map
                        lastOverlay = null; // Clear the reference to the overlay
    }

    routeData = JSON.parse(event.route);
    console.log(routeData);

    loadRoute(map, routeData);



    const container = document.querySelector('.xd-container'); // Parent container for .xd elements
    if (container) {
        // Remove previous event listener if it exists
        container.removeEventListener('click', handleXDClick);

        // Add a new event listener for the current data
        container.addEventListener('click', handleXDClick);
    } else {
        console.error("Container for .xd elements not found.");
    }

    // Define the click event handler
    function handleXDClick(e) {
        // Ensure the target is an .xd element
        if (e.target.classList.contains('xd')) {
            e.stopPropagation(); // Stop the click from bubbling up if necessary

            // Close any open info windows
            infoWindow.close();

            // Remove underline from all elements
            document.querySelectorAll('.xd').forEach(el => el.classList.remove('underline'));

            // Add underline to the clicked element
            e.target.classList.add('underline');

            // Access the latest routeData directly
            let index = e.target.getAttribute("data-index");
            let point = routeData.points[index];
            let geocoder = new google.maps.Geocoder();

            // Format the date
            let localDate = new Intl.DateTimeFormat('pl-PL', {
                day: '2-digit',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false // 24-hour format
            }).format(new Date(point.created_at));

            // Update the displayed information
            document.getElementById("pkt_nr").innerText = `${parseFloat(index) + 1}`;
            document.getElementById("pkt_data").innerText = localDate;
            geocodeLatLng(geocoder, point.lat, point.lng);
            document.getElementById("pkt_coords").innerText = formatCoordinates(point.lat, point.lng);
        }
    }
});
      }



        window.initMap = initMap;
      </script>
</x-app-layout>

