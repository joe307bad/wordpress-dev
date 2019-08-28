<?php

get_header();
?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css" type="text/css" media="screen"/>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.min.js"></script>
  <script src="http://jvectormap.com/js/jquery-jvectormap-us-aea.js"></script>
  
<style>
    #rep-finder, #map{
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }
    #map{
        height: 600px;
    }
    </style>


<div id='rep-finder'>
    <h3>Select a state to view the representative for your region</h3>
  <div id="map"></div>
  <h3 id="rep"></h3>
  <h4 id="areas"></h3>
</div>
  <script>
      // Group states into Areas
  var areas = [];
  areas[0] = [];
  areas[1] = { rep: "AM Engineered Sales", region: ["US-PA", "US-OH", "US-WV", "US-KY", "US-IN", "US-MI"] };
  areas[2] = { rep: "Borg General Sales", region: ["US-WI", "US-IL"] };
  areas[3] = { rep: "L3", region: ["US-AR", "US-TN", "US-MS", "US-AL", "US-GA", "US-FL"] };
  areas[4] = {rep: "Lynn Elliott", region: ["US-NM", "US-OK", "US-TX", "US-LA"] };
  areas[5] = { rep: "EMPOWER Sales", region: ["UA-WA", "US-MT", "US-ID", "US-OR", "US-UT", "US-AZ"] };
  areas[6] = { rep: "Ponton", region: ["US-NV", "US-CA"] };

  function selectArea(code){
    var mapObj = $("#map").vectorMap("get", "mapObject");
    areas.slice(1).forEach(function(area) {
        const region = area.region;
      if(region.indexOf(code)>-1) {
        mapObj.setSelectedRegions(area.region);
        $("#rep").html(area.rep)
        const regionNames = area.region.map(region => mapObj.getRegionName(region));
        $("#areas").html(regionNames.join(', '))
        return;
      }
    });
  }

  function clearAll(){
    var mapObj = $("#map").vectorMap("get", "mapObject");
    mapObj.clearSelectedRegions();
  }

  $("#map").vectorMap({
    map: "us_aea",
    backgroundColor: "aliceblue",
    zoomOnScroll: true,
    regionsSelectable: true,
    regionStyle: {
      initial: {
        fill: "lightgrey"
      },
      selected: {
        fill: "darkseagreen"
      }
    },
    onRegionClick: function(e, code){
      clearAll();
      selectArea(code);
      return false;
    }
  });

  (function () {
    // Collect the rest of the World
    var mapObj = $("#map").vectorMap("get", "mapObject");
    var states = areas.join(",");
    for(var code in mapObj.regions) {
      if(mapObj.regions.hasOwnProperty(code)) {
        if(states.indexOf(code) == -1) {
          areas[0].push(code);
        }
      }
    }
  })();
  </script>
  

<?php

get_footer();