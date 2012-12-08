<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Wuhan Foreign Languages School|Students' Union</title>	
<link rel="stylesheet" type="text/css" href="../default.css"/>
</head>
<body>
<div class="main">
	<div class="container">
		<div class="gfx"><a href="http://wflssu.com"><span></span></a></div>
		<div class="menu">
			<a href="http://www.wfls.com.cn"><span>WFLS Home</span></a>
			<a href="http://wflssu.com"><span>Students' Union</span></a>
			<a href="http://council.wfls.org.cn/"><span>Students' Council</span></a>
			<a href="../pma" id="last"><span>Admin Login</span></a>
		</div>
		<div class="content">
			<div class="item">
<?php
//Load MySQL connection settings
require './lib/dbconnect.php';

//Set the attribute
$dbh->setAttribute(PDO::ATTR_CASE,
PDO::CASE_LOWER);

//SQL injection detection
function injection_check($str){
 $tmp=eregi('select|insert|update|delete|turncate|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $str);
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
$match = " WHERE id = :id";
$query = prepare($base . "ia" . $match . " UNION " . $base . "da" . $match . " UNION " . $base . "sa" . $match . " UNION " . $base . "er" . $match . " UNION " . $base . "sp" . $match . " UNION " . $base . "cab" . $match . ";");
$query->bindParam(":id",$id);

//Run the query
$result = $dbh->query($query);

//Process the result
if ($result) {
	$row = $result->fetch();
	$name = $row['name'];
	$gender = $row['gender'];
	$classnum = $row['classnum'];
	$dept = $row['dept'];
	$year = $row['year'];
} else {
	die("Invalid ID supplied");
};

//Alter display
if ($gender=='M') {
	$gender = '男';
} else {
	$gender = '女';
};

if ($dept=='同教') {
	$dept = $dept . '协会';
} else {
	$dept = $dept . '部';
};
?>
				<h1>Query Result</h1>
				<p>Name: <?php echo $name; ?></p>
				<p>Gender: <?php echo $gender; ?></p>
				<p>Class: <?php echo $year; ?>级<?php echo $classnum; ?>班</p>
				<p>Department: <?php echo $dept; ?></p>
			</div>
		</div>
		<div class="footer">&copy; 2012 <a href="http://wflssu.com">WFLS Students' Union</a>. Template designed by <a href="http://arcsin.se">Arcsin</a> and modified by <a href="http://blog.tombu.biz">Tom Bu</a></div>
	</div>	
</div>
</body>
</html>
