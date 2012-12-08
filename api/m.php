<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">
<?php

//Load MySQL connection settings
require './lib/dbconnect.php';

//SQL injection detection
function injection_check($str){
 $tmp=eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $str); // ½øÐÐ¹ýÂË
 if($tmp){
  echo "Invalid ID supplied";
  exit();
 }else{
  return $str;
 }
}

//Get the requested member ID with basic SQL injection protection
$id=injection_check($_REQUEST['suid']);

//Build the query
$base = "SELECT name, gender, classnum, dept, year FROM ";
$match = " WHERE id = ";
$query = $base . "ia" . $match . $id . " UNION " . $base . "da" . $match . $id . " UNION " . $base . "sa" . $match . $id . ";";

//Run the query
$result = mysql_query($query);

//Process the result
if ($result) {
	$row = mysql_fetch_array($result);
        $name = $row['name'];
	$gender = $row['gender'];
	$classnum = $row['classnum'];
	$dept = $row['dept'];
	$year = $row['year'];
} else {
	die("Invalid ID supplied");
};
?>
<wml>
<head>
<meta http-equiv='Cache-Control' content='no-cache'/>
</head>
<card title="Wuhan Foreign Languages School|Students' Union">
	<h1>Wuhan Foreign Languages School Students' Union</h1>
	<h2>Students' Union Membership Database System</h2>
	<h3>Query Result</h3>
	<p>Name: <?php echo $name; ?></p>
	<p>Gender: <?php echo $gender; ?></p>
	<p>Entrance Year: <?php echo $year; ?></p>
	<p>Class: <?php echo $classnum; ?></p>
	<p>Department: <?php echo $dept; ?></p>
</card>
</wml>