<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>System lokalizacji pojazdów | By Dominik But</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
        </style>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @filamentStyles
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-stone-50">
        <div class="relative ">

            <div class="relative flex flex-col items-center justify-center">
                <div class="relative w-full max-w-2xl px-6 lg:px-6 2xl:px-2 lg:max-w-7xl">
                    <header class="flex flex-col sm:flex-row py-8 lg:py-12 items-center">

<svg
   width="512" class="h-14 w-14 lg:w-16 lg:h-16 py-2"
   height="512"
   viewBox="0 0 512 512"
   version="1.1"
   id="svg1"
   xml:space="preserve"
   inkscape:version="1.4 (86a8ad7, 2024-10-11)"
   sodipodi:docname="logo.svg"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg"><sodipodi:namedview
     id="namedview1"
     pagecolor="#ffffff"
     bordercolor="#cccccc"
     borderopacity="1"
     inkscape:showpageshadow="0"
     inkscape:pageopacity="1"
     inkscape:pagecheckerboard="0"
     inkscape:deskcolor="#d1d1d1"
     inkscape:document-units="px"
     inkscape:zoom="1.1162109"
     inkscape:cx="397.32635"
     inkscape:cy="43.45057"
     inkscape:window-width="2560"
     inkscape:window-height="1361"
     inkscape:window-x="2391"
     inkscape:window-y="-9"
     inkscape:window-maximized="1"
     inkscape:current-layer="layer1"
     showguides="true" /><defs
     id="defs1" /><g
     inkscape:label="Warstwa 1"
     inkscape:groupmode="layer"
     id="layer1"><circle
       style="display:inline;fill:#0088aa;stroke-width:1.15224"
       id="path1"
       cx="256"
       cy="256"
       r="250"
       sodipodi:insensitive="true" /><g
       id="g9"
       transform="translate(2.533954,0.63348849)"><path
         id="path2"
         style="fill:#88aa00"
         d="m 169.47776,48.007137 c -0.44311,0.01392 -0.77273,0.05753 -0.9707,0.136718 -2.58799,1.035196 -37.40882,3.714307 -52.19531,4.832032 -2.98343,2.38881 -6.14151,4.557243 -9.30859,6.701171 2.05849,0.665145 2.70229,3.36564 -0.26368,5.935547 -6.57292,5.69521 -13.130192,11.398479 -19.519528,17.300782 -8.18521,7.814476 -15.519567,16.450699 -22.986328,24.937503 -8.914507,9.97189 -16.708694,20.84643 -24.162109,31.92968 -1.384308,2.05847 -3.036882,2.7349 -4.320313,2.4961 -0.377559,0.88894 -0.736666,1.78587 -1.134765,2.66601 -1.320938,3.1807 -2.851345,6.26119 -4.488282,9.28907 -1.42135,2.45497 -2.655796,5.00612 -3.912109,7.54687 -1.390805,2.65468 -2.770475,5.31164 -4.095703,8 -0.572476,1.19661 -1.116881,2.40607 -1.654297,3.61914 l -4.628906,28.05078 9.501953,12.03711 27.240234,-43.07812 60.814453,-38.64258 16.4707,-31.67383 27.87305,-19.005858 50.67969,-26.605469 c 0,0 -32.29294,-6.681447 -38.93946,-6.472656 z M 93.298077,68.927058 87.58714,72.798152 c -0.469989,0.322395 -0.938265,0.648126 -1.408203,0.970703 -0.922271,1.390972 -1.870387,2.766194 -2.847657,4.121094 3.2875,-3.028711 6.613599,-6.010746 9.966797,-8.962891 z" /><path
         style="fill:#88aa00"
         d="m 17.104189,225.52191 -7.601862,52.57954 21.538609,47.51164 8.23535,41.81024 27.240004,27.87349 15.20373,-3.80093 c 0,0 -19.638148,-19.63814 -18.371171,-27.87349 1.266977,-8.23535 21.538611,-50.04559 22.172101,-53.84652 0.63348,-3.80094 -5.06791,-43.07722 -5.06791,-43.07722 L 39.909775,216.01958 27.873494,209.68469 Z"
         id="path3" /><path
         style="fill:#88aa00"
         d="m 226.15539,165.3405 -32.9414,53.21303 1.26697,34.20838 43.71071,6.96837 13.93675,40.54327 v 48.77861 l 15.20372,36.74233 30.40745,-11.40279 36.74233,-36.10884 c 0,0 17.10419,-22.1721 15.20372,-25.97303 -1.90046,-3.80093 -19.63814,-16.4707 -18.37116,-22.80559 1.26697,-6.33488 22.17209,-32.30791 23.43907,-36.10884 1.26698,-3.80093 5.7014,-25.97303 5.7014,-25.97303 l 14.57023,-21.53861 -20.90512,-14.57023 -29.77396,-16.4707 -23.43907,3.16744 -37.37582,-3.16744 -15.83721,-12.66977 -27.8735,1.90046 z"
         id="path4" /><path
         style="fill:#88aa00"
         d="m 283.16936,84.887457 -23.43908,24.706053 3.80093,6.33488 -6.96837,3.80093 -23.43907,5.06791 -4.43442,25.33954 -0.63349,12.66977 29.14047,-10.7693 20.27163,3.16744 12.03628,10.13581 17.73768,7.60187 15.83721,-2.53396 15.83721,13.30326 31.67443,10.13582 h 10.13581 l 15.83722,15.83721 3.16744,31.67442 19.00465,12.66977 -2.53395,-40.54326 8.86884,-8.86884 15.83721,15.83721 16.4707,12.03628 11.40279,-12.66977 -3.80093,-20.27163 14.57024,-23.43907 -17.73768,-20.27163 13.30326,-7.60186 c 0,0 -0.63349,-12.03629 -3.16744,-14.57024 -2.53396,-2.53395 -38.00931,-31.04094 -38.00931,-31.04094 l 0.63349,-19.00465 -20.90512,-9.502328 -65.88281,5.067908 -29.77396,6.334885 -24.70605,-2.533954 z"
         id="path5" /><path
         id="path9"
         style="fill:#b3b3b3"
         d="m 234.38987,3.8001053 c -0.41616,0 -1.11301,0.044777 -1.74609,0.080078 -1.57905,0.2868001 -3.15967,0.5645084 -4.74609,0.8085937 -3.58516,0.5710987 -7.18637,1.10789 -10.71875,1.953125 -0.34056,0.7642553 -1.21089,1.462692 -2.69727,1.7460938 -3.88263,0.7402848 -1.89012,0.3647996 -5.97461,1.125 -6.2788,1.0909982 -12.57708,2.0723702 -18.83789,3.2636722 -3.39979,0.72013 -6.78121,1.547662 -10.01367,2.847656 -1.07535,0.432471 -1.9811,0.464876 -2.66211,0.251953 l -7.21875,7.5625 48.7793,-1.267578 15.83593,7.603516 38.00977,0.632812 29.14062,1.900391 41.17774,3.800781 h 28.50586 l 6.19531,1.107422 c -0.74425,-0.608392 -1.45937,-1.252405 -2.17187,-1.898438 -0.0591,-0.02339 -0.11372,-0.03659 -0.17383,-0.0625 -2.82904,-1.219181 -5.61652,-2.528045 -8.38086,-3.886718 -4.20864,-2.06419 -8.37267,-4.216987 -12.55274,-6.337891 -5.00558,-2.559022 -10.20842,-4.688601 -15.48046,-6.626953 -4.5177,-1.529773 -9.11533,-2.816699 -13.7129,-4.082031 -0.57823,-0.158498 -1.15614,-0.318065 -1.73437,-0.476563 -1.30796,-0.358527 -2.07631,-1.011861 -2.42578,-1.710937 -3.88511,-0.487517 -7.76888,-0.985002 -11.65625,-1.455078 C 303.55252,10.07839 298.01211,9.23706 292.49534,8.2278396 288.34118,7.5192797 284.20561,6.7078666 280.05784,5.9641678 279.27938,5.8245886 278.66967,5.5676664 278.21019,5.2473709 264.56741,4.7218548 240.17997,3.8001051 234.38987,3.8001053 Z m -49.4707,5.4726562 c -0.13728,0.017841 -1.8418,0.2304688 -1.8418,0.2304688 l -0.33984,0.3574218 c 0.72396,-0.2070296 1.45093,-0.4045821 2.18164,-0.5878906 z" /><path
         id="path8"
         style="fill:#b3b3b3"
         d="m 126.69847,463.71417 3.72265,11.45898 c 5.02491,2.55187 10.13994,4.92272 15.27149,7.25781 13.56001,6.02136 27.59036,10.85677 41.68359,15.46485 l 40.04883,6.75195 c 0.50714,0.0394 1.01414,0.0799 1.52148,0.11719 6.32901,0.38852 12.67094,0.5001 19.00977,0.60156 3.5049,0.0511 7.01047,0.0762 10.51563,0.10156 0.83785,0.006 1.51584,0.17046 2.03515,0.4336 16.65111,-1.52166 40.50522,-3.7308 42.30078,-4.17969 1.70846,-0.42711 22.24208,-6.61456 37.40821,-11.19141 0.14813,-0.36766 0.53411,-0.72304 1.20703,-0.92968 2.68814,-0.82552 5.38786,-1.61185 8.08008,-2.42383 0.6666,-0.21799 0.72525,-0.2386 1,-0.32813 1.51936,-0.81058 3.08768,-1.52147 4.67773,-2.18164 1.01678,-0.62907 1.9316,-1.40544 2.93945,-2.04883 0.51085,-0.3261 0.84039,-0.51942 1.16407,-0.69335 l -1.36329,-6.8086 -26.60742,-6.96875 -41.17578,-1.26758 -19.63867,7.60352 -44.34375,0.63281 -48.7793,-5.70117 z" /><path
         id="path7"
         style="fill:#88aa00"
         d="m 496.02073,300.27276 -25.33789,21.53906 -26.60742,33.57618 -3.80078,14.56836 v 8.86914 l 22.17187,-8.23438 5.70118,8.86914 v 3.13672 c 1.87606,-3.49514 3.88805,-6.90753 6.10351,-10.20117 2.98961,-4.5578 6.05579,-9.08763 8.56641,-13.9336 2.57202,-5.36725 5.07588,-10.77329 7.28711,-16.30078 2.02105,-5.42194 3.7696,-10.93796 5.14062,-16.5625 0.76355,-3.12925 1.56484,-6.25474 2.07813,-9.4375 0.12914,-0.80077 0.38549,-1.4209 0.70898,-1.88867 0.41463,-2.77648 0.83081,-5.55302 1.10352,-8.34765 0.0513,-0.52551 0.16202,-0.97807 0.3125,-1.36719 z" /><path
         id="path6"
         style="fill:#88aa00"
         d="m 462.44651,224.888 -4.43359,18.37109 -24.07422,-13.93555 10.13672,34.20703 39.91016,27.875 2.5332,-14.57031 14.89258,-6.16406 c 0.20167,-1.41076 0.41992,-2.81915 0.66015,-4.22461 0.27018,-1.50947 0.54891,-3.01709 0.82422,-4.52539 l -1.80664,-6.625 -9.50195,-16.4707 -12.66992,13.30273 -3.16797,-23.43945 z" /><path
         id="path38"
         style="fill:#88aa00;fill-opacity:1"
         transform="translate(-2.533954,-0.63348849)"
         d="m 112.81445,50.568359 c -0.54364,0.497046 -1.09178,0.989298 -1.61914,1.503907 -0.87069,0.944262 -1.88202,1.725867 -2.87109,2.537109 -0.89084,0.726893 -1.82044,1.401779 -2.73633,2.095703 -1.10337,0.819746 -2.27918,1.533856 -3.45312,2.246094 -1.45283,0.858352 -2.882026,1.755223 -4.304692,2.662109 -2.051596,1.664162 -4.140225,3.281018 -6.220703,4.908203 -0.739609,0.89534 -1.501186,1.772375 -2.287109,2.632813 -2.017508,2.161873 -4.0433,4.317013 -6.050782,6.488281 -0.89183,0.964593 -1.806455,1.373207 -2.576172,1.390625 -0.03433,0.03605 -0.05771,0.07131 -0.09375,0.107422 -2.257012,2.261301 -4.590421,4.448338 -6.925781,6.628906 -3.06126,2.855133 -5.979665,5.854149 -8.742187,8.998047 -0.37638,0.437391 -0.760032,0.868786 -1.146485,1.296875 -0.119337,0.22173 -0.161996,0.314891 -0.474609,0.896485 -0.4873,0.906582 -1.110738,1.325735 -1.681641,1.419921 -0.819704,0.863916 -1.642106,1.727044 -2.460937,2.591797 -0.605169,0.924772 -1.201353,1.855474 -1.810547,2.777344 -2.286888,3.58578 -4.540955,7.19259 -6.708984,10.85156 -2.281409,3.89705 -4.48902,7.83617 -6.734375,11.75391 -2.093972,3.70625 -4.367038,7.30698 -6.619141,10.91797 -2.316368,3.69819 -4.710608,7.34583 -7.107422,10.99218 -0.231787,0.3507 -0.448921,0.71063 -0.675781,1.06446 -0.42092,0.99564 -0.856794,1.98531 -1.292969,2.97461 -0.259067,0.55444 -0.499266,1.11672 -0.734375,1.68164 -0.300691,1.31477 -0.624152,2.62409 -0.966797,3.92773 -1.290312,4.71041 -2.856132,9.33317 -4.5,13.92969 -0.341991,0.9721 -0.682926,1.94538 -1.023437,2.91797 0.848728,3.46659 2.126953,6.77981 2.126953,10.63281 0,0.52791 0.103531,1.06633 0,1.58399 -0.619796,3.09898 -3.682745,9.30556 -0.951172,12.0371 L 143.16797,62.082031 C 133.53118,56.730136 123.40956,53.041122 112.81445,50.568359 Z M 33.507812,120.73438 c -0.283177,0.3635 -0.578721,0.71682 -0.857421,1.08398 -0.02291,0.12123 -0.04749,0.24413 -0.07031,0.36523 0.311247,-0.48191 0.620781,-0.96457 0.927734,-1.44921 z" /><path
         style="fill:#88aa00;fill-opacity:1"
         d="m 114.66142,70.317222 c -10.46599,2.621555 -19.276576,9.502697 -27.240008,16.470701 -1.589163,1.390517 -3.574762,2.307784 -5.067908,3.800931 -0.746574,0.746573 -1.153892,1.787381 -1.900466,2.533954 -1.907568,1.907568 -4.646808,2.957812 -6.334885,5.067908 -1.283857,1.604821 -2.477882,3.744854 -3.800931,5.067904"
         id="path37"
         transform="translate(-2.533954,-0.63348849)" /></g><path
       id="path148"
       style="fill:#000000;fill-opacity:1;stroke:none;stroke-width:6.67638;stroke-dasharray:none;stroke-opacity:1"
       d="M 25.179349,144.60979 C 7.5831388,177.50677 -3.9886072,218.05216 -3.0036715,267.1721 c -0.011434,0.0734 -0.022409,0.14603 -0.035038,0.2185 0.1073552,0.34891 0.1936036,0.72243 0.2411492,1.14035 0.2608111,2.2992 0.4126652,4.57054 0.3541042,6.85438 -0.1147352,1.11066 -0.2767931,2.21185 -0.4256341,3.3155 0.00218,0.0662 0.010651,0.12555 0.012087,0.19299 0.021888,1.47967 0.1220099,2.96336 0.1558469,4.44434 0.035386,1.38841 0.041957,2.77852 0.1412935,4.17051 0.032565,1.43947 0.09699,2.8843 0.075702,4.31913 -0.012112,0.24976 -0.033313,0.49882 -0.051798,0.7474 0.089819,0.50476 0.1950256,1.0084 0.2766982,1.51376 0.153647,1.57971 0.2438543,3.1571 0.22691,4.72756 -0.002,0.0775 -0.00641,0.15486 -0.00841,0.23212 0.2008765,0.63732 0.4053377,1.27473 0.6064612,1.91097 0.99979168,2.27233 1.34904618,4.60161 1.61330748,6.96248 0.096015,1.0561 0.1447233,2.11034 0.2092841,3.16523 0.027704,0.13827 0.051634,0.27761 0.080501,0.41616 0.1141526,0.55461 0.1183469,1.0299 0.042784,1.42735 0.00609,0.13058 0.018994,0.26187 0.025695,0.39308 1.36102692,6.7051 2.69431762,13.41288 4.25608192,20.09775 1.7980722,6.48254 0.9058922,3.29519 2.6833722,9.5616 0.58091,2.0481 0.752998,3.84156 0.633346,5.3862 0.634243,1.39222 1.344313,2.76213 2.0165357,4.14331 0.367242,1.32412 0.700754,2.62899 1.084591,3.9626 10.460874,-2.18379 21.121938,-3.73493 31.674884,-5.63292 2.57202,-0.56354 2.957605,-0.65656 3.775168,-0.83564 C 36.300525,317.62318 -2.764356,161.04677 173.50279,62.219644 c -3.61588,-6.40502 -7.33025,-12.766946 -11.53303,-18.901571 -0.42428,-0.649755 -0.84265,-1.311372 -1.2642,-1.964626 l 5.8e-4,-0.0019 c -0.84152,-1.304885 -1.6872,-2.610764 -2.52586,-3.923225 l 0.008,-0.0023 c -0.88466,-1.386687 -1.77512,-2.766291 -2.67035,-4.150645 -0.0101,0.0046 -0.019,0.01102 -0.0313,0.01418 -1.31967,-2.03721 -2.63317,-4.078835 -4.01299,-6.08193 C 126.04267,39.213612 62.618188,74.614165 25.177896,144.61071 Z M 177.54397,21.400003 c 0.19566,0.189106 0.39294,0.376204 0.58836,0.565454 l 1.15461,-0.897498 c -0.58107,0.109588 -1.16175,0.221809 -1.74301,0.332294 z M 123.04192,199.82643 c -1.16849,2.1589 -2.30086,4.36594 -3.39375,6.6242 -14.49564,29.87254 -22.27671,68.43476 -15.45487,117.66381 2.43671,-0.6245 4.86105,-1.28329 7.27635,-1.96071 l 0.002,0.008 c 0.0709,-0.0204 0.14044,-0.0441 0.2114,-0.0632 3.18834,-0.8961 6.3535,-1.84235 9.51576,-2.80088 4.3332,-1.31572 8.65523,-2.65828 12.96842,-4.01497 3.07313,-0.97303 6.1375,-1.96655 9.19904,-2.96447 l -0.002,-0.008 c 1.10986,-0.36183 2.22361,-0.71538 3.33252,-1.07913 -4.65886,-36.73011 -2.50487,-112.70129 81.35178,-159.69372 -1.59041,-1.44405 -3.04669,-3.52467 -4.12573,-6.32758 -0.01,-0.0332 -0.0255,-0.0613 -0.0364,-0.0921 -4.08574,-5.49255 -8.0975,-11.02957 -11.65512,-16.8099 -1.47626,-2.39966 -2.90976,-4.81965 -4.31145,-7.25176 -23.36751,11.22521 -61.17709,34.95333 -84.87793,78.77134 z m 81.57393,42.52171 c -0.42172,1.85888 -0.96245,3.68507 -1.44478,5.52569 -0.60671,2.4702 -1.43864,4.86233 -2.35832,7.21836 -0.58897,1.58234 -0.93334,3.25317 -1.42401,4.8707 -0.18537,0.61833 -0.3183,1.24796 -0.42319,1.88684 -0.0206,0.12702 -0.0341,0.25493 -0.0524,0.38204 -0.0884,0.60583 -0.16389,1.21347 -0.21396,1.8273 -0.0298,0.41736 -0.0744,0.82941 -0.1326,1.23818 8.5e-4,0.008 -0.002,0.0146 -0.005,0.0263 -0.0575,0.40081 -0.12999,0.79788 -0.20978,1.19341 -0.008,0.0173 -0.008,0.033 -0.009,0.0491 0.11839,1.82857 0.26762,3.65657 0.41496,5.4854 0.0197,0.26889 0.0417,0.53764 0.0626,0.80642 0.17324,2.68071 0.41481,5.35927 0.74364,8.04184 0.0382,0.52128 0.0956,1.03846 0.17702,1.55589 0.0809,0.51746 0.18204,1.03499 0.29725,1.54918 0.0979,0.43374 0.21082,0.86604 0.32775,1.29781 0.0514,0.18827 0.10392,0.37747 0.15877,0.56562 0.10943,0.37881 0.22378,0.76079 0.34448,1.13784 0.005,0.021 0.0128,0.0443 0.0216,0.0658 3.4e-4,9.6e-4 4e-4,9.4e-4 0.002,0.008 0.77922,-0.1406 1.55341,-0.29444 2.32542,-0.44556 0.47679,-0.0931 0.94894,-0.19407 1.42308,-0.29521 9.8e-4,-2e-4 0.008,-8.6e-4 0.0106,-0.002 0.20199,-0.0454 0.40347,-0.0898 0.60545,-0.13514 0.0376,-0.009 0.0751,-0.0171 0.11419,-0.0229 0.078,-0.0166 0.15551,-0.0342 0.23368,-0.0508 0.15304,-0.0337 0.30744,-0.0672 0.45968,-0.10289 9.6e-4,-2.8e-4 0.0106,-0.002 0.0142,-0.005 9.7e-4,-2.8e-4 0.0106,-0.002 0.0142,-0.005 0.39962,-0.0934 0.79683,-0.18731 1.19532,-0.28311 0.53016,-0.12976 1.06239,-0.26374 1.5894,-0.40195 0.0142,-0.005 0.0254,-0.001 0.0379,-0.005 l -0.0107,-0.0263 c 0.79772,-0.20959 1.59765,-0.41027 2.38949,-0.63435 1.05746,-0.46759 2.12163,-0.92865 3.17597,-1.40162 1.12338,-0.50398 2.12368,-0.61607 2.94115,-0.47276 0.61572,-0.22008 1.2239,-0.45571 1.82161,-0.71078 0.59687,-0.25511 1.18787,-0.53275 1.75863,-0.837 -0.0456,-1.56031 -0.0453,-3.11659 0.026,-4.65613 l -0.002,-0.008 c 0.0237,-0.5109 0.0576,-1.01956 0.098,-1.52727 0.16336,-2.0396 0.47059,-4.05007 0.97554,-6.01954 -8.5e-4,-0.008 0.002,-0.0147 0.003,-0.0202 -0.0364,-0.42413 -0.0625,-0.84724 -0.0692,-1.26844 -0.001,-0.005 0.002,-0.0116 0.002,-0.0165 -0.0121,-0.85046 0.0377,-1.69598 0.13798,-2.5322 l 7.6e-4,-10e-4 c 0.0508,-0.419 0.1131,-0.83417 0.18821,-1.24889 0.0866,-0.43535 0.17061,-0.86986 0.26166,-1.30466 0.30036,-1.43637 0.659,-2.85354 1.30148,-4.16973 0.47282,-1.08511 0.98576,-2.14974 1.51689,-3.20541 0.53266,-1.05499 1.08098,-2.10418 1.62881,-3.15253 l 3.05426,-5.91207 c 0.56342,-1.09562 1.29981,-1.75996 2.05096,-2.07157 0.7775,-1.25561 1.58645,-2.49205 2.55135,-3.62267 1.52195,-1.71532 3.10791,-3.38817 4.80026,-4.95579 1.99533,-1.69582 4.05396,-3.35514 6.336,-4.72457 0.76663,-0.45977 1.49003,-0.70063 2.14483,-0.77553 -0.79271,-1.32316 -1.56147,-2.65734 -2.315,-3.9969 -1.1231,-1.90527 -2.2854,-3.79194 -3.35899,-5.71932 l -0.001,-7.5e-4 c -0.34341,-0.6468 -0.7137,-1.28142 -1.09812,-1.90847 -0.0385,-0.0614 -0.079,-0.12135 -0.11641,-0.18379 -0.74382,-1.20213 -1.53155,-2.38263 -2.29091,-3.57989 -0.7739,-1.13084 -1.60908,-2.22396 -2.45123,-3.31268 -1.62279,0.69222 -3.5343,1.55896 -5.62241,2.58835 -1.53462,1.39232 -3.11723,2.73624 -4.65225,4.12994 -2.37363,2.09242 -4.7659,4.17412 -7.02236,6.37693 -2.35068,1.89669 -4.34996,4.09542 -6.25888,6.37676 -1.76077,2.13874 -3.34157,4.39638 -4.93079,6.6537 -0.44927,0.6383 -0.94879,1.0803 -1.45322,1.38922 z" /><g
       id="g225"
       transform="matrix(2.2161192,0,0,2.2161192,-293.72802,-242.36068)"><ellipse
         style="fill:none;fill-opacity:1;stroke:#000000;stroke-width:1.66789;stroke-dasharray:none;stroke-opacity:1"
         id="path146"
         cx="271.793"
         cy="254.09206"
         rx="28.388069"
         ry="25.842411" /><ellipse
         style="fill:none;fill-opacity:1;stroke:#000000;stroke-width:2.22833;stroke-dasharray:none;stroke-opacity:1"
         id="path146-9"
         cx="271.93222"
         cy="255.73491"
         rx="37.926922"
         ry="34.525883" /><ellipse
         style="fill:none;fill-opacity:1;stroke:#000000;stroke-width:1.05397;stroke-dasharray:none;stroke-opacity:1"
         id="path146-7"
         cx="272.66501"
         cy="253.5224"
         rx="17.938948"
         ry="16.330299" /><path
         id="path138"
         style="fill:#d40000;fill-opacity:1;stroke-width:1.18915"
         d="m 273.25772,110.15221 a 52.355254,52.355254 0 0 0 -52.35573,52.35572 52.355254,52.355254 0 0 0 13.72378,35.22159 l 38.63195,64.21831 35.94092,-61.33878 c -0.0363,-0.023 -0.0588,-0.0685 -0.0932,-0.0952 a 52.355254,52.355254 0 0 0 16.50797,-38.00579 52.355254,52.355254 0 0 0 -52.35572,-52.35574 z" /><circle
         style="fill:#e6e6e6;fill-opacity:1;stroke:#000000;stroke-width:2.04277;stroke-dasharray:none;stroke-opacity:1"
         id="path147"
         cx="273.03354"
         cy="159.6391"
         r="28.885595" /></g></g></svg>

                    <h1 class="text-3xl sm:text-4xl 2xl:text-5xl font-extrabold ps-0 sm:ps-4 text-center sm:text-left text-sky-950 text-balance place-content-center tracking-wider">
                        System lokalizacji pojazdów
                    </h1>
                    </header>
                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8 grid-rows-none lg:grid-rows-3 ">
                            <div class="row-span-4 order-2 lg:order-none flex flex-col items-start overflow-hidden rounded-lg h-full bg-white lg:mx-12 shadow-xl ring ring-sky-900 md:row-span-3">
                            <img src="{{ Storage::url('mapa.jpg') }}" alt="Mapa przykład" class="object-cover h-full"/>

                            </div>
                            @if (Route::has('login'))

                            @auth
                                <a href="{{ url('/dashboard') }}" class="row-span-1 group flex flex-col items-start gap-2 sm:gap-4 rounded-lg bg-white p-8 py-10 shadow-xl ring-4 ring-lime-600 transition ease-in-out duration-300  hover:ring-lime-400 lg:pb-10">
                                    <div class="flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-8 text-lime-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                          </svg>

                                        <h2 class="ms-3 lg:text-xl font-bold text-gray-900">
                                            <div  class="tracking-wide flex flex-col border-lime-600
                                                    group-hover:text-sky-700 transition-all duration-300 truncate text-sky-950">
                                                    <div class="flex flex-row place-content-center justify-center place-items-center">
                                                        Przejdź do panelu

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                                          </svg>

                                                    </div>

                                                    <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 "></div>
                                                </div>
                                        </h2>
                                    </div>

                                    <p class="text-gray-800 text-xs sm:text-base leading-relaxed">
                                        Przejdź do panelu twojego profilu systemu lokalizacji pojazdów.
                                    </p>

                                </a>
                            @else
                            <a href="{{ route('login') }}" class="row-span-1 group flex flex-col items-start gap-2 sm:gap-4 rounded-lg bg-white py-4 sm:py-6 p-6 shadow-xl ring-4 ring-lime-600 transition ease-in-out duration-300  hover:ring-lime-400  lg:pb-10">
                                <div class="flex items-center">

                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-8 text-lime-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                      </svg>

                                    <h2 class="ms-3 lg:text-xl font-bold text-gray-900">
                                        <div  class="tracking-wide flex flex-col border-lime-600
                                                group-hover:text-sky-700 transition-all duration-300 truncate text-sky-950">
                                                <div class="flex flex-row place-content-center justify-center place-items-center">
                                                    Logowanie
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                                      </svg>
                                                </div>
                                                <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 "></div>
                                            </div>
                                    </h2>
                                </div>

                                <p class="text-gray-800 text-xs sm:text-base leading-relaxed">
                                    Masz już konto? Zaloguj się, <br> aby korzystać z twojego profilu w systemie.
                                </p>

                            </a>
                            @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="row-span-1 group flex flex-col items-start gap-2 sm:gap-4 rounded-lg bg-white py-4 sm:py-6 p-6 shadow-xl ring-2  ring-gray-200 transition ease-in-out duration-300 hover:ring-gray-400 lg:pb-10">
                                <div class="flex items-center">

                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-8 text-lime-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                      </svg>

                                    <h2 class="ms-3 lg:text-xl font-bold text-gray-900">
                                        <div  class="tracking-wide flex flex-col border-lime-600
                                                group-hover:text-sky-700 transition-all duration-300 truncate text-sky-950">
                                                <div class="flex flex-row place-content-center justify-center place-items-center">
                                                    Rejestracja

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                                      </svg>

                                                </div>

                                                <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 "></div>
                                            </div>
                                    </h2>
                                </div>
                                <p class="text-gray-500 text-xs sm:text-base leading-relaxed ">
                                    Nie masz konta? Stwórz nowe już teraz, <br>aby korzystać z pełni możliwości systemu!
                                </p>

                            </a>
                            @endif
                            @endauth

                    @endif

                        </div>
                    </main>

                    <footer class="flex flex-row justify-center py-16 text-center text-sm text-sky-950 font-semibold">
                        By Dominik But | &nbsp;
                        <a href="{{ route('about') }}" class="flex flex-row place-content-center justify-start place-items-center tracking-wide border-lime-600 hover:text-sky-700 transition-all duration-300 truncate text-sky-950 cursor-pointer underline">
                             Informacje o systemie
                        </a>
                    </footer>
                </div>
            </div>
            <div class="absolute left-1/2 top-[10rem] -z-10 -translate-x-1/2 blur-3xl xl:top-16" aria-hidden="true">
                <div class="aspect-[1155/678] w-96 sm:w-[40rem] xl:w-[70rem] bg-gradient-to-tl from-lime-500 to-lime-300 opacity-80" style="clip-path: polygon(24.1% 24.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 50.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 28.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                <div class="absolute right-1/2 top-[20rem] xl:top-[15rem] -z-10 -translate-x-1/2 blur-3xl " aria-hidden="true">
                    <div class="aspect-[1155/678] w-96 sm:w-[40rem] xl:w-[70rem] bg-gradient-to-tl from-lime-500 to-lime-300 opacity-80" style="clip-path: polygon(24.1% 24.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 50.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 28.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
              </div>
        </div>
    </body>
</html>
