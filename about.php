<?php 
/*
* Template Name: About page
*/

get_header();?>

<!-- about section -->
<section class="about-section sp-seven">
    <div class="container">
        <div class="img-box">
            <figure><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>"></figure>
        </div>
        <div class="about-content">
            <div class="title centred">
                <?php 
                    $name_designation = get_field('name_and_designation', 'options');
                ?>
                <h3><?php echo $name_designation['name'];?></h3>
                <div class="text"><?php echo $name_designation['designation'];?></div>
            </div>
            <div class="about-content-one">
                <?php the_content();?>
            </div>
            <div class="about-content-three">
                <div class="signature"><figure><img src="images/about/signature.png" alt=""></figure></div>
                <?php 
                    if($about_socials = get_field('about_social', 'options')){
                ?>
                    <ul class="social-style-one">
                        <?php
                            $about_socials = get_field('about_social', 'options');
                            foreach ($about_socials as $social) {
                        ?>
                            <li><a href="<?php echo $social['url'];?>"><i class="fa <?php echo $social['icon'];?>"></i></a></li>
                        <?php
                            }

                        ?>

                    </ul>
                <?php
                    }
                ?>

            </div>
        </div>
    </div>
</section>
<!-- about section end -->


<?php get_footer();?>