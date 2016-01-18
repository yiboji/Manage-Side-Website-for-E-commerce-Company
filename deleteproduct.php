<?php
$productID = $_GET['delete'];
//    $userindex = substr($change, strlen($change)-1, strlen($change));
$sql = "delete from product where productID=" . $productID;
$con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
or die("unable to connect mysql");
$select = mysql_select_db('users', $con)
or die('Could not select users');
mysql_query($sql)
or die('Invalid query');
//delete from special sale table
$sql = "delete from specialsale where productID=$productID";
mysql_query($sql);
header('Location: salamanager.php');
?>
