<?php
$userindex = $_GET['delete'];
//    $userindex = substr($change, strlen($change)-1, strlen($change));
$sql = "delete from allusers where userindex=" . $userindex;
$con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
or die("unable to connect mysql");
$select = mysql_select_db('users', $con)
or die('Could not select users');
mysql_query($sql)
or die('Invalid query');
header('Location: administrator.php');
?>
