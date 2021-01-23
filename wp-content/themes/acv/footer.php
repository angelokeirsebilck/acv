<footer class="Footer">
    <div class="Footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h2 class="Footer-subTitle">
                        Contact
                    </h2>
                    <div class="Footer-content">
                        <div class="Footer-item">
                            <i class="fas fa-map-marker-alt Footer-icon"></i>
                            <a href="" class="Footer-link">Herenweg 21 8300 Knokke-Heist (Westkapelle) België</a>
                        </div>
                        <div class="Footer-item">
                            <i class="fas fa-envelope Footer-icon"></i>
                            <a href="" class="Footer-link"><?php echo get_option('admin_email') ?></a>
                        </div>
                        <div class="Footer-item">
                            <i class="fas fa-phone-alt Footer-icon"></i>
                            <a href="" class="Footer-link"><?php echo get_option('support_phone') ?></a>
                        </div>
                        <div class="Footer-item">
                            <i class="fas fa-fax Footer-icon"></i>
                            <a href="" class="Footer-link"><?php echo get_option('support_fax') ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h2 class="Footer-subTitle">
                        Menu
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="Footer-bottom">
    </div>
</footer>
</div class="Wrapper">
<?php wp_footer(); ?>
</body>


</html>