<?php

get_header();

?>

<div id="main-content">
<article id="post-46776" class="post-46776 post type-post status-publish format-standard has-post-thumbnail hentry category-solar" style="min-height: 950px">
<div class="entry-content">
<p></p>
<style>
#main-header {
    background-color: #212228;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css"
    type="text/css" media="screen" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.min.js"></script>
<script src="<?php echo plugins_url() ?>/rep-finder/assets/jvectormap.js"></script>

<style>
    #rep-finder,
    #map {
        width: 100%;
        max-width: 1500px;
        margin: 0 auto;
    }

    #map {
        height: 600px;
    }
</style>


<div style="padding-top: 160px !important;"  id='rep-finder'>
    <div id="map" style="padding-top:20px; width: 60%; float: left;"></div>
    <div style="width: 40%; float:right; padding: 20px;">
        <h3 id="rep" style="padding-top:20px; font-weight: 700; font-size: 30px;">Select a state to view the representative for your region</h3>
        <h4 id="areas"></h4>
        <h4 id="email" style="text-decoration: underline;  font-weight: 700;"></h4>
        <h4 id="phone"></h4>
    </div>
</div>
<script>
    // Group states into Areas

    const regions =
        [
            { 
              name: 'AM Engineered Sales', 
              phone: '(513)-759-5611',
              email: '<a href="mailto:sales@amengineeredsales.com">sales@amengineeredsales.com</a>',
              color: '#EF5350', 
              codes: ["US-PA", "US-OH", "US-WV", "US-KY", "US-IN", "US-MI"] 
              },
            { 
              name: 'Borg General Sales', 
              phone: '(847)-640-4635',
              email: '<a href="mailto:preston@borggeneral.com">preston@borggeneral.com</a>',
              color: '#1B81A6', 
              codes: ["US-WI", "US-IL"] 
              },
            { 
              name: 'L-3', 
              phone: '(770)-565-1556',
              email: '<a href="mailto:John@L-3.com">John@L-3.com</a>',
              color: '#AB47BC', 
              codes: ["US-AR", "US-TN", "US-MS", "US-AL", "US-GA", "US-FL"] 
              },
            { 
              name: 'Lynn Elliott', 
              phone: '(713)-465-6366',
              email: '<a href="mailto:mcorso@lynnelliott.com">mcorso@lynnelliott.com</a>',
              color: '#E3CA09', 
              codes: ["US-NM", "US-OK", "US-TX", "US-LA"] 
              },
            { 
              name: 'EMPOWER Sales', 
              phone: '(760)-324-1555',
              email: '<a href="mailto:wcarroll@empowersales.net">wcarroll@empowersales.net</a>',
              color: '#5C6BC0', 
              codes: ["US-WA", "US-MT", "US-ID", "US-OR", "US-UT", "US-AZ"] 
              },
            { 
              name: 'Ponton', 
              phone: "(714)-998-9073",
              email: '<a href="mailto:info@pontonind.com">info@pontonind.com</a>',
              color: '#42A5F5', 
              codes: ["US-NV", "US-CA", "US-HI"] }
        ];

    const codeColors = {};
    regions.forEach(region => {
        region.codes.forEach(code => {
            codeColors[code] = region.color;
        });
    });

    function selectArea(code) {
        const region = regions.find(region => region.codes.includes(code));
            $("#rep").html("Select a state to view the representative for your region");
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
</article>
</div>

</div>

<?php

get_footer();
