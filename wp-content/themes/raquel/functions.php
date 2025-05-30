<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once('library/bones.php');

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy()
{

  //Allow editor style.
  add_editor_style(get_stylesheet_directory_uri() . '/library/css/editor-style.css');

  // let's get language support going, if you need it
  load_theme_textdomain('bonestheme', get_template_directory() . '/library/translation');

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once('library/custom-post-type.php');

  // launching operation cleanup
  add_action('init', 'bones_head_cleanup');
  // A better title
  add_filter('wp_title', 'rw_title', 10, 3);
  // remove WP version from RSS
  add_filter('the_generator', 'bones_rss_version');
  // remove pesky injected css for recent comments widget
  add_filter('wp_head', 'bones_remove_wp_widget_recent_comments_style', 1);
  // clean up comment styles in the head
  add_action('wp_head', 'bones_remove_recent_comments_style', 1);
  // clean up gallery output in wp
  add_filter('gallery_style', 'bones_gallery_style');

  // enqueue base scripts and styles
  add_action('wp_enqueue_scripts', 'bones_scripts_and_styles', 999);
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action('widgets_init', 'bones_register_sidebars');

  // cleaning up random code around images
  add_filter('the_content', 'bones_filter_ptags_on_images');
  // cleaning up excerpt
  add_filter('excerpt_more', 'bones_excerpt_more');

} /* end bones ahoy */

// let's get this party started
add_action('after_setup_theme', 'bones_ahoy');


/************* OEMBED SIZE OPTIONS *************/

if (!isset($content_width)) {
  $content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size('bones-thumb-600', 600, 150, true);
add_image_size('bones-thumb-300', 300, 100, true);

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter('image_size_names_choose', 'bones_custom_image_sizes');

function bones_custom_image_sizes($sizes)
{
  return array_merge($sizes, array(
    'bones-thumb-600' => __('600px by 150px'),
    'bones-thumb-300' => __('300px by 100px'),
  ));
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize)
{
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action('customize_register', 'bones_theme_customizer');

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars()
{
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __('Sidebar 1', 'bonestheme'),
    'description' => __('The first (primary) sidebar.', 'bonestheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  /*
   to add more sidebars or widgetized areas, just copy
   and edit the above sidebar code. In order to call
   your new sidebar just use the following code:

   Just change the name to whatever your new
   sidebar's id is, for example:

   register_sidebar(array(
     'id' => 'sidebar2',
     'name' => __( 'Sidebar 2', 'bonestheme' ),
     'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
     'before_widget' => '<div id="%1$s" class="widget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<h4 class="widgettitle">',
     'after_title' => '</h4>',
   ));

   To call the sidebar in your template, you can just copy
   the sidebar.php file and rename it to your sidebar's name.
   So using the above example, it would be:
   sidebar-sidebar2.php

   */
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
        // create variable
        $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=40"
          class="load-gravatar avatar avatar-48 photo" height="40" width="40"
          src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__('<cite class="fn">%1$s</cite> %2$s', 'bonestheme'), get_comment_author_link(), edit_comment_link(__('(Edit)', 'bonestheme'), '  ', '')) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a
            href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?>
          </a></time>

      </header>
      <?php if ($comment->comment_approved == '0'): ?>
        <div class="alert alert-info">
          <p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
    <?php // </li> is added by WordPress automatically ?>
    <?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/

/*function bones_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');*/

/** 
 * ********************
 * block WP Enumeration
 * ********************
 *
 * Bloquea la Ruta /author y el Query String /?author= que viene por defecto de Wordpress
 * con una redirección 302 al home. Esto con el ánimo de mitigar vulnerabilidades conocidas del CMS.
 * 
 * @see No hacerlo si se desea contar con esta funcionalidad que es orientada a el Blogging.
 */

if (!is_admin()) {
  // default URL format
  if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING']) || is_author()) {
    wp_redirect(get_home_url());
    exit;
  }
  add_filter('redirect_canonical', 'smdigital_check_enum', 10, 2);
}

function smdigital_check_enum($redirect, $request)
{
  // permalink URL format
  if (preg_match('/\?author=([0-9]*)(\/*)/i', $request) || is_author()) {
    wp_redirect(get_home_url());
    exit;
  } else
    return $redirect;
}

function allow_webp_mime_type($existing_mimes)
{
  $existing_mimes['webp'] = 'image/webp';
  return $existing_mimes;
}
add_filter('mime_types', 'allow_webp_mime_type');

/**
 * Disable Login Form Autocomplete
 * @since 16/09/2020
 */

function proyecto_autocomplete_login_init()
{
  ob_start();
}
add_action('login_init', 'proyecto_autocomplete_login_init');

function proyecto_autocomplete_login_form()
{
  $content = ob_get_contents();
  ob_end_clean();

  $content = str_replace('id="user_pass"', 'id="user_pass" autocomplete="off"', $content);

  echo $content;
}
add_action('login_form', 'proyecto_autocomplete_login_form');

function allow_custom_mime_types($mime_types)
{
  // Agregar SVG al array de tipos MIME permitidos
  $mime_types['svg'] = 'image/svg+xml';
  $mime_types['svgz'] = 'image/svg+xml';
  $mime_types['webp'] = 'image/webp';


  return $mime_types;
}

add_filter('upload_mimes', 'allow_custom_mime_types');

// Permitir la carga de archivos SVG en la biblioteca de medios
function allow_svg_upload($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  $mime_types['webp'] = 'image/webp';

  return $mimes;
}
add_filter('wp_check_filetype_and_ext', 'allow_svg_upload', 10, 4);

// Permitir la visualización de archivos SVG en la biblioteca de medios
function svg_mime_type($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  $mime_types['webp'] = 'image/webp';

  return $mimes;
}
add_filter('mime_types', 'svg_mime_type');
/**
 * Remove the WordPress version number. 
 * @see https://desarrollowp.com/blog/tutoriales/eliminar-codigo-innecesario-del-wp_head/
 */

function proyecto_remove_headlinks()
{

  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
}

add_action('init', 'proyecto_remove_headlinks');
/* Eliminamos las <p>*/
add_filter('wpcf7_autop_or_not', '__return_false');

/* DON'T DELETE THIS CLOSING TAG */ ?>