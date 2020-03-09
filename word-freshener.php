<?php

/*
 Plugin Name:Word Freshener 
 Description:A simple plugin to filter commonly used unwanted and bad words from anywhere in your site. Replace words with full customization.
 Version: 1.1
 Author: Sourov Amin
 Author URI: https://www.linkedin.com/in/hossain-amin/
 License: GPLv2+
 Text Domain:word-freshener
*/



require_once plugin_dir_path(__FILE__).'create_db.php';
require_once plugin_dir_path(__FILE__).'dashboard.php';


//register hook to be triggered on plugin activation
register_activation_hook( __FILE__, 'wfp_table_install' );
register_activation_hook( __FILE__, 'wpf_add_data' );




//Replace words

function wfp_filter( $word ) {
  global $wpdb;
  $table_name = $wpdb->prefix .'wfp';
  $wfpd = $wpdb->get_results( 
	  "
	  SELECT * 
	  FROM $table_name
	  "
  );
	foreach($wfpd as $wfpd){
		$word= str_ireplace( $wfpd->word, $wfpd->modified, $word );
	}
  
return $word;
}


//Adding function to different portions
 add_filter( 'the_content', 'wfp_filter' );
 add_filter('document_title_parts', 'wfp_filter' );
 add_filter('the_title', 'wfp_filter' );
 add_filter( 'comment_text' , 'wpf_filter' );
 
 
 
//Add menu
 
add_action( 'admin_menu', 'wfp_add_menu' );
function wfp_add_menu() {
  
  add_menu_page( 'Word Freshener', 'Word Freshener', 'manage_options', 'wfps-main','wfp_main', plugins_url('image/wf-logo.png', __FILE__),'25');
  

  add_submenu_page( 'wfps-main', 'Word Filter',  'Add Words', 'manage_options', 'wfps_add', 'wfp_add_words' );
  
}





?>