  

    <!-- instagram-section -->
    <section class="instagram-section centred">
        <div class="container">
            <div class="instagram-title"><?php the_field('instagram_title', 'options');?></div>
            <ul class="instagram-img-list clearfix">
                <li><a href="#"><figure><img src="<?php echo get_template_directory_uri();?>/assets/images/home/f1.jpg" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="<?php echo get_template_directory_uri();?>/assets/images/home/f2.jpg" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="<?php echo get_template_directory_uri();?>/assets/images/home/f3.jpg" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="<?php echo get_template_directory_uri();?>/assets/images/home/f4.jpg" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="<?php echo get_template_directory_uri();?>/assets/images/home/f5.jpg" alt=""></figure></a></li>
            </ul>
        </div>
    </section>
    <!-- instagram-section -->
    <footer class="footer-style-six sp-one">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 footer-column">
                    <div class="copyright"><?php echo the_field('copyright','options');?></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 footer-column">
                    <div class="footer-logo">
                        <?php
                         $footer_logo = get_field('footer_logo', 'options');
                        ?>
                        <a href="<?php echo site_url();?>"><figure><img src="<?php echo $footer_logo['url'];?>" alt="Logo"></figure></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 footer-column">
                    <ul class="social-style-seven pull-right in-block">
                        <?php 
                         $footer_socials = get_field('footer_socials', 'options');
                         foreach ($footer_socials as $social) {
                        ?>
                            <li><a href="<?php echo $social['url'];?>"><i class="fa <?php echo $social['icon'];?>"></i>&nbsp;&nbsp;<?php echo $social['name'];?></a></li>
                        <?php
                         }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>



<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-angle-up"></span></div>



<!--jquery js -->


</body><!-- End of .page_wrapper -->
<?php wp_footer();?>
</html>
