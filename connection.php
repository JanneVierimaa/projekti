<?php
	try
	{
	 //$dsn = "mysql:host=localhost;dbname=opisk_t8vija01";
 	 //$db = new PDO ($dsn, "phpUser", "phpPass");
	 $dsn = "mysql:host=mysli.oamk.fi;dbname=opisk_t8vija01";
	 $db = new PDO ($dsn, "t8vija01", "amorphis");
	 //print ("Connected\n");
	}
	catch (PDOException $e)
	{
	 print ("Cannot connect to server\n");
	 print ("Error code: " . $e->getCode () . "\n");
	 print ("Error message: " . $e->getMessage () . "\n");
	}
	?>
