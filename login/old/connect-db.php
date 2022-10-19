<?php
/* 
 CONNECT-DB.PHP
 Allows PHP to connect to your database
*/

 // Database Variables (edit with your own server information)
 $server = 'localhost';
 $user = 'root';
 $pass = 'root';
 $db = 'mmrsv';
 
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());
 
/*
 header('Content-Type: text/html; charset=utf-8');

 $pdo = new PDO('mysql:dbname=$db;host=$server, $user, $pass,
               array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

 $results = $pdo->query('SELECT * FROM `mmrsv`')->fetchAll(PDO::FETCH_ASSOC);
*/

?>
