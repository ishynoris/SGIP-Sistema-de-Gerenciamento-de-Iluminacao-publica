require(["esri/map",
    "./src/geojsonlayer.js",
    "esri/renderers/SimpleRenderer",
    "dojo/on",
    "dojo/query",
    "dojo/dom",
    "dojo/domReady!"],
    function (Map, GeoJsonLayer, SimpleRenderer, on, query, dom) {

        // Create map
        var map = new Map("mapDiv", {
            basemap: "gray",
            center: [-37, -10.9],
            zoom: 10
        });

        map.infoWindow.domNode.className += " light";
        map.on("load", function () {
            addGeoJsonLayer("json.php");
        });

        function selectGeoJsonData(e) {
            var url;
            if (e.target.nodeName === "SELECT") {
                url = dom.byId("geoJsonUrl").value = e.target.options[e.target.selectedIndex].value;
            } else {
                url = dom.byId("geoJsonUrl").value;
            }
            addGeoJsonLayer(url);
        }

        function addGeoJsonLayer(url) {
            var geoJsonLayer = new GeoJsonLayer({
                url: url 
            });
            geoJsonLayer.on("update-end", function (e) {
                map.setExtent(e.target.extent.expand(1.2));
            });
            map.addLayer(geoJsonLayer);

        }

        function removeAllLayers() {
            var i, lyr, ids = map.graphicsLayerIds;
            for (i = ids.length -1; i > -1; i--) {
                lyr = map.getLayer(ids[i]);
                map.removeLayer(lyr);
            }
            map.infoWindow.hide();
        }

        on(dom.byId("selGeoJson"), "change", selectGeoJsonData);
        on(dom.byId("btnAdd"), "click", selectGeoJsonData);
        on(dom.byId("btnRemove"), "click", removeAllLayers);

        on(query(".panel-heading")[0], "click", function () {
            if (query(".glyphicon.glyphicon-chevron-up")[0]) {
                query(".glyphicon").replaceClass("glyphicon-chevron-down", "glyphicon-chevron-up");
                query(".panel-body.collapse").removeClass("in");
            } else {
                query(".glyphicon").replaceClass("glyphicon-chevron-up", "glyphicon-chevron-down");
                query(".panel-body.collapse").addClass("in");
            }
        });
    }
);