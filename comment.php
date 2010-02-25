<?php
include 'mysql.php';

$name = addslashes($_POST[n]);
$email = addslashes($_POST[e]);
$comment = nl2br(addslashes($_POST[c]));


// insert new comment into db
$sql="INSERT INTO comments (name, email, comment, date, disabled) VALUES ('$name','$email','$comment', NOW(), 'false' )";

if (!mysql_query($sql,$con)) { die('Error: ' . mysql_error()); }

mysql_close($con);

include 'all-comments.php'
?>