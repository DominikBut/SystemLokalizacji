<div>
    <h2 class="p-4 text-xl font-bold text-sky-950 md:text-2xl place-content-end pl-6">Zaznacz na mapie obszar startowy pojazdu.</h2>
    <div class=" w-auto p-1 bg-lime-600"></div>
    <div id="map"  style="height: 520px;"></div>
    <div class=" w-auto p-1 bg-lime-600"></div>
    @livewire('area-map')
</div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U&callback=initMap&libraries=drawing&v=weekly"
      defer
    ></script>
    <script>

        var savedShape = null;
        let lastOverlay = null;
        function loadSavedShape(map,lastOverlay,savedShape) {
            if (lastOverlay) {
                        lastOverlay.setMap(null);
                        lastOverlay = null;
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
                map: map,
                });

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
                map: map,
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
            }
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
                position: google.maps.ControlPosition.BOTTOM_CENTER,
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

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {

            if (lastOverlay) {
            lastOverlay.setMap(null);
            }

            lastOverlay = event.overlay;

            lastOverlay.overlayType = event.type;

            drawingManager.setDrawingMode(null);

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

        if(document.getElementById("clearMapButton"))
            {

                document.getElementById("clearMapButton").addEventListener("click", function() {
                            if (lastOverlay) {
                            lastOverlay.setMap(null);
                            lastOverlay = null;
                            }
                        });

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
            }


            if(document.getElementById("clearMapButton"))
            {
            drawingManager.setMap(map);
            }
        Livewire.on('area', (event) => {
            lastOverlay = loadSavedShape(map,lastOverlay,event.base_area);

        });

    }

    window.initMap = initMap;

    </script>

