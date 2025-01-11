<x-app-layout>
    <x-slot name="header">

            {{ __('Sprawdź lokalizacje swoich pojazdów.') }}

    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden rounded-lg mx-4 mb-2 xl:m-0">

                {{-- Google Api --}}
                <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                    ({key: "AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U", v: "weekly"});</script>
                {{-- Mapa google --}}
                <div id="map" style="height: 420px;"></div>
                 <div class="w-full p-1 bg-lime-600"></div>
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

            var initialLat = 0.000000;
            var initialLng = 0.000000;
            var initialNazwa = 'Przykładowe dane';
            var initialCzas ='system';
            if(document.getElementById("czas"))
            {
                 initialLat = parseFloat(document.getElementById("lat").value);
                 initialLng = parseFloat(document.getElementById("lng").value);
                 initialNazwa = document.getElementById("nazwa").value;
                 initialCzas = new Date(document.getElementById("czas").value).toLocaleString('pl-PL');
            }

            // Create the map with initial coordinates
            const map = new Map(document.getElementById("map"), {
                zoom: 16,
                center: { lat: initialLat, lng: initialLng },
                mapId: "411a66d3ed39b880",
            });

            // Create an info window to share between markers.
            const infoWindow = new InfoWindow();

            const geocoder = new google.maps.Geocoder();
            // Create a marker with initial position
            const pin = new PinElement({
                glyph: "Tu",
                glyphColor: "black",
                scale: 1.5,
                background: "#fc810e",
                borderColor: "#e2290d",
            });

            const marker = new AdvancedMarkerElement({
                position: { lat: initialLat, lng: initialLng },
                map,
                title: [
                    "Zobacz: "+ initialNazwa,
                ].join("<br>"),
                content: pin.element,
                gmpClickable: true,
            });
            function formatCoordinates(lat, lng) {
                function toDMS(degree) {
                    const isNegative = degree < 0;
                    degree = Math.abs(degree);
                    const degrees = Math.floor(degree);
                    const minutes = Math.floor((degree - degrees) * 60);
                    const seconds = ((degree - degrees) * 60 - minutes) * 60;
                    return `${degrees}°${minutes}'${seconds.toFixed(2)}"${isNegative ? 'S' : 'N'}`;
                }

                const formattedLat = toDMS(lat);
                const formattedLng = toDMS(lng);
                return `${formattedLat} ${formattedLng.replace(/N$/, 'E').replace(/S$/, 'W')}`;
            }
            marker.addListener("click", ({ domEvent, latLng }) => {
                const { target } = domEvent;
                infoWindow.close();
                infoWindow.setHeaderContent("Dane lokalizacji:");
                infoWindow.setContent([
                    ""+ initialNazwa,
                    formatCoordinates(initialLat, initialLng),
                    "Wysłano: "+ initialCzas,
                ].join("<br>"));
                infoWindow.open(marker.map, marker);
            });

            function geocodeLatLng(geocoder, Glat, Glng) {
                const latlng = {
                    lat: parseFloat(Glat),
                    lng: parseFloat(Glng),
                };
                if(document.getElementById("lokacja"))
                {
                    geocoder
                    .geocode({ location: latlng })
                    .then((response) => {
                    if (response.results[0]) {
                        document.getElementById("lokacja").innerText = response.results[0].formatted_address;
                    } else {
                        document.getElementById("lokacja").innerText = "Brak odebranych danych";
                    }
                    })
                    .catch((e) => document.getElementById("lokacja").innerText = "Błąd"+ e );
                }

            }
            if(initialLat != 0.000000 & initialLng != 0.000000)
                {
                    geocodeLatLng(geocoder,initialLat,initialLng);
                }
            function updateMarkerPosition(lat, lng, nazwa, czas) {
                const newPosition = { lat: parseFloat(lat), lng: parseFloat(lng) };
                infoWindow.close();

                marker.addListener("click", ({ domEvent, latLng }) => {
                const { target } = domEvent;
                infoWindow.close();
                infoWindow.setHeaderContent("Dane lokalizacji:");
                infoWindow.setContent([
                    ""+ nazwa,
                    formatCoordinates(lat, lng),
                    "Wysłano: "+ czas,
                ].join("<br>"));
                infoWindow.open(marker.map, marker);
            });
                marker.position = newPosition;
                marker.title = [
                    "Zobacz: "+ initialNazwa,

                ].join("<br>");
                map.setCenter(newPosition);
                map.setZoom(16);
            }

            Livewire.on('coords', (event) => {
                var localDate = new Date(event.czas).toLocaleString('pl-PL');
                if(event.lat)
                {
                    updateMarkerPosition(event.lat, event.lng, event.nazwa, localDate);
                    geocodeLatLng(geocoder, event.lat, event.lng);
                }else{
                    updateMarkerPosition(0.000000, 0.000000, 'Przykładowe dane', 'system');
                }
            });
        }

        initMap();
    </script>
</x-app-layout>
