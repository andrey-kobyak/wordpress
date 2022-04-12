
<?php
$lang = pll_current_language();
?>
</main>
<footer>
    <div class="footer__top">
        <section class="contact">
            <div class="container" id="3">
                <div class="row">
                    <div class="col-lg-5 contact-info">
                        <p>
                            <span class="title"><?php echo get_option('contacts-title') ?></span><br />
                            <?php echo get_option('adreess'); ?>
                        </p>
                        <p>
                            tel. kom: <a href="tel:<?php echo get_option('phone') ?>"><?php echo get_option('phone') ?></a><br />
                            e-mail: <a href="mailto:<?php bloginfo('admin_email') ?>"><?php bloginfo('admin_email') ?></a>
                        </p>
                        <p>
                            Biuro – <a href="tel:<?php echo get_option('buiro1') ?>"><?php echo get_option('buiro1') ?></a>
                            <a href="tel:<?php echo get_option('buiro2') ?>"><?php echo get_option('buiro2') ?></a><br />
                            Pomoc techniczna – <span class="rel"><a href="tel:<?php echo get_option('pomoc1') ?>"><?php echo get_option('pomoc1') ?></a>
                            <span class="small"><a href="tel:<?php echo get_option('pomoc2') ?>"><?php echo get_option('pomoc2') ?></a></span>
                            </span>
                        </p>
                    </div>
                    <div class="col-lg-6 offset-lg-1 contact-form">
                        <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="footer__bottom" id="4">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 map" id="map" style='width: 1920px; height: 570px;'></div>
                    <script>
                        mapboxgl.accessToken = "pk.eyJ1IjoiYWRyZXkiLCJhIjoiY2wxdXkxb2hqMDRsZjNmbDNsMzhkMDV3ZCJ9.t4urWsjWJ7opF79Y-NggBg";
                        /* Map: This represents the map on the page. */
                        var map = new mapboxgl.Map({
                            container: "map",
                            style: "mapbox://styles/adrey/cl1uycnty001d14t80xoaoywk",
                            zoom:14.0,
                            center: [21.1725,52.2014579]
                        });

                        map.on("load", function () {
                            /* Image: An image is loaded and added to the map. */
                            map.loadImage("/wp-content/uploads/2022/04/pin.png", function(error, image) {
                                if (error) throw error;
                                map.addImage("custom-marker", image);
                                /* Style layer: A style layer ties together the source and image and specifies how they are displayed on the map. */
                                map.addLayer({
                                    id: "markers",
                                    type: "symbol",
                                    /* Source: A data source specifies the geographic coordinate where the image marker gets placed. */
                                    source: {
                                        type: "geojson",
                                        data: {
                                            type: "FeatureCollection",
                                            features:[{"type":"Feature","geometry":{"type":"Point","coordinates":["21.172508799999996","52.2014579"]}}]}
                                    },
                                    layout: {
                                        "icon-image": "custom-marker",
                                    }
                                });
                            });
                        });
                    </script>
                    </div>
                </div>
            </div>
        </section>
    </div>
</footer>
<?php wp_footer() ?>
</body>
</html>
