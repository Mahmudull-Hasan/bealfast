<?php

if ( site_url() == "http://localhost/belfast") {
    define( "VERSION", time());
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}

function bealfast_theme_support(){
    load_theme_textdomain('bealfast', get_template_directory(). '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    //Menus
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'bealfast'),
        'footer-menu' => __('Footer Menu', 'bealfast'),
    ));
}
add_action('after_setup_theme','bealfast_theme_support');

function bealfast_theme_assets(){
    wp_enqueue_style('font-aweosome', get_theme_file_uri('/assets/css/font-awesome.min.css'), array(), '1.0', 'all');
    wp_enqueue_style('bootstrap-min-css', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), '1.0', 'all');
    wp_enqueue_style('owl-css', get_theme_file_uri('/assets/css/owl.css'), array(), '1.0', 'all');
    wp_enqueue_style('style-css', get_theme_file_uri('/assets/css/style.css'), array(), VERSION, 'all');
    wp_enqueue_style('responsive-css', get_theme_file_uri('/assets/css/responsive.css'), array(), '1.0', 'all');
    wp_enqueue_style( "bealfast", get_stylesheet_uri(), null, VERSION );


    //bealfast js load//
    wp_enqueue_script('jquery-2.1.4', get_theme_file_uri('/assets/js/jquery-2.1.4.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('bootstrap-min-js', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('owl-carousel-min-js', get_theme_file_uri('/assets/js/owl.carousel.min.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('wow-js', get_theme_file_uri('/assets/js/wow.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('script-js', get_theme_file_uri('/assets/js/script.js'), array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'bealfast_theme_assets');

/**
 * Add Main sidebar 
 */
function bealfast_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'bealfast' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'bealfast' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<div class="sidebar-title">',
        'after_title'   => '</div>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Sidebar', 'bealfast' ),
        'id'            => 'contact-sidebar',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'bealfast' ),
        'before_widget' => '<li id="%1$s" class="widget sidebar-content">',
        'after_widget'  => '</li>',
        'before_title'  => '<div class="sidebar-title">',
        'after_title'   => '</div>',
    ) );
}
add_action( 'widgets_init', 'bealfast_slug_widgets_init' );


// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );



//Author Widget part//

class Author_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'author-widget',  // Base ID
            __('Author Widget')   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Author_Widget' );
        });
 
    }
 
    public function widget( $args, $instance ) {

        $widget_id = 'widget_'. $args['widget_id'];
        $author_image = get_field('author_image', $widget_id);
        $author_name = get_field('author_name', $widget_id);
        $author_description = get_field('author_description', $widget_id);
        $author_socials = get_field('author_socials', $widget_id);

 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
            <div class="sidebar-about centred"> 
                <figure class="img-box"><img src="<?php echo $author_image['url'] ?>" alt=""></figure>
                <h5 class="name"><?php echo $author_name; ?></h5>
                <div class="text"><?php echo $author_description; ?></div>
                <ul class="social-link">
                    <?php
                        foreach ($author_socials as $author_social) {
                    ?>
                        <li><a href="<?php echo $author_social['icon_url'];?>"><i class="<?php echo $author_social['icon_name'];?>"></i></a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>

        <?php

 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'bealfast' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
       
 
        return $instance;
    }
 
}
$author_widget = new Author_Widget();



//Letest Posts Widget part//

class Letest_Post_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'letest-post-widget',  // Base ID
            __('Letest Post Widget')   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Letest_Post_Widget' );
        });
 
    }
 
    public function widget( $args, $instance ) {

        $widget_id = 'widget_'. $args['widget_id'];
        $post_show_count = get_field('post_show_count', $widget_id);
        $post_order = get_field('post_order', $widget_id);
        $show_date = get_field('show_date', $widget_id);

        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
            <div class="sidebar-post">

                <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $post_show_count,
                        'order' => $post_order
                    );
                    $query = new WP_Query($args);
                    while($query->have_posts()){
                        $query->the_post();
                ?>
                    <div class="single-post">
                        <div class="img-box"><a href="<?php the_permalink();?>"><figure><img src="<?php the_post_thumbnail_url();?>" alt=""></figure></a></div>
                        <h6><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h6>
                        <?php
                            if($show_date){
                        ?>
                         <div class="text"><?php the_date(); ?></div>
                        <?php
                            }
                        ?>
                        
                    </div>
                <?php
                    }
                ?>

            </div>

        <?php
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'bealfast' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
       
 
        return $instance;
    }
 
}
$letest_post_widget = new Letest_Post_Widget();



//Newsletter Widget part//

class Newsletter_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'newsletter-widget',  // Base ID
            __('Newsletter Widget')   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Newsletter_Widget' );
        });
 
    }
 
    public function widget( $args, $instance ) {

        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
            <div class="sidebar-newsletter centred">
                <?php echo do_shortcode('[contact-form-7 id="48" title="Contact form 1"]');?>
            </div>

        <?php
        
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'bealfast' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
       
 
        return $instance;
    }
 
}
$letest_post_widget = new Newsletter_Widget();





//category Widget part//

class Bealfast_Category_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'bealfast-category-widget',  // Base ID
            __('Bealfast Category Widget')   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Bealfast_Category_Widget' );
        });
 
    }
 
    public function widget( $args, $instance ) {

        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
            <div class="sidebar-categories">
                <ul class="categories-list">
                    <?php 
                        $categories = get_categories();
                        foreach ($categories as $cat) {
                    ?> 
                        <li><a href="<?php echo $cat->slug;?>"><?php echo $cat->cat_name;?><span><?php echo $cat->category_count;?></span></a></li>                        
                    <?php
                    }
                    ?>
                </ul>
            </div>

        <?php
        
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'bealfast' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
       
 
        return $instance;
    }
 
}
$category_widget = new Bealfast_Category_Widget();


/*
comment form textarea
*/
function bealfast_comment_textarea_placeholder( $args ) {
	$args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="Your Comment Here"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'bealfast_comment_textarea_placeholder' );


/**
 * Comment Form Fields Placeholder
 */

function bealfast_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="Your Name*"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="YOur Email*"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Your Website"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'bealfast_comment_form_fields' );




// ACF Theme options page start here//

function acf_option_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {
        // Register options page.
        $parent = acf_add_options_page(array(
            'page_title'    => __('Theme Options', 'bealfast'),
            'menu_title'    => __('Theme Options', 'bealfast'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Header Options ', 'bealfast'),
            'menu_title'  => __('Header settings', 'bealfast'),
            'parent_slug' => $parent['menu_slug'],
        ));
        
        // Add sub home page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Home page ', 'bealfast'),
            'menu_title'  => __('Home page', 'bealfast'),
            'parent_slug' => $parent['menu_slug'],
        ));

        // Add sub About page.
        $child = acf_add_options_page(array(
            'page_title'  => __('About page ', 'bealfast'),
            'menu_title'  => __('About page', 'bealfast'),
            'parent_slug' => $parent['menu_slug'],
        ));

        
        // Add sub Contact page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Contact page ', 'bealfast'),
            'menu_title'  => __('Contact page', 'bealfast'),
            'parent_slug' => $parent['menu_slug'],
        ));

        // Add sub home page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Footer settings ', 'bealfast'),
            'menu_title'  => __('Footer settings', 'bealfast'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}
add_action('acf/init', 'acf_option_init');