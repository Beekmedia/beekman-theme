<?php
/*
Author: Ben Beekman
URL: http://benbeekman.com/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD beekman CORE (if you remove this, the theme will break)
require_once( 'library/beekman.php' );



// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
//require_once( 'library/custom-post-type.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH beekman
Let's get everything up and running.
*********************/

function beekman_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'beekman-theme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'beekman_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'beekman_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'beekman_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'beekman_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'beekman_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'beekman_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  beekman_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'beekman_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'beekman_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'beekman_excerpt_more' );

} /* end beekman ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'beekman_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'beekman-thumb-600', 600, 150, true );
add_image_size( 'beekman-square-150', 150, 150, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'beekman-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'beekman-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'beekman_custom_image_sizes' );

function beekman_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'beekman-thumb-600' => __('600px by 150px', 'beekman-theme'),
		'beekman-thumb-300' => __('300px by 100px', 'beekman-theme'),
	) );
}
/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/


function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}

add_action( 'admin_init', 'my_theme_add_editor_styles' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function beekman_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'beekman-theme' ),
		'description' => __( 'The first (primary) sidebar.', 'beekman-theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'blog',
		'name' => __( 'Blog Sidebar', 'beekman-theme' ),
		'description' => __( 'The blog sidebar.', 'beekman-theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'web',
		'name' => __( 'Web Sidebar', 'beekman-theme' ),
		'description' => __( 'The web development page sidebar.', 'beekman-theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'other-work',
		'name' => __( 'Other Work Sidebar', 'beekman-theme' ),
		'description' => __( 'Other Work page sidebar.', 'beekman-theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'home',
		'name' => __( 'Home Page Sidebar', 'beekman-theme' ),
		'description' => __( 'The home page sidebar.', 'beekman-theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'home-after',
		'name' => __( 'After Home Page Content', 'beekman-theme' ),
		'description' => __( 'A widget banner below the main column of the home page.', 'beekman-theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	/*
	To call sidebars in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function beekman_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
	<article  class="cf">
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
		<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
		<?php // end custom gravatar call ?>
		<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'beekman-theme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'beekman-theme' ),'  ','') ) ?>
		<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'beekman-theme' )); ?> </a></time>

	  </header>
	  <?php if ($comment->comment_approved == '0') : ?>
		<div class="alert alert-info">
		  <p><?php _e( 'Your comment is awaiting moderation.', 'beekman-theme' ) ?></p>
		</div>
	  <?php endif; ?>
	  <section class="comment_content cf">
		<?php comment_text() ?>
	  </section>
	  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
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
function beekman_fonts() {
  wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
  wp_enqueue_style( 'googleFonts');
}

add_action('wp_print_styles', 'beekman_fonts');


function get_images($overrides = '', $exclude_thumbnail = false)
{
    return get_posts(wp_parse_args($overrides, array(
        'numberposts' => -1,
        'post_parent' => get_the_ID(),
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'order' => 'ASC',
        'exclude' => $exclude_thumbnail ? array(get_post_thumbnail_id()) : array(),
        'orderby' => 'menu_order ID',
        'numberposts' => '3'
    )));
}


/* DON'T DELETE THIS CLOSING TAG */ ?>
