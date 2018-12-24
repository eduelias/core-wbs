<?php

$database = new database_connection;

$database->server = 		"10.20.30.250";
// set to your database server's name/IP address

$database->database_name = 	"anzolin";
// set to the name of your database

$database->table_name = 	"tarefas_wbs";
// set to the name of the table you are using

$database->username = 		"anzolin";
// set to your database user name

$database->password = 		"p0o9i8i8";
// set to your database user password

$database->connect();

?>
