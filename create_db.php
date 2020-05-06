<?php

function wfp_table_install()
{
	global $wpdb;

	$table_name = $wpdb->prefix . "wfp";

	//Adding table in database
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


//Dataset for database
function wpf_add_data()
{
	global $wpdb;

	$table_name = $wpdb->prefix . 'wfp';
	$rowcount = $wpdb->get_var("SELECT * FROM $table_name");

	if ($rowcount < 1) {


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' ass',
				'modified' => ' a**',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => ' anal',
				'modified' => ' a***',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => ' anus',
				'modified' => ' a***',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => ' arse',
				'modified' => ' a***',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => 'bitch',
				'modified' => 'b****',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => ' boob',
				'modified' => ' b***',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => ' bastard',
				'modified' => ' b******',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => 'biatch',
				'modified' => 'b*****',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => 'blowjob',
				'modified' => 'b******',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => 'bollock',
				'modified' => 'b******',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => 'bollok',
				'modified' => 'b*****',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => 'bugger',
				'modified' => 'b*****',
			)
		);

		$wpdb->insert(
			$table_name,
			array(
				'word' => ' butt',
				'modified' => ' b***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' clit',
				'modified' => ' c***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' cunt',
				'modified' => ' c***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' cum',
				'modified' => ' c**',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'dildo',
				'modified' => 'd****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' dick',
				'modified' => ' d***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' duche',
				'modified' => ' d****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' fuck',
				'modified' => ' f***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'f u c k',
				'modified' => 'f***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'f_u_c_k',
				'modified' => 'f***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' fag',
				'modified' => ' f**',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'faggot',
				'modified' => 'f*****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'fagot',
				'modified' => 'f****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'gangbang',
				'modified' => 'g*******',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' hoar',
				'modified' => ' h***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' hoer',
				'modified' => ' h***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' hoe',
				'modified' => ' h**',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'horny',
				'modified' => 'h****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'jerk',
				'modified' => 'j***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' jiz',
				'modified' => ' j**',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'motherfuck',
				'modified' => 'm***********',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' mofo',
				'modified' => ' m***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'masterbat',
				'modified' => 'masterbat',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'mo-fo',
				'modified' => 'm*-**',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'orgasm',
				'modified' => 'o*****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'porn',
				'modified' => 'p***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'pussy',
				'modified' => 'p****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'penis',
				'modified' => 'p****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'piss',
				'modified' => 'p***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'prick',
				'modified' => 'p****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' pube',
				'modified' => ' p***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'retard',
				'modified' => 'r****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'scroat',
				'modified' => 's*****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'semen',
				'modified' => 's****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'suck',
				'modified' => 's***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'shit',
				'modified' => 's***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'shite',
				'modified' => 's****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'slut',
				'modified' => 's***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'sex',
				'modified' => 's**',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' smut',
				'modified' => ' s***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' tit',
				'modified' => ' t**',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' twat',
				'modified' => 't***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'vagina',
				'modified' => 'v*****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => ' wang',
				'modified' => ' w***',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'whore',
				'modified' => 'w****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'whoar',
				'modified' => 'w****',
			)
		);


		$wpdb->insert(
			$table_name,
			array(
				'word' => 'xxx',
				'modified' => 'x**',
			)
		);

	}
}
