<?php get_header();?>
 
 <!-- blog side -->
 <section class="blog-side sp-seven blog-style-one standard-post sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12 content-side">
                <div class="blog-details-content">
                    <figure><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>"></figure>
                    <div class="blog-content-one sp-three">
                        <div class="top-content centred">
                            <div class="meta-text"><?php the_category();?></div>
                            <div class="title"><h3><?php the_title();?></h3></div>
                            <div class="date"><span>On</span> <?php echo get_the_date();?> &nbsp;&nbsp;     
                           
                                <i class="flaticon-circle"></i>&nbsp;&nbsp;<span>By</span> 
                                <?php 
                                    global $post;
                                    $author_id = $post->post_author;                            
                                    echo get_the_author_meta('display_name', $author_id);
                                ?>
                            </div>
                        </div>
                       <?php the_content();?>

                        <ul class="meta-list centred">
                            <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp; 37</a> &nbsp; <i class="flaticon-circle"></i> &nbsp; <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp; 20</a></li>
                            <li><a href="post1.html"><i class="flaticon-substract"></i> &nbsp; CONTINUE READING &nbsp; <i class="flaticon-substract"></i></a></li>
                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> &nbsp;Share</a></li>
                        </ul>
                    </div>
                    <div class="single-authore">
                        <div class="authore-img"><figure><img src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" alt=""></figure></div>
                        <div class="authore-title"><?php echo get_the_author_meta('display_name', $author_id); ?> - <span>Author</span></div>
                        <div class="text"><p><?php echo get_the_author_meta('user_description', $author_id); ?></div>
                        <ul class="social-link">
                            <?php
                                $socials_acc = get_field('social_account', 'user_'. $author_id);
                                foreach ($socials_acc as $social) {
                            ?>
                                <li><a href="<?php echo $social['social_url'];?>"><i class="<?php echo $social['social_icon'];?>"></i></a></li>
                            <?php
                                
                             }
                            ?>
                            

                        </ul>
                    </div>
                    <div class="related-post centred">
                        
                        <?php 
                            if($posts = get_field('posts')){
                        ?>
                        <div class="title-text-two">RELATED POSTS</div>
                        <div class="carousel-style-four nav-style-none dots-style-one">
                            <?php
                             $posts = get_field('posts');
                             foreach($posts as $post) {
                            ?>
                                <dgiv class="carousel-style-one">
                                    <figure><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>"></figure>
                                    <div class="lower-content">
                                        <div class="meta-text"><?php the_category();?></div>
                                        <div class="title"><h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6></div>
                                    </div>
                                </dgiv>
                            <?php
                             }
                            ?>                           
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>
                    <div class="comment-area">
                        <div class="title-text-two"><?php echo get_comments_number();?> COMMENTS</div>
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
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
                        <div class="single-item">
                            <figure class="img-box"><img src="<?php echo get_template_directory_uri();?>/assets/images/home/12.jpg" alt=""></figure>
                             <div class="inner-box">
                                <div class="content">
                                    <div class="meta-text"><a href="#">Travel</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="single-item">
                            <figure class="img-box"><img src="<?php echo get_template_directory_uri();?>/assets/images/home/13.jpg" alt=""></figure>
                             <div class="inner-box">
                                <div class="content">
                                    <div class="meta-text"><a href="#">MUSIC</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog side end -->

<?php get_footer();?>