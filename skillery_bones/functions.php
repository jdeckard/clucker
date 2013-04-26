<?php

if ( $_POST['chicken_name'] ) add_chicken( $_POST['chicken_name'] );

function add_chicken( $chicken ) {

	if ( is_user_logged_in() ) :

		global $current_user, $wpdb;
		get_currentuserinfo();

		$wpdb->query( "INSERT INTO cluck_chickens (chicken_name,user_id,date_added) VALUES ('".$wpdb->prepare($chicken)."', '".$current_user->ID."', NOW());" );
		
		die("Success::Your chick, \"".strip_tags(stripslashes($chicken)).",\" has been added to your flock!");

	else : die("Error::Not logged in."); endif;

}

if ( $_POST['eggcount'] && $_POST['date'] ) add_egg_count( $_POST['eggcount'], $_POST['date'] );

function add_egg_count( $count, $date ) {

	if ( is_user_logged_in() ) :
	
		if ( !is_numeric( $count ) ) die("Error::Egg count is not a number.");

		global $current_user, $wpdb;
		get_currentuserinfo();

		$wpdb->query( "DELETE FROM cluck_eggs WHERE user_id = '".$current_user->ID."' AND date_added = '".$wpdb->prepare($date)."';" );

		$wpdb->query( "INSERT INTO cluck_eggs (egg_count,user_id,date_added) VALUES ('".$wpdb->prepare(ceil($count))."', '".$current_user->ID."', '".$wpdb->prepare($date)."');" );
		
		die("Success::Your egg counts have been updated!");
	
	else : die("Error::Not logged in."); endif;

	}

if ( $_POST['chicken'] && ( $_POST['status'] || $_POST['status'] == 0 ) ) update_chicken_status( $_POST['chicken'], $_POST['status'] );

function update_chicken_status( $id, $status ) {

	if ( is_user_logged_in() ) :

		global $current_user, $wpdb;
		get_currentuserinfo();

		$result = $wpdb->query("UPDATE cluck_chickens SET status = '".$wpdb->prepare($status)."' WHERE user_id = '".$current_user->ID."' AND chicken_id = '".$wpdb->prepare($id)."';");

		die( 'Success::Chicken updated.' );
		
	else : die("Error::Not logged in."); endif;

	}

if ( $_POST['chickens'] && $_POST['chickens'] == 'get' ) get_chickens();

function get_chickens() {

	if ( is_user_logged_in() ) :
	
		global $current_user, $wpdb;
		get_currentuserinfo();

		$result = $wpdb->get_results("SELECT * FROM cluck_chickens WHERE user_id = '".$current_user->ID."' AND status < 2 ORDER BY status, chicken_name;");
		
		echo 'Success::<table width="100%" border="none" class="list"><thead><tr><th>Chicken</th><th class="ar">Status</th></tr></thead>';

		foreach( $result as $row ) {

			echo '<tr><td>'.$row->chicken_name.'</td><td class="ar"><select class="txt2" onchange="update_chicken($(this).val(),'.$row->chicken_id.');"><option value="0"';
			
			if ( $row->status == 0 ) echo ' selected';
			
			echo '>Active</option><option value="1"';
			
			if ( $row->status == 1 ) echo ' selected';
			
			echo '>Inactive</option><option value="2"';
			
			if ( $row->status == 2 ) echo ' selected';
			
			echo '>Delete</option></select></td></tr>';

			}
		
		echo '</table>';
		
		die();
		
	else : die("Error::Not logged in."); endif;

	}

function get_egg_stats() {

	if ( is_user_logged_in() ) :

	else : die("Error::Not logged in."); endif;

	}

if ( $_POST['count'] && ( $_POST['count'] == 'day' || $_POST['count'] == 'week' || $_POST['count'] == 'month' || $_POST['count'] == 'year' ) ) get_count(strtoupper($_POST['count']));
	
function get_count( $type = 'DAY', $echo = true ) {

	if ( is_user_logged_in() ) :
	
		global $current_user, $wpdb;
		get_currentuserinfo();
		
		$result = $wpdb->get_results("SELECT SUM(`egg_count`) as eggs FROM `cluck_eggs` WHERE date_added > DATE_SUB( NOW( ) , INTERVAL 1 ".$type." ) AND user_id = '".$current_user->ID."';");

		$return = 'Success::0';
		
		foreach( $result as $row ) {

			$return = 'Success::'.$row->eggs;
		
			}
		
	else : $return = 'Error::Not logged in.'; endif;

	if ( $echo ) die( $return );
	else return str_replace('Success::','',str_replace('Error::','',$return));
	
	}
?>