<footer class="Footer">
    <h1 class="invisible">Footer</h1>
    <div class="Footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h2 class="Footer-subTitle">
                        Contact
                    </h2>
                    <div class="Footer-content">
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-map-marker-alt Footer-icon"></i>
                            </div>

                            <a href="https://maps.google.com/?q=<?php echo get_option('angelok_address') ?>" target="_blank" class="Footer-link"><?php echo get_option('angelok_address') ?></a>
                        </div>
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-envelope Footer-icon"></i>
                            </div>

                            <a href="mailto:<?php echo get_option('admin_email') ?>" class="Footer-link"><?php echo get_option('admin_email') ?></a>
                        </div>
                        <?php if (strlen(get_option('angelok_cellphone')) > 0) {?>
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-mobile-alt Footer-icon"></i>
                            </div>
                            <a href="tel:<?php echo get_option('angelok_cellphone') ?>" class="Footer-link"><?php echo get_option('angelok_cellphone') ?></a>
                        </div>
                        <?php } ?>
                        <?php if (strlen(get_option('angelok_phone')) > 0) {?>
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-phone-alt Footer-icon"></i>
                            </div>
                            <a href="tel:<?php echo get_option('angelok_phone') ?>" class="Footer-link"><?php echo get_option('angelok_phone') ?></a>

                        </div>
                        <?php } ?>
                        <?php if (strlen(get_option('angelok_fax')) > 0) {?>
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-fax Footer-icon"></i>
                            </div>
                            <div class="Footer-fax"><?php echo get_option('angelok_fax') ?>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-sm-6 Footer-menu">
                    <h2 class="Footer-subTitle">
                        Menu
                    </h2>
                    <div class="Footer-menuContainer">
                        <nav class="Nav--footer">
                            <h1 class='invisible'>Footer Nav</h1>
                            <?php wp_nav_menu(array( 'theme_location' => 'footer-menu' )); ?>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Footer-bottom">
        <div class="container">
            <div class="Footer-cp">
                &copy; <?php  echo date('Y');?>
                <?php echo get_option('blogname') ?>
            </div>
            <a href="<?php echo get_site_url() . '/privacy-policy' ?>" class="Footer-privacyPolicy">Privacy Policy</a>
            <div class="Footer-angelok">

            </div>
        </div>
    </div>
</footer>
</div class="Wrapper">
<?php

    if (is_page('Contact')) {
        ?>
<script>
    let geocoder = new google.maps.Geocoder();
    let map = new google.maps.Map(document.getElementById("GoogleMaps"), {
        center: {
            lat: -34.397,
            lng: 150.644
        },
        zoom: 16,
        styles: [{
                "featureType": "all",
                "stylers": [{
                        "saturation": 0
                    },
                    {
                        "hue": "#e7ecf0"
                    }
                ]
            },
            {
                "featureType": "road",
                "stylers": [{
                    "saturation": -70
                }]
            },
            {
                "featureType": "transit",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "poi",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "water",
                "stylers": [{
                        "visibility": "simplified"
                    },
                    {
                        "saturation": -60
                    }
                ]
            }
        ]
    });

    const address = document.querySelector('.GoogleMaps-invisAddress').innerHTML;
    const
        iconUrl =
        "<?php echo get_theme_file_uri('/images/marker.svg'); ?>";

    var icon = {
        url: iconUrl,
        scaledSize: new google.maps.Size(30, 30),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(10, 25)
    }
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            let marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                icon: icon
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
</script>

<?php
    }

?>
<?php wp_footer(); ?>
</body>


</html>