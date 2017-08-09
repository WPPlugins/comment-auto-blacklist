<?php
/**
 * @package Comment AutoBlacklist
 * @version 0.1
 */
/*
Plugin Name: Comment AutoBlacklist
Plugin URI: http://www.yriase.fr/
Description: Comment AutoBlacklist automatically adds to the comments blacklist the IP of spam comments
Author: Hugo Giraud
Version: 1.0
Author URI: http://www.yriase.fr/
*/

function comment_autoblacklist_flood_filter( $approved , $commentdata ) {
	if($approved == 'spam')
	{
		$blacklist = get_option('blacklist_keys');
		$blacklist .= "\n" . $commentdata['comment_author_IP'];
		update_option('blacklist_keys', $blacklist);
	}
}

add_filter( 'pre_comment_approved' , 'comment_autoblacklist_flood_filter' , '99', 2 );
