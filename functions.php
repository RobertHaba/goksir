<?php 
    function goksir_files(){
        wp_enqueue_script('main-script', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
        wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css');
        wp_enqueue_style('goksir_main_styles', get_stylesheet_uri(), NULL, microtime());
        wp_enqueue_style('goksir_font_styles', get_theme_file_uri('/fonts/montserrat.css') , NULL, microtime());
        
        require_once('inc/sortPosts.php');
    };
    function themename_custom_logo_setup() {
        $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        );
        add_theme_support( 'custom-logo', $defaults );
       }
       add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
    function goksir_features(){
        add_theme_support( 'custom-logo' );
        register_nav_menus(
            array(
            'navbar-menu' => __( 'Menu główne' ),
            'footer-menu-information' => __( 'Menu informacje' )
            )
        );
        add_theme_support('title-tag');
    }
    
    add_action( 'after_setup_theme', 'goksir_features' );
    require_once get_template_directory() . '/inc/customizer.php';



    function disable_wp_auto_p( $content ) {
        if ( is_singular( 'page' ) ) {
          remove_filter( 'the_content', 'wpautop' );
          remove_filter( 'the_excerpt', 'wpautop' );
        }
        return $content;
      }
      add_filter( 'the_content', 'disable_wp_auto_p', 0 );
    add_action('wp_enqueue_scripts','goksir_files');
    function currentYear(){
        return date('Y');
    }
    add_theme_support( 'post-thumbnails' ); 


// Popular script
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
  if ( !is_single() ) return;
  if ( empty ( $post_id) ) {
      global $post;
      $post_id = $post->ID;    
  }
  wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
  $count_key = 'wpb_post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0 View";
  }
  return $count.' Views';
}

// Gallery support
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
  
    if(empty($first_img)){ //Defines a default image
      $first_img = "/images/default.jpg";
    }
    return $first_img;
  }
  function catch_that_image_alt() {
      $image_id = get_post_thumbnail_id();
      $image_title = get_the_title($image_id);
      return  $image_title;
    }
    function get_first_paragraph(){
      global $post;
      
      $str = wpautop( get_the_content() );
      $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
      $str = strip_tags($str, '<a><strong><em>');
    
      return '<p>' . $str . '</p>';
    }

    function wcag_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

      // Add [aria-haspopup] and [aria-expanded] to menu items that have children
      $item_has_children = in_array( 'menu-item-has-children', $item->classes );
      if ( $item_has_children ) {
          $atts['aria-haspopup'] = "true";
          $atts['aria-expanded'] = "false";
      }
  
      return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'wcag_nav_menu_link_attributes', 10, 4 );

  
