<?php
	include 'mysql.php';

	$query = "SELECT * FROM comments WHERE disabled = false ORDER BY date DESC";
	
	$result = mysql_query($query);
	
	$num = mysql_numrows($result);
	
	mysql_close();


    // Create the array
    $comments = array();

	$i=0;
	while ($i < $num) {
		$comments[] = array("name" => mysql_result($result,$i,"name"), "email" => mysql_result($result,$i,"email"), "comment" => mysql_result($result,$i,"comment"));
	$i++;
	}
	
    // Encode the array in JSON format
    $commentsJSON = json_encode($comments);

    // Return the data to the caller
    echo $commentsJSON;

?>