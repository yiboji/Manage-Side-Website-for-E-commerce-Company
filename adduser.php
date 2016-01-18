<?php
$errmsg = "";

if (isset($_POST['finishadd'])) {
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
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
    if (file_exists("employeeimg/" . $_FILES["file"]["name"]))
    {
        $filepath="employeeimg/".$_FILES["file"]["name"];
    }
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "employeeimg/" . $_FILES["file"]["name"]);
        $filepath="employeeimg/".$_FILES["file"]["name"];
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
        require 'adduser.html';
        echo $errmsg;
    } else {
        //good to add
//        $sql = "INSERT INTO allusers (username, password, usertype) value ('"
//            .$username."','".$password."','".$usertype."')";
        $sql = "insert into allusers (username,password, firstname, lastname, age, usertype, pay, employeeimg)
                value ('$username','$password','$firstname','$lastname','$age','$usertype','$pay','$filepath')";
        $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
        or die("unable to connect mysql");
        $select = mysql_select_db('users', $con)
        or die('Could not select users');
        $res = mysql_query($sql)
        or die('Invalid query');
        header('Location: administrator.php');
    }
} else if (isset($_POST['cancel'])) {
    header('Location:administrator.php');
} else {
    require 'adduser.html';
}
?>
