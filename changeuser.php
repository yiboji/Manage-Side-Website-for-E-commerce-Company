<?php
/**
 * Created by PhpStorm.
 * User: yiboji
 * Date: 6/18/15
 * Time: 9:52 PM
 */
$errmsg = "";
$userindex = $_GET['change'];

if (isset($_POST['finishchange'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $usertype = $_POST['usertype'];

    $pay = $_POST['pay'];
    $filepath = "";

    //add file
    if ($_FILES["file"]["error"] > 0)
    {
        $filepath = $row['employeeimg'];
    }
    else{
        if (file_exists("employeeimg/" . $_FILES["file"]["name"])){
            $filepath="employeeimg/".$_FILES["file"]["name"];
        }
        else{
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "employeeimg/" . $_FILES["file"]["name"]);
            $filepath="employeeimg/".$_FILES["file"]["name"];
        }
    }

    if (strlen($username) == 0) {
        $errmsg = 'Invalid Username';
    } else if (strlen($password) == 0) {
        $errmsg = 'Invalid password';
    } else if (strlen($usertype) == 0) {
        $errmsg = 'Invalid usertype';
    }
    //check typo
    //some code here
    if (strlen($errmsg) > 0) {
        require 'changeuser.html';
        echo $errmsg;
    } else {
        //good to change
//        $sql = "update allusers set username='".$username."',
//            password='".$password."',
//            usertype='".$usertype."' where userindex=".$userindex;
        $sql = "update allusers set username='$username',
                password='$password',
                firstname='$firstname',
                lastname='$lastname',
                age='$age',
                usertype='$usertype',
                pay='$pay',
                employeeimg='$filepath'
                where userindex='$userindex'";
        $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
        or die("unable to connect mysql");
        $select = mysql_select_db('users', $con)
        or die('Could not select users');
        $res = mysql_query($sql)
        or die('Invalid query'.$sql);
        header('Location: administrator.php');
    }
} else {
    $sql = "select * from allusers where userindex=" . $userindex;
    $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
    or die("unable to connect mysql");
    $select = mysql_select_db('users', $con)
    or die('Could not select users');
    $res = mysql_query($sql)
    or die('Invalid query');
    $row = mysql_fetch_array($res);
    $username = $row['username'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $age = $row['age'];
    $usertype = $row['usertype'];
    $pay = $row['pay'];
    $filepath = $row['employeeimg'];
    require 'changeuser.html';
}
?>