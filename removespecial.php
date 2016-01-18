<?php
$productID = $_GET['remove'];
$sql = "delete from specialsale where productID=$productID";
$con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
or die("unable to connect mysql");
$select = mysql_select_db('users', $con)
or die('Could not select users');
mysql_query($sql)
or die('Invalid query');
//delete from special sale table
mysql_query($sql);
header('Location: specialsale.php');
?>
