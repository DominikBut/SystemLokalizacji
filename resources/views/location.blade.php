<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lokalizuj') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-svh">
                {{-- Linkowanie mapy z Google Api --}}
                <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                    ({key: "AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U", v: "weekly"});</script>
                {{-- Mapa google --}}
                <div id="map" style="height: 320px;"></div>

                @livewire('location-map')
            </div>
        </div>
    </div>
    {{-- Script mapy google --}}
    <script>
        async function initMap() {
            // Request needed libraries.
            const { Map, InfoWindow } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");

            // Get initial coordinates from the hidden inputs
            const initialLat = parseFloat(document.getElementById("lat").value);
            const initialLng = parseFloat(document.getElementById("lng").value);
            const initialNazwa = document.getElementById("nazwa").value;
            const initialCzas = new Date(document.getElementById("czas").value).toLocaleString('pl-PL');
            //{{-- // const initialLat = parseFloat(@js( $this->lokacja->latitude ));
                // const initialLng = parseFloat(@js( $this->lokacja->longitude )); --}}
            // Create the map with initial coordinates
            const map = new Map(document.getElementById("map"), {
                zoom: 10,
                center: { lat: initialLat, lng: initialLng },
                mapId: "411a66d3ed39b880",
            });

            // Create an info window to share between markers.
            const infoWindow = new InfoWindow();

            // Create a marker with initial position
            const pin = new PinElement({
                glyph: "#1",
                scale: 1.5,
            });
            const marker = new AdvancedMarkerElement({
                position: { lat: initialLat, lng: initialLng },
                map,
                title: [
                    "Nazwa: "+ initialNazwa,
                    "Lat: "+ initialLat,
                    "Lng: " + initialLng,
                    "Czas: "+ initialCzas,
                ].join("<br>"),
                content: pin.element,
                gmpClickable: true,
            });

            // Add a click listener for the marker, and set up the info window.
            marker.addListener("click", ({ domEvent, latLng }) => {
                const { target } = domEvent;
                infoWindow.close();
                infoWindow.setContent(marker.title);
                infoWindow.open(marker.map, marker);
            });

            // Function to update the marker position
            function updateMarkerPosition(lat, lng, nazwa, czas) {
                const newPosition = { lat: parseFloat(lat), lng: parseFloat(lng) };
                infoWindow.close();
                marker.position = newPosition;
                marker.title = [
                    "Nazwa: "+ nazwa,
                    "Lat: "+ lat,
                    "Lng: " + lng,
                    "Czas: "+ czas,
                ].join("<br>");
                map.setCenter(newPosition);
            }

            Livewire.on('coords', (event) => {
                var localDate = new Date(event.czas).toLocaleString('pl-PL');
                updateMarkerPosition(event.lat, event.lng, event.nazwa, localDate);

            });

        }

        initMap();
    </script>
</x-app-layout>
