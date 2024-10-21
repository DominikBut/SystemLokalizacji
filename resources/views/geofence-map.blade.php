<div>
    <h2 class="p-4 text-2xl font-bold text-sky-950 md:text-3xl place-content-end">Zaznacz na mapie obszar domowy pojazdu</h2>
    <div id="map"  style="height: 520px;"></div>
    <div class=" w-auto p-1 bg-lime-600"></div>
    @livewire('area-map')
</div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U&callback=initMap&libraries=drawing&v=weekly"
      defer
    ></script>


    <script>//handle zmiane pojazdu

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



        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 52.30, lng: 16.90 },
                zoom: 10,
            });
            const drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.NULL,
                drawingControl: true,
                drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                    google.maps.drawing.OverlayType.POLYGON,
                    google.maps.drawing.OverlayType.RECTANGLE,
                ],
                },
                polygonOptions:{

                clickable: true,

                },
                rectangleOptions:{

                clickable: true,

                },
            });

        //lastOverlay = loadSavedShape(map,lastOverlay,savedShape);
        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
            // Check if there is already an overlay on the map
            if (lastOverlay) {
            lastOverlay.setMap(null); // Remove the previous overlay
            }

            // Save the new overlay
            lastOverlay = event.overlay;

            // Set the overlay type for the new shape
            lastOverlay.overlayType = event.type;

            // Return to 'hand' mode
            drawingManager.setDrawingMode(null);
            // Get coordinates based on the type of shape
            if (event.type === google.maps.drawing.OverlayType.POLYGON) {
            const path = lastOverlay.getPath();
            const coordinates = [];
            path.forEach((latLng) => {
                coordinates.push({ lat: latLng.lat(), lng: latLng.lng() });
            });
            console.log("Polygon Coordinates:", coordinates);


            } else if (event.type === google.maps.drawing.OverlayType.RECTANGLE) {
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


            }
        });

        // Clear button functionality
        document.getElementById("clearMapButton").addEventListener("click", function() {
            if (lastOverlay) {
            lastOverlay.setMap(null); // Remove the overlay from the map
            lastOverlay = null; // Clear the reference to the overlay
            }
        });

        // send data
        document.getElementById("sendData").addEventListener("click", function() {
            let coordinates = [];


            if(lastOverlay)
            {
                if (lastOverlay.overlayType === 'polygon') {
                const path = lastOverlay.getPath();
                path.forEach((latLng) => {
                    coordinates.push({ lat: latLng.lat(), lng: latLng.lng() });

                });
                }
                if (lastOverlay.overlayType === 'rectangle') {
                const bounds = lastOverlay.getBounds();
                const ne = bounds.getNorthEast();
                const sw = bounds.getSouthWest();
                const nw = new google.maps.LatLng(ne.lat(), sw.lng());
                const se = new google.maps.LatLng(sw.lat(), ne.lng());
                coordinates = [
                    { lat: ne.lat(), lng: ne.lng() }, // NE
                    { lat: nw.lat(), lng: nw.lng() }, // NW
                    { lat: sw.lat(), lng: sw.lng() }, // SW
                    { lat: se.lat(), lng: se.lng() }, // SE

                ];
                }
                Livewire.dispatch('updateShape', {data: {
                type: lastOverlay.overlayType,
                coordinates: coordinates,
            }});
            }
            else{
                Livewire.dispatch('updateShape', {data: null

            });
            }

        });
        drawingManager.setMap(map);

        Livewire.on('area', (event) => {
            lastOverlay = loadSavedShape(map,lastOverlay,event.base_area);

        });
        // Livewire.on('goood', (event) => {
        //    alert('dood');

        // });
    }

    window.initMap = initMap;

    </script>

