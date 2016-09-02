<?php
/**
 * Contact Map
 */

$mapsapikey		= get_theme_mod('dubspress_contact_googlemapsapikey');
$x_coord		= get_theme_mod( 'dubspress_contact_mapx' );
$y_coord		= get_theme_mod( 'dubspress_contact_mapy' );
$zoom_factor	= get_theme_mod( 'dubspress_contact_mapzoom' );
$map_type		= get_theme_mod( 'dubspress_contact_maptype' );
$marker_title	= get_theme_mod( 'dubspress_contact_markertitle' );

/*
$map_color		= get_theme_mod( wp_get_theme()->name . '_contact_map_color' );
$default_color	= get_theme_mod( wp_get_theme()->name . '_contact_default_map' );

if ( $default_color ) {
    if ( empty( $map_color ) ) {
        $map_color = '';
    }
} else {
    $map_color = '';
}
*/

if ( empty( $x_coord ) ) {
    $x_coord = 45.256024;
}
if ( empty( $y_coord ) ) {
    $y_coord = 19.853861;
}
if ( empty( $zoom_factor ) ) {
    $zoom_factor = 15;
}
if ( empty( $map_type ) ) {
    $map_type = 'ROADMAP';
}

?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=<?php echo $mapsapikey; ?>"></script>
<figure class="map">
    <div id="map_canvas" style="width: 100%; height: 100%; min-height: 0px;" class="contact-img"></div>
</figure> <!-- /map -->

<?php /*if($map_color){ ?>
        <script type="text/javascript">

            var map;

            function initialize() {
                var styles = [
                    {
                        "stylers": [
                            { "hue": "<?php echo $map_color; ?>" }
                        ]
                    }
                ];

                var styledMap = new google.maps.StyledMapType(styles,
                    {name: "Styled Map"});

                var latlng = new google.maps.LatLng(<?php echo $x_coord?>, <?php echo $y_coord?>);

                var myOptions = {
                    zoom: <?php echo $zoom_factor ?>,
                    center: latlng,
                    mapTypeControl: false,
                    streetViewControl: false,
                    overviewMapControl: false,
                    mapTypeId: google.maps.MapTypeId.<?php echo $map_type?>,
                    scrollwheel: false
                };

                var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                map.mapTypes.set('map_style', styledMap);
                map.setMapTypeId('map_style');

                <?php if(!empty($marker_title)) { ?>
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title:"<?php echo $marker_title?>"
                });
                <?php }?>
            }
            google.maps.event.addDomListener(window, 'load', initialize);
                google.maps.event.addDomListener(window, "resize", function() {
                var center = map.getCenter();
                google.maps.event.trigger(map, "resize");
                map.setCenter(center);
            });
        </script>

    <?php } else { */?>

        <script type="text/javascript">

            var mapa;

            function initialize() {
                var latlng = new google.maps.LatLng(<?php echo $x_coord?>, <?php echo $y_coord?>);
                var myOptions = {
                    zoom: <?php echo $zoom_factor ?>,
                    center: latlng,
                    mapTypeControl: false,
                    streetViewControl: false,
                    overviewMapControl: false,
                    mapTypeId: google.maps.MapTypeId.<?php echo $map_type?>,
                    scrollwheel: false
                };

                mapa = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                <?php if(!empty($marker_title)) { ?>
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: mapa,
                            title:"<?php echo $marker_title?>"
                        });
                <?php }?>
            }
            google.maps.event.addDomListener(window, 'load', initialize);
                google.maps.event.addDomListener(window, "resize", function() {
                var center = mapa.getCenter();
                google.maps.event.trigger(mapa, "resize");
                mapa.setCenter(center);
            });
        </script>
		

    <?php/*}*/ ?>