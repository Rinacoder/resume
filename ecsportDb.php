<?php

$db = new sqlite3("feedback.sqlite");

$headers = array('id;name;mail;feedback');

if(count($argv) >= 2)
{
	$a = $argv[1];
	$results = $db->query("SELECT * FROM feedback WHERE mail = '$a'");
}
else{
	$results = $db->query("SELECT * FROM feedback");
}


$fp = fopen('explores.csv', 'w');


    fputcsv($fp,$headers);

    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    	
        fputcsv($fp, $row, ";");
    }

    fclose($fp);



?>
