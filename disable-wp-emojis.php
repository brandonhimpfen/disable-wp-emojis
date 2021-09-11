<?php
/*                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              /*
 * Plugin Name:       Disable WP Emojis
 * Plugin URI:        http://www.himpfen.com/disable-wp-emojis/
 * Description:       Removes emojis from the WordPress front-end, admin pages, feeds and e-mails.
 * Version:           1.0.0
 * Author:            Brandon Himpfen
 * Author URI:        http://www.himpfen.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Remove Emojis from WordPress
function disable_wp_emojis() {
  // Remove emojis from front-end
  // Original: http://www.himpfen.com/remove-emojis-wordpress/
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	// Remove emojis from feeds
	// https://developer.wordpress.org/reference/functions/wp_staticize_emoji/
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	// Remove emjois from admin pages
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	// Remove emojis from e-mails
	// https://developer.wordpress.org/reference/functions/wp_staticize_emoji_for_email/
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_wp_emojis' );
