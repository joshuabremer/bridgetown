<?php
add_theme_support('post-thumbnails');
add_image_size( '250x250', 250, 250,TRUE ); 
add_image_size( '150x150', 150, 150,TRUE ); 
?>
<?php
// Fire this during init
register_post_type('performer', array(
  'label' => __('Performers'),
  'singular_label' => __('Performer'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  '_builtin' => false, // It's a custom post type, not built in!
  'rewrite' => array("slug" => "performer"), // Permalinks format
  'query_var' => false,
  'supports' => array('title','editor','author','excerpt','revisions', 'thumbnail','page-attributes'),
'taxonomies' => array('category','post_tag'),
'menu_position' => 4
));
register_post_type('show', array(
  'label' => __('Shows'),
  'singular_label' => __('Show'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  '_builtin' => false, // It's a custom post type, not built in!
  'rewrite' => array("slug" => "show"), // Permalinks format
  'query_var' => false,
  'supports' => array('title','editor','author','excerpt','revisions', 'thumbnail','page-attributes'),
'taxonomies' => array('category','post_tag'),
'menu_position' => 4
));
register_post_type('event', array(
  'label' => __('Events'),
  'singular_label' => __('Event'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  '_builtin' => false, // It's a custom post type, not built in!
  'rewrite' => array("slug" => "event"), // Permalinks format
  'query_var' => false,
'supports' => array('title','editor','author','excerpt','revisions', 'thumbnail','custom-fields'),
'taxonomies' => array('category','post_tag'),
'menu_position' => 4
  ));


function demo_add_default_boxes() {
register_taxonomy_for_object_type('category', 'performer');
register_taxonomy_for_object_type('category', 'event');
register_taxonomy_for_object_type('category', 'show');
}

add_action('init', 'demo_add_default_boxes');





function remove_comments(){
  if (is_page() OR ( get_post_type() == 'performer' ) ){
  remove_action('thematic_comments_template','thematic_include_comments',5);
   }
}
add_action('template_redirect','remove_comments');
function childtheme_postfooter() {
// Do stuff here
}
add_filter ('thematic_postfooter', 'childtheme_postfooter'); // Crazy important!
?>