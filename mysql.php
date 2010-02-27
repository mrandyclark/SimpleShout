<?php

// connection info
$mysql_serv = "mysql.hiimandy.com";
$mysql_user = "simpleshout";
$mysql_pass = "shoutitout";
$mysql_db = "simpleshout";

// create a connection
$con = mysql_connect($mysql_serv, $mysql_user, $mysql_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// select the database
mysql_select_db($mysql_db, $con);

?>