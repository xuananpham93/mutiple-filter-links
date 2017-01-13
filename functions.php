<?php 
define("DB_HOST", 'localhost');
define("DB_NAME", 'fc_multi_links');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
global $conn;

$vars = array('artistTag', 'typeTag', 'priceTag', 'sizeTag');
$query = 'Select * from artData';
$filter = array();
$binds = array();
$href = '<a href="index.php';
$i = 0;


function connect(){
	// Ket noi Mysql bang PDO
	global $conn;
	try{
		$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		

	} catch(PDOException $e){
		echo $e->getMessage();
		die;
	}
}

function close(){
	$conn = null;
}

function get_product(){
	global $conn;
	connect();
	$stmt = $conn->prepare('Select * from artData');

	$stmt->execute();

	$result = $stmt->fetchAll();

	close();

	return $result;
}

function get_artist(){
	global $conn;
	connect();
	$stmt = $conn->prepare('Select * from artisttag');

	$stmt->execute();

	$result = $stmt->fetchAll();

	close();
	
	return $result;
}

function get_type(){
	global $conn;
	connect();
	$stmt = $conn->prepare('Select * from typetag');

	$stmt->execute();

	$result = $stmt->fetchAll();

	close();
	
	return $result;
}

function get_size(){
	global $conn;
	connect();
	$stmt = $conn->prepare('Select * from sizetag');

	$stmt->execute();

	$result = $stmt->fetchAll();

	close();
	
	return $result;
}

function filter_data($filter, $binds){
	global $conn;
	connect();

	$query = "Select * from artdata where " .implode(' AND ', $filter);

	$stmt = $conn->prepare($query);

	$stmt->execute($binds);

	$result = $stmt->fetchAll();

	close();
	
	return $result;
}

function get_table($id, $table){
	global $conn;
	connect();

	$query = "Select * from ".$table." where id = ".$id;

	$stmt = $conn->prepare($query);

	$stmt->execute();

	$result = $stmt->fetchAll();

	close();
	
	return $result;
}



?>