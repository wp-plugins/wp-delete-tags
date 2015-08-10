<?php
/*
Plugin Name: WP-Delete-Tags
Plugin URI: 
Description: Delete All Wordpress Tags from Wordpress Posts
Version: 1.0
Author: Muhammad Junaid Iqbal
Author URI: 
License: GPL
*/

//Adding Admin Hooks
add_action('admin_menu', 'wp_chuno_menu');
 
function wp_chuno_menu(){
        add_menu_page( 'WP Delete Tags', 'WP Delete Tags', 'manage_options', 'chuno-wp-dt', 'wp_dt_menu' );
}
 
function wp_dt_menu(){
		
        echo "<h1>WP Delete Tags</h1>";
		
		//Twitter Badge Code
		echo '<a href="https://twitter.com/zebicute" class="twitter-follow-button" data-show-count="false">Follow @zebicute</a>';
		echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
		
		//Wordpress Tables Prefix
		global $wpdb;
		$table_prefix = $wpdb->prefix;

		// MySQL Connection
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql_dt = 'DELETE FROM `'.$table_prefix.'term_taxonomy` WHERE taxonomy = "post_tag"';
		
		if (mysqli_query($conn, $sql_dt)) {
			
			echo '<br>';
			echo '<br>';
			echo '<br>';
			echo "There are 0 Tags Now!";
		} else {
			echo "Error deleting tags: " . mysqli_error($conn);
}
//Closing Database Connection
$conn->close();		
}
?>