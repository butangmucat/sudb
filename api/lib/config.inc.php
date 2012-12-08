<?php
  //Charactor encoding setting, UTF-8 by default
  $encoding = "UTF8";

  //PDO database connection settings
  $dbms = 'mysql'; //PDO database type, MySQL by default
  $dbhost = ''; //PDO database server
  $username = ''; //PDO database username
  $passwd = ''; //PDO database password
  $dbname = ''; //Assign the database you intend to use
  $dsn = "$dbms:host=$dbhost;
  dbname=$dbname"; //PDO connection, NO ALTERING
?>
  
