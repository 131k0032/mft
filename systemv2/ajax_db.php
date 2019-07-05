<?php

// $host = "localhost"; /* Host name */
// $user = "root"; /* User */
// $password = ""; /* Password */
// $dbname = "mft"; /* Database name */

$host = "localhost"; /* Host name */
$user = "mftcommx_sys"; /* User */
$password = "3.1416"; /* Password */
$dbname = "mftcommx_system"; /* Database name */




$con = mysqli_connect($host, $user, $password,$dbname) or die ("Error al conectarse al servidor mysql");
mysqli_query($con,"SET CHARACTER SET 'utf8'");
mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}



?>