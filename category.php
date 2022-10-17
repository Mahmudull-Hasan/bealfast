<?php get_header();?>

<!--Page Title-->
<section class="page-title centred">
    <div class="container">
        <h3 class="text"><?php the_title();?></h3>
    </div>
</section>
<!--End Page Title-->


<!-- blog-side -->
<section class="blog-side blog-style-one travel-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12 content-side">
                <div class="blog-details-content">
                    <div class="content-box overlay-item">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="<?php the_post_thumbnail_url();?>" alt=""></figure>
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="post1.html"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content-one sp-two">
                            <div class="top-content centred">
                                <div class="meta-text"><?php the_category();?></div>
                                <div class="title"><h3><a href="post1.html"><?php the_title();?></a></h3></div>
                                <div class="date"><span>On</span> <?php echo  get_the_date();?> &nbsp;&nbsp;
                                    <i class="flaticon-circle"></i>&nbsp;&nbsp;<span>By</span> 
                                    <?php 
                                        global $post;
                                        $author_id = $post->post_author;                            
                                        echo get_the_author_meta('display_name', $author_id);
                                    ?>
                                </div>
                            </div>
                            <div class="text">
                                <?php the_content();?>
                            </div>
                            <ul class="meta-list centred">
                                <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp; 37</a> &nbsp; <i class="flaticon-circle"></i> &nbsp; <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp; 20</a></li>
                                <li><a href="post1.html"><i class="flaticon-substract"></i> &nbsp; CONTINUE READING &nbsp; <i class="flaticon-substract"></i></a></li>
                                <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> &nbsp;Share</a></li>
                            </ul>
                        </div>
                    </div>
                <div class="row">

                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,

                        );
                        $query = new WP_Query($args);
                        while($query->have_posts()){
                            $query-> the_post();
                    ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="content-box overlay-item">
                                <div class="inner-box">
                                    <div class="image-box">
                                        
                                        <figure class="image"><img src="<?php echo the_post_thumbnail_url();?>" alt="<?php the_title();?>"></figure>
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-content-one blog-content-two sp-six centred">
                                    <div class="top-content">
                                        <div class="meta-text"><?php the_category();?></div>
                                        <div class="title"><h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4></div>
                                        <div class="date"><span>On</span> <?php the_date();?><i class="flaticon-circle"></i>&nbsp;&nbsp;<span>By</span> <?php the_author();?></div>
                                    </div>
                                    <div class="text">
                                        <?php the_excerpt();?>
                                    </div>
                                    <ul class="meta-list centred">
                                        <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp; <?php echo get_comments_number();?></a> &nbsp; <i class="flaticon-circle"></i> &nbsp; <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp; 13</a></li>
                                        <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> &nbsp;Share</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    <?php
                        }
                        wp_reset_postdata();
                    ?>
    
                </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 sidebar-side">
                <div class="sidebar-content">
                                    
                <?php dynamic_sidebar('sidebar-1');?>

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
                    
                    <div class="sidebar-img-content">
                        <?php 
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 2,
                                );
                                $query = new WP_Query($args);
                                while($query->have_posts()){
                                    $query-> the_post();
                                ?>
                                <div class="single-item">                            
                                    <figure class="img-box"><img src="<?php the_post_thumbnail_url();?>" alt=""></figure>
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="meta-text"><?php the_category();?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- single shop end -->
<?php get_footer();?>