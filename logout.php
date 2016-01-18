<?php
/**
 * Created by PhpStorm.
 * User: yiboji
 * Date: 6/21/15
 * Time: 4:25 PM
 */
session_start();
session_destroy();
if(isset($_GET['timeout'])){
    header("Location:login.php?timeout='timeout'");
}
else
    header("Location:login.php");