<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="theme-col-lgor" content="#FFE3C8">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <meta name="robots" content="noindex">

    <title>Romulus Solar API First Test</title>

    <!-- CSS Framework -->
    <link rel="stylesheet" href="components/bootstrap/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        .header-title {
            font-size: 3rem; /* Increase the font size */
            text-align: center; /* Center the text */
            white-space: nowrap; /* Ensure the title is on one line */
        }
        .navbar-header, .header-title {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        header.container-fluid {
            padding: 10px 0; /* Reduce the header height */
        }
        .address_container {
            background-color:darkgreen; /* Match the header color */
        }
        .app_controls, #gsa_data {
            margin-bottom: 20px;
        }
    </style>

    <!-- JavaScript -->
    <!-- Library -->
    <script src="components/gc_solar_api_library/global.js" defer></script>
    <script src="components/gc_solar_api_library/geotiff.js" defer></script>
    <script src="components/gc_solar_api_library/solar_api.js" defer></script>
    <script src="components/gc_solar_api_library/maps.js" defer></script>
    <!-- Frameworks -->
    <script src="components/geotiff/geotiff.js" defer></script>
    <script src="components/proj4/proj4.js" defer></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnviA1e-SV87jaI_mUXuc45HLiUEMVFWI&loading=async&callback=onGoogleMapsLoaded&libraries=maps,marker&v=beta" defer></script>


</head>

<body>
    <!-- Page Header -->
    <header class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="col-lg-4 d-flex justify-content-center">
                <div class="navbar-header">
                    <a class="navbar-brand" href="https://www.google.com" title="Go Home">
                        <img src="/images/logo.jpg" class="mainLogo" alt="Google Logo" />
                    </a>
                </div>
            </div>
            <div class="col-lg d-flex align-items-center justify-content-center">
                <h1 class="header-title"><strong>Romulu's Company</strong></h1>
            </div>
        </div>
    </header>

    <!-- Google Solar API Address -->
    <div class="row address_container">
        <div class="col-2">
            <label for="property_address_input">Address: </label>
        </div>
        <div class="col">
            <input type="text" name="property_address_input" id="property_address_input">
        </div>
        <div class="col-2">
            <button onclick="getLatLong();">Get Solar Data</button>
        </div>
    </div>

    <!-- Google Maps API Container -->
    <div class="row">
        <div class="col-lg-8 google_map_container">
            <div id="map" class="google_map"></div>
            <div id="canvas_div"></div>
        </div>
        <div class="col-lg-4">
            <!-- Google Solar API Controls -->
            <div class="app_controls">
                <div id="overlayControlsSelect">
                    <label for="overlaySelect">Select Layer:</label><br />
                    <select id="overlaySelect">
                        <option value="0">DSM</option>
                        <option value="1">RGB</option>
                        <option value="2" selected>Annual Flux</option>
                        <option value="3">Monthly Flux</option>
                        <option value="4">Hourly Flux</option>
                    </select>
                </div>
                <div>
                    <label for="monthSelection">Month:</label><label for="monthSlider"><span id="monthName">July</span></label><br />
                    <input type="range" id="monthSlider" min="0" max="11" value="6" step="1">
                </div>
                <div>
                    <label for="hourSlider">Select Hour: <span id="hourDisplay">12 PM</span></label><br />
                    <input type="range" id="hourSlider" min="0" max="23" value="12" step="1">
                </div>
                <div>
                    <input type="checkbox" id="toggleAllOverlays" onclick="toggleAllOverlays()" checked> Display <br />Overlay
                </div>
            </div>

            <!-- Google Solar API Building Insights -->
            <div class="google_solar_api_data">
                <h2>Google Solar API Data</h2>
                <div id="gsa_data"></div>
                <div>
                    <label for="system_modules_watts">Module output (watts):</label><br />
                    <input type="number" name="system_modules_watts" id="system_modules_watts" value="395"><br />
                    <label for="system_modules_range">Modules:</label><br />
                    <input type="range" name="system_modules_range" id="system_modules_range" min="1" max="100">
                    <span id="modules_range_display_qty"></span>
                </div>
                <div>
                    <p>Total Output:<br />
                        <span id="modules_calculator_display"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>