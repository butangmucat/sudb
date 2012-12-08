<?php
  //Read config file
  require 'config.inc.php';
  
  //Connect to database using PDO driver
 try {
        $dbh = new PDO($dsn, $username, $passwd, array(PDO::ATTR_PERSISTENT => true));
   
  //Error handling
        $dbh = null;
      } catch (PDOException $error) {
		  die("Error connecting to database: " . $error->getMessage());
      }
  //Set charactor encoding, MySQL only, alter it or comment it if you are using other DBMSs
        $dbh->query('SET NAMES $encoding;');
?> 
