<?php
/* define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
require_once DRUPAL_ROOT . '/includes/common.inc';
require_once DRUPAL_ROOT . '/includes/cache.inc';
require_once DRUPAL_ROOT . '/includes/database/database.inc'; */
// include needed files
define('DRUPAL_ROOT', getcwd());
header('Access-Control-Allow-Origin: *');
include_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$file = fopen('csv/us-500.csv', 'r');
fgetcsv($file);
/* while(!feof($file)){
	$csv = fgetcsv($file);
	print_r($csv[0]);
} */

//parse data from csv file line by line
while(($line = fgetcsv($file)) !== FALSE){
	$query = db_insert('user_data')->fields(array(
			'first_name'=>$line[0],
			'last_name'=>$line[1],
			'company_name'=>$line[2],
			'address'=>$line[3],
			'city'=>$line[4],
			'country'=>$line[5],
			'state'=>$line[6],
			'zip'=>$line[7],
			'phone1'=>$line[8],
			'phone2'=>$line[9],
			'email'=>$line[10]
	))
	->execute();
	if($query){
		print "record insert \n";
	}
	else{
		print "something went wrong";
	}
}


fclose($file);
