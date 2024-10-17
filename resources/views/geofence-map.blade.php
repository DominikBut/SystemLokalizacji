            <div>
                {{-- Linkowanie mapy z Google Api --}}
                {{-- <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                    ({key: "AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U", v: "weekly"});</script> --}}

                {{-- Mapa google --}}
                <h2 class="p-4 text-2xl font-bold text-sky-950 md:text-2xl place-content-end">Wybierz obszar</h2>
                <div id="map"  style="height: 520px;"></div>
                 <div class=" w-auto p-1 bg-lime-600"></div>
                 <div class="px-6 my-4">
                    <div class="h-full">

                        <div class="mx-auto max-w-7xl">
                            <div class="flex flex-row justify-between border-y-2 border-gray-300 mt-2 py-1">
                                <div class="text-sm lg:text-base lg:leading-8 text-cyan-800 text-balance">SIM ID:</div>
                                <div class="text-sm lg:text-base lg:leading-8 text-cyan-800 place-content-end">
                                     sfsdfsdf
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
                                            Lokacja<button id="clearMapButton">Clear Map</button>
                                        </p>
                                  </div>
                                </div>
                            </div>
                            <div class="mx-auto lg:grid max-w-2xl grid-cols-1 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3 mb-2">
                                <div class="sm:col-span-2 items-center flex flex-row text-left w-full">
                                    <dl class="space-y-4 text-sm lg:text-base leading-7 text-stone-700 w-[32rem]">
                                      <div class="relative w-full">
                                          <div class=" bg-blue-100 rounded flex p-2 h-full items-center">

                                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-sky-950 w-6 h-6 flex-shrink-0 mr-4" stroke="currentColor" className="size-6">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                              </svg>

                                              <div class="font-bold flex flex-row space-x-6"><p>dfgdgdfg</p></div>

                                            </div>
                                      </div>
                                      <div class="relative">
                                          <div class="bg-blue-100 rounded flex p-2 h-full items-center font-bold">

                                              gjgjgj
                                          </div>
                                      </div>

                                  </dl>

                                </div>
                              <div class="flex justify-center invisible sm:visible">

                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" stroke="currentColor"
                                  class="w-[0rem] max-w-none lg:max-xl:w-[6rem] xl:w-[10rem] text-lime-600">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="m6.115 5.19.319 1.913A6 6 0 0 0 8.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 0 0 2.288-4.042 1.087 1.087 0 0 0-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 0 1-.98-.314l-.295-.295a1.125 1.125 0 0 1 0-1.591l.13-.132a1.125 1.125 0 0 1 1.3-.21l.603.302a.809.809 0 0 0 1.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 0 0 1.528-1.732l.146-.292M6.115 5.19A9 9 0 1 0 17.18 4.64M6.115 5.19A8.965 8.965 0 0 1 12 3c1.929 0 3.716.607 5.18 1.64" />
                                  </svg>

                              </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

          <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATS3eoPZF6fOo-JCpwGJSncxE7vQqD3_U&callback=initMap&libraries=drawing&v=weekly"
      defer
    ></script>
    {{-- Script mapy google --}}
    <script>

    function initMap() {
        let lastOverlay = null; // To keep track of the last drawn overlay
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
        drawingManager.setMap(map);

    }

    window.initMap = initMap;
    </script>

