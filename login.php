<?php
/**
 * Created by PhpStorm.
 * User: yiboji
 * Date: 6/17/15
 * Time: 12:41 PM
 */

session_start();
$sessionID=session_id();

$errmsg = "";

if (isset($_POST['login'])) {
    $un = $_POST['username'];
    $pw = $_POST['password'];
    if (strlen($un) == 0 && strlen($pw) == 0) {
        $errmsg = "";
    } else if (strlen($un) == 0) {
        $errmsg = 'Invalid username';
    } else if (strlen($pw) == 0) {
        $errmsg = 'Invalid password';
    } else if (strlen($un) > 0 && strlen($pw) > 0) {
        //mysql code
        $sql = "select usertype from allusers where username='" .
            $un . "'and password='" .
            $pw . "';";
        $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
        or die("unable to connect MySQL!");
        $select = mysql_select_db('users', $con)
        or die("Could not select 'users'");
        $res = mysql_query($sql)
        or die("Invalid query!");
        if (!($row = mysql_fetch_array($res))) {
            $errmsg = 'Invalid username or password!';
        } else
            $usertype = $row['usertype'];
    } else {
        $usertype = "";
        $errmsg = "";
    }

    if (strlen($errmsg) > 0) {
        require 'prelogin.html';
        echo '<span style="color:red"> ' . $errmsg . '</span>';
        require 'postlogin.html';
    } else if (!$res) {
        require 'prelogin.html';
        require 'postlogin.html';
    } else if (strlen($un) == 0 && strlen($pw) == 0) {
        require 'prelogin.html';
        require 'postlogin.html';
    } else {
        //allow to access!
        $_SESSION["userid"]=$un;
        $_SESSION["usertype"]=$usertype;
        $_SESSION["expiretime"] = time()+3600;

        if ($usertype == "Administrator")
            header("Location:administrator.php");
        else if ($usertype == "Manager") {
            header("Location:manager.php");
        } else if ($usertype == "Sale Manager") {
            header("Location:salamanager.php");
        }
    }
}
else if(isset($_GET['timeout'])){
    require 'prelogin.html';
    echo '<span style="color:red">&nbspLogin Timeout!</span>';
    require 'postlogin.html';
}
else {
    require 'prelogin.html';
    require 'postlogin.html';
}

