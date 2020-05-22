<?php

/**
 * Add table to database if already not there
 */
function wfp_table_install()
{
	global $wpdb;

	$table_name = $wpdb->prefix . "wfp";

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  word varchar(100) NOT NULL,
	  modified varchar(100),
	  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	maybe_create_table($table_name, $sql);
}


/**
 * Add words to database table
 */
function wpf_add_data()
{
	global $wpdb;

	$table_name = $wpdb->prefix . 'wfp';
	$rowcount = $wpdb->get_var("SELECT * FROM $table_name");

	/**
	 * Default words to be added in database
	 */
	$words = array(
		' ass' => ' a**',
		' anal' => ' a***',
		' anus' => ' a***',
		' arse' => ' a***',
		' bitch' => 'b****',
		' boob' => ' b***',
		' bastard' => ' b******',
		' biatch' => ' b*****',
		' blowjob' => ' b******',
		' bollok' => ' b*****',
		' bugger' => ' bugger',
		' butt' => ' b***',
		' clit' => ' c***',
		' cunt' => ' c***',
		' cum' => ' c**',
		' dildo' => ' d****',
		' dick' => ' d***',
		' duche' => ' d****',
		' fuck' => ' f***',
		'f u c k' => 'f***',
		'f_u_c_k' => 'f***',
		' fag' => ' f**',
		' faggot' => ' f*****',
		' fagot' => ' f****',
		' gangbang' => ' g*******',
		' hoar' => ' h***',
		' hoer' => ' h***',
		' hoe' =>  ' h**',
		'horny' => 'h****',
		' jerk' => ' j***',
		' jiz' => ' j**',
		'motherfuck' => 'm***********',
		' mofo' => ' m***',
		'masterbat' => 'm********',
		'mo-fo' => 'm*-**',
		'orgasm' => 'o*****',
		' porn' => ' p***',
		'pussy' => 'p****',
		'penis' => 'p****',
		' piss' => ' p***',
		' prick' => ' p****',
		' pube' => ' p***',
		' retard' => ' r****',
		'scroat' => 's*****',
		' suck' => ' s***',
		' shit' => 's***',
		' shite' => ' s****',
		' slut' => ' s***',
		' sex' => ' s**',
		' smut' => ' s***',
		' tit' => ' t**',
		' twat' => ' t***',
		'vagina' => 'v*****',
		' wang' => ' w***',
		'whore' => 'w****',
		'whoar' => 'w****',
		'xxx' => 'x**'
	);

	if ($rowcount < 1) {
		foreach ($words as $word => $modified){
			$wpdb->insert(
				$table_name,
				array(
					'word' => $word,
					'modified' => $modified
				)
			);
		}
	}
}