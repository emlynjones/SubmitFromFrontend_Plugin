<?php
/**
 * Plugin Name: Cyhoeddi
 * Plugin URI: http://www.cambrianweb.com
 * Description: Galluogi i unigolion gyhoeddi pyst o'r tu blaen i wefan
 * Version: 1.0.0
 * Author: Gwe Cambrian Web
 * Author URI: http://Uwww.cambrianweb.com
 * Text Domain: cyhoeddi-ategyn-wp
 * Domain Path: /
 * License: GPL2
 */

if( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['cyhoeddi-ffurflen-stori']) {

	// Cadarnhau bod y mesydd sydd yn ofynnol yn bresennol
	if (isset ($_POST['title'])) {
		$title =  $_POST['title'];
	} else {
		echo 'Please enter a title';
	}
	if (isset ($_POST['description'])) {
		$description = $_POST['description'];
	} else {
		echo 'Please enter the content';
	}
	$tags = $_POST['post_tags'];

	// Add the content of the form to $post as an array
	$post = array(
		'post_title'	=> $title,
		'post_content'	=> $description,
		'post_category'	=> $_POST['cat'],  // Usable for custom taxonomies too
		'tags_input'	=> $tags,
		'post_status'	=> 'draft',			// Choose: publish, preview, future, etc.
		'post_type'	=> $_POST['straeon']  // Use a custom post type if you want to
	);
	wp_insert_post($post);  // Pass  the value of $post to WordPress the insert function
							// http://codex.wordpress.org/Function_Reference/wp_insert_post
	wp_redirect( home_url() );
} // end IF

// Do the wp_insert_post action to insert it
do_action('wp_insert_post', 'wp_insert_post'); 

// Creu y byrgod fydd yn galw'r ffurflen ar y tu blaen.

function cyhoeddi_galwffurflen( $atts ){
	$html_ffurflen = "<h1>Helo Achan!</h1>";

/*"

<!-- New Post Form -->

<div id="postbox">

<form id="new_post" name="cyhoeddi-ffurflen-stori" method="post" action="">

<p><label for="title">Title</label><br />

<input type="text" id="title" value="" tabindex="1" size="20" name="title" />

</p>

<p><label for="description">Description</label><br />

<textarea id="description" tabindex="3" name="description" cols="50" rows="6"></textarea>

</p>

<p><?php wp_dropdown_categories( 'show_option_none=Category&tab_index=4&taxonomy=category' ); ?></p>

<p><label for="post_tags">Tags</label>

<input type="text" value="" tabindex="5" size="16" name="post_tags" id="post_tags" /></p>

<p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>

<input type="hidden" name="post_type" id="post_type" value="post" />

<input type="hidden" name="action" value="post" />

<?php wp_nonce_field( 'new-post' ); ?>

</form>

</div>

<!--// New Post Form -->
"
*/
	return $html_ffurflen;
}

add_shortcode( 'cyhoeddi-ffurflen', 'cyhoeddi_galwffurflen' );

?>