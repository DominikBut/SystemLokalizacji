            <div class="h-full">
                {{-- Linkowanie mapy z Google Api --}}
                <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                    ({key: "AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U", v: "weekly"});</script>

                {{-- Mapa google --}}
                <h2 class="pl-6 p-4 text-xl font-bold text-sky-950 md:text-2xl place-content-end">Współrzędne <span class="text-lime-700 ">{{ $lokacja->pojazd->Nazwa }}</span> z dnia: <span class="text-lime-700 ">{{ App\Models\Coordinates::formatCreatedAt($lokacja->created_at) }}.</span></h2>
                <div class=" w-auto p-1 bg-lime-600"></div>
                <div id="map"  style="height: 320px;"></div>
                 <div class=" w-auto p-1 bg-lime-600"></div>
                 <div class="px-6 my-4 h-fit">
                    <div class="h-full">
                        {{-- used for maps --}}
                        <input type="text" name="lat" id="lat" hidden value="{!! $lokacja->latitude !!} ">
                        <input type="text" name="lng" id="lng" hidden value="{!! $lokacja->longitude !!} ">
                        <input type="text" name="czas" id="czas" hidden value="{{$lokacja->created_at->timezone('Europe/Warsaw')  }} ">
                        <input type="text" name="nazwa" id="nazwa" hidden value="{!! $lokacja->pojazd->Nazwa !!} ">
                        <div class="mx-auto max-w-7xl sm:pt-4">
                            <div class="flex flex-col sm:flex-row justify-between border-y-2 border-gray-300 mt-2 py-1 space-y-2 sm:space-y-0">
                                <div class="text-sm lg:text-lg lg:leading-8 text-cyan-800 text-balance text-center sm:text-right">SIM ID: {{ $lokacja->simID }} | Tel: {{ $lokacja->pojazd->Telefon }}</div>
                                <div class="text-sm lg:text-lg lg:leading-8 text-cyan-800 place-content-end text-center sm:text-right">
                                    Wysłano: {{ \Carbon\Carbon::setLocale('pl') }}{{ $lokacja->created_at->timezone('Europe/Warsaw')->diffForHumans() }}
                                </div>
                            </div>
                            <div class="py-4">
                                <div class="w-full">
                                    <div class="flex flex-col lg:flex-row rounded-lg bg-stone-100 items-center w-full shrink-0 grow-0 basis-auto shadow-md outline outline-2 outline-lime-600">
                                        <div class="flex justify-center items-center rounded-md bg-lime-600 w-full h-full p-1 lg:p-4 lg:w-auto ring-1 ring-sky-950/10">
                                          <svg class="h-4 w-4 text-stone-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" >
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                          </svg>
                                        </div>
                                        <p id="lokacja"
                                        class="font-semibold text-base text-center sm:text-left sm:text-lg text-sky-950 lg:px-4 mx-2 lg:mx-0 pt-1 lg:pt-0 w-auto text-wrap lg:text-nowrap">
                                            Loklizacja
                                        </p>
                                  </div>
                                </div>
                            </div>
                            <div class="mx-auto lg:grid max-w-2xl grid-cols-1 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-4 mb-2">
                                <div class="lg:col-span-2 items-center flex flex-row justify-center lg:justify-normal text-left w-full">
                                    <dl class="space-y-4 text-base xl:text-lg leading-7 text-stone-700 w-[32rem]">
                                      <div class="relative w-full">
                                          <div class=" bg-blue-100 rounded flex flex-col sm:flex-row p-3 h-full sm:items-center">
                                            <div class="flex flex-row ">
                                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-sky-950 w-6 h-6 flex-shrink-0 mr-4" stroke="currentColor" className="size-6">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                              </svg>

                                              <div class="font-bold flex flex-row space-x-6"><p>{!! App\Models\Coordinates::formatCoordinates($lokacja->latitude, $lokacja->longitude) !!}</p></div>
                                            </div>
                                              @if($lokacja->route !=0)
                                              <h3 class=" font-bold text-sky-80 truncate px-2" wire:loading.remove>| Trasa nr: {{ $lokacja->route }}</h3>
                                              @endif
                                            </div>
                                      </div>
                                      <div class="relative">
                                          <div class="bg-blue-100 rounded flex p-3 h-full items-center font-bold">

                                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" class="text-sky-950 w-6 h-6 flex-shrink-0 mr-4" stroke="currentColor" className="size-6">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                              </svg>

                                                Sygnał:
                                                <span class="@if($lokacja->strength < 20) text-red-500 @elseif($lokacja->strength < 50) text-yellow-500 @else text-green-500 @endif">
                                                    {!! '&nbsp;'. $lokacja->strength !!}%
                                                </span>
                                                {!! '&nbsp;&nbsp;&nbsp;&nbsp;' !!}
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" class="text-sky-950 w-6 h-6 flex-shrink-0 mr-4" stroke="currentColor" className="size-6">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5H18V15H4.5v-4.5ZM3.75 18h15A2.25 2.25 0 0 0 21 15.75v-6a2.25 2.25 0 0 0-2.25-2.25h-15A2.25 2.25 0 0 0 1.5 9.75v6A2.25 2.25 0 0 0 3.75 18Z" />
                                                </svg>
                                                Bateria:
                                                <span class="@if($lokacja->battery < 20) text-red-500 @elseif($lokacja->battery < 50) text-yellow-500 @else text-green-500 @endif">
                                                    {!! '&nbsp;'. $lokacja->battery !!}%
                                                </span>

                                          </div>
                                      </div>

                                  </dl>

                                </div>
                              <div class="lg:col-span-2 flex justify-center invisible md:visible">

                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" stroke="currentColor"
                                  class="w-[0rem] max-w-none lg:max-xl:w-[8rem] xl:w-[12rem] text-lime-600">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="m6.115 5.19.319 1.913A6 6 0 0 0 8.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 0 0 2.288-4.042 1.087 1.087 0 0 0-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 0 1-.98-.314l-.295-.295a1.125 1.125 0 0 1 0-1.591l.13-.132a1.125 1.125 0 0 1 1.3-.21l.603.302a.809.809 0 0 0 1.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 0 0 1.528-1.732l.146-.292M6.115 5.19A9 9 0 1 0 17.18 4.64M6.115 5.19A8.965 8.965 0 0 1 12 3c1.929 0 3.716.607 5.18 1.64" />
                                  </svg>

                              </div>
                            </div>

                        </div>
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
                zoom: 12,
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
            // Add a click listener for the marker, and set up the info window.
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

            //znajdz adres
            function geocodeLatLng(geocoder, Glat, Glng) {
                const latlng = {
                    lat: parseFloat(Glat),
                    lng: parseFloat(Glng),
                };

                geocoder
                    .geocode({ location: latlng })
                    .then((response) => {
                    if (response.results[0]) {
                        document.getElementById("lokacja").innerText = response.results[0].formatted_address;
                    } else {
                        document.getElementById("lokacja").innerText = "Brak danych";
                    }
                    })
                    .catch((e) => document.getElementById("lokacja").innerText = "Błąd"+ e );
            }
            geocodeLatLng(geocoder,initialLat,initialLng);


        }

        initMap();
    </script>

