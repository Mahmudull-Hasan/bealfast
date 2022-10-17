<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head();?>
</head>

<!-- page wrapper -->
<body class="boxed_wrapper" <?php body_class();?> >


    <!-- .preloader -->
    <!-- <div class="preloader"></div> -->
    <!-- /.preloader -->


    <!-- menu-area -->
    <header class="main-header header-style-four">
        
        <!-- header-top-style-two -->
        <div class="header-top-two">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <ul class="social-style-four in-block">
                            <?php
                                $socials = get_field('header_socials', 'options');
                                foreach ($socials as $social) {
                            ?>
                             <li><a href="<?php echo $social['url'];?>"><i class="fa <?php echo $social['icon'];?>"></i></a></li>
                            <?php
                                }

                            ?>
                            
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="logo-box centred">
                            <?php 
                             $image = get_field('header_logo', 'options');
                            ?>
                            <a class= "logo" href="<?php echo site_url();?>"><figure><img src="<?php echo $image['url'];?>" alt="logo"></figure></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="search-box">
                            <form action="index.html" method="post">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Search" required="">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- header-top-style-two -->


        <!-- main-menu -->
        <div class="theme_menu menu-area stricky centred">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 menu-column">
                        <div class="menu-area">
                            <nav class="main-menu">
                                <div class="navbar-header">     
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    
                                    <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'main-menu',
                                            'menu_class'     => 'navigation clearfix',
                                        ))
                                    ?>

                                    <!-- mobile menu -->
                                    <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'main-menu',
                                            'menu_class'     => 'mobile-menu clearfix',
                                        ))
                                    ?>
                                    <!-- mobile menu end -->
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
           </div>
        </div><!-- end main-menu -->
    </header>
    <!-- end menu-area -->