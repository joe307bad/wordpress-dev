<?php

get_header();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css"
    type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo plugins_url() ?>/rep-finder/assets/rocket.css"
    type="text/css" media="screen" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.min.js"></script>
<script src="<?php echo plugins_url() ?>/rep-finder/assets/jvectormap.js"></script>

<style>
    #rep-finder,
    #map {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }

    #map {
        height: 600px;
    }
</style>


<div style="padding-top: 50px;" class="et_pb_section et_pb_section_0 et_pb_with_background et_section_regular et_pb_section_first" id='rep-finder'>
    <h3>Select a state to view the representative for your region</h3>
    <div id="map"></div>
    <h3 id="rep"></h3>
    <h4 id="areas">
        </h3>
        <h4 id="email"></h4>
        <h4 id="phone"></h4>
</div>
<script>
    // Group states into Areas

    const regions =
        [
            { 
              name: 'AM Engineered Sales', 
              phone: '(513)-759-5611',
              email: 'sales@amengineeredsales.com',
              color: '#EF5350', 
              codes: ["US-PA", "US-OH", "US-WV", "US-KY", "US-IN", "US-MI"] 
              },
            { 
              name: 'Borg General Sales', 
              phone: '(847)-640-4635',
              email: 'preston@borggeneral.com',
              color: '#EC407A', 
              codes: ["US-WI", "US-IL"] 
              },
            { 
              name: 'L-3', 
              phone: '(770)-565-1556',
              email: 'John@L-3.com',
              color: '#AB47BC', 
              codes: ["US-AR", "US-TN", "US-MS", "US-AL", "US-GA", "US-FL"] 
              },
            { 
              name: 'Lynn Elliott', 
              phone: '(713)-465-6366',
              email: 'mcorso@lynnelliott.com',
              color: '#7E57C2', 
              codes: ["US-NM", "US-OK", "US-TX", "US-LA"] 
              },
            { 
              name: 'EMPOWER Sales', 
              phone: '(760)-324-1555',
              email: 'wcarroll@empowersales.net',
              color: '#5C6BC0', 
              codes: ["US-WA", "US-MT", "US-ID", "US-OR", "US-UT", "US-AZ"] 
              },
            { 
              name: 'Ponton', 
              phone: "(714)-998-9073",
              email: "info@pontonind.com",
              color: '#42A5F5', 
              codes: ["US-NV", "US-CA"] }
        ];

    const codeColors = {};
    regions.forEach(region => {
        region.codes.forEach(code => {
            codeColors[code] = region.color;
        });
    });

    function selectArea(code) {
        const region = regions.find(region => region.codes.includes(code));
            $("#rep").html("");
            $("#areas").html("")
            $("#email").html("");
            $("#phone").html("")

        if (region) {
            const map = $("#map").vectorMap("get", "mapObject");
            const codes = region.codes;
            map.setSelectedRegions(codes);

            $("#rep").html(region.name);
            $("#areas")
            .html(codes.map(code => map.getRegionName(code)).join(', '))
            $("#phone").html(region.phone);
            $("#email")
            .html(region.email)
        }

    }

    function clearAll() {
        const map = $("#map").vectorMap("get", "mapObject");
        map.clearSelectedRegions();
    }

    const map = $("#map").vectorMap({
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
series: {
    regions: [{
        values: codeColors,
        attribute: 'fill'
    }]
},
        onRegionClick: function (e, code) {
            clearAll();
            selectArea(code);
            return false;
        }
    });

</script>


<?php

get_footer();

?>