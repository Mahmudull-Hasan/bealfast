<?php 

/*
* Template Name: Contact 
*/

get_header();?>
    <!-- contact section -->
    <section class="contact-section sp-eight">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 content-side">
                    <div class="blog-details-content">
                        <div class="contact-info">
                            <figure><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>"></figure>
                            <div class="lower-content">
                                <div class="title-top centred">

                                    <h3><?php the_field('address_title', 'options');?></h3>
                                    <div class="text"><span>Address:</span>  <?php the_field('address', 'options');?><br />
                                    <span>Phone:</span>  <?php the_field('phone', 'options');?></div>
                                </div>
                                <div class="text">
                                    <?php the_content();?>
                                </div>
                            </div>
                        </div>
                        <div class="contact-form-area">
                            <div class="title-text-two">FILL THE FORM</div>
                            <div >
                                <?php echo do_shortcode('[contact-form-7 id="100" title="Contact Form"]');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 sidebar-side">
                    <div class="sidebar-content">
                        <?php  dynamic_sidebar('contact-sidebar');?>
                        
                        
                        <div class="sidebar-instagram">
                            <div class="sidebar-title">INSTAGRAM</div>
                            <ul class="img-list clearfix"> 
                                <li><figure class="img-box"><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/home/i1.jpg" alt=""></a></figure></li>
                                <li><figure class="img-box"><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/home/i2.jpg" alt=""></a></figure></li>
                                <li><figure class="img-box"><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/home/i3.jpg" alt=""></a></figure></li>
                                <li><figure class="img-box"><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/home/i4.jpg" alt=""></a></figure></li>
                                <li><figure class="img-box"><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/home/i5.jpg" alt=""></a></figure></li>
                                <li><figure class="img-box"><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/home/i6.jpg" alt=""></a></figure></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section end -->

    
<?php get_footer();?>