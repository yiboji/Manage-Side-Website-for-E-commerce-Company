<?php
    session_start();
    if($_SESSION["usertype"]!='Administrator')
        header("Location:login.php");
    if(time()>$_SESSION['expiretime']){
        header("Location:logout.php?timeout='timeout'");
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <style>
        html,body{
            display:block;
            width:100%;
            height:100%;
        }
        #header{
            background-image: url("img/header.png");
            background-repeat:no-repeat;
            background-size: cover;
            background-position: left top;
            width:100%;
            height:15%;

        }
        #container{
            width:100%;
            height:85%;
        }

        #nav{
            background-color:#01579b;
            width:15%;
            height:100%;
            /*float:left;*/
            /*padding-bottom: 4px;*/
            /*padding-top: 0px;*/
            /*padding-left:64px;*/
            position:relative;
            left:0%;
            top:0%;
        }
        #nav-header{
            height:8%;
            border: 1px solid;
            border-color: #ffe #aaab9c #ccc #fff;
            /*text-decoration: none;*/
            background: #00b0ff;
        }
        #nav-content{
            /*width:112%;*/
            height:80%;
            background-color:transparent;
            /*margin-left:-19%;*/
            /*margin-top:3%;*/
        }
        .navbutton{
            background:#004d40;
            font-size:150%;
            font-family:"Times New Roman";
            text-align:center;
            width:95%;
        }
        #manage{
            width:84.5%;
            height:84.5%;
            margin:0.1%;

            position:absolute;;
            left:16%;
            top:16.5%;
        }

        .border{
            border:2px solid #fff;
            border-color:#def #678 #345 #cde;
        }
        #content{
            width:100%;
            height:100%;
            overflow:scroll;
        }
        #contenttitle{
            width:100%;
            height:7%;
            border: 1px solid;
            border-color: #ffe #aaab9c #ccc #fff;
            text-decoration: none;
            background: #e8eaf6;
        }
        table,th,td {
            border:1px solid black;
            border-collapse:collapse;
        }
        th, td{
            padding:5px;
            text-align;center;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(doReady);
        function doReady(){
            $("#add").click(addfunc);
            $("#button-search").click(searchfunc);
        }
        function addfunc(){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","adduser.php",true);
            xmlhttp.send();
        }
        function changefunc(userindex){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","changeuser.php?change="+userindex,true);
            xmlhttp.send();
        }
        function searchfunc(){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","searchuser.php?search="+document.getElementById("input-search").value,true);
            xmlhttp.send();
        }
        function checkform(){
            var reg = new RegExp("^[A-Za-z]+$");
            var flag = true;
            document.getElementById("username").style.color = "black";
            document.getElementById("firstname").style.color = "black";
            document.getElementById("lastname").style.color = "black";
            document.getElementById("age").style.color = "black";
            document.getElementById("pay").style.color = "black";
            document.getElementById("password").style.color = "black";
            document.getElementById("checkpassword").style.color = "black";

            if(reg.test(document.getElementsByName("username")[0].value)==false){
                document.getElementById("username").style.color = "red";
                flag = false;
            }
            if(reg.test(document.getElementsByName("firstname")[0].value)==false){
                document.getElementById("firstname").style.color = "red";
                flag = false;
            }
            if(reg.test(document.getElementsByName("lastname")[0].value)==false){
                document.getElementById("lastname").style.color = "red";
                flag = false;
            }

            reg = new RegExp("^[0-9]+$")
            if(reg.test(document.getElementsByName("age")[0].value)==false){
                document.getElementById("age").style.color = "red";
                flag = false;
            }
            if(reg.test(document.getElementsByName("pay")[0].value)==false){
                document.getElementById("pay").style.color = "red";
                flag = false;
            }
            if(document.getElementsByName("password")[0].value!=document.getElementsByName("checkpassword")[0].value){
                document.getElementById("password").style.color = "red";
                document.getElementById("checkpassword").style.color = "red";
                flag = false;
            }
            return flag;
        }
    </script>
</head>

<body>
<div id="header" class="border">
    <div style="float:left;width:50%;">
        <p style="position:absolute;left:2%;top:2%;color:white;font-size:250%">&nbsp&nbspUSER MANAGEMENT SYSTEM</p>
    </div>
    <div style="float:right;width:20%;right:0;">
        <p style="color:white;">USER ID:
            <?php
                echo $_SESSION["userid"];
            ?><br>
            USER TYPE:
            <?php
                echo $_SESSION["usertype"];
            ?><br>
            <button onclick="location.href='logout.php'" style="cursor:pointer;vertical-align: middle;display:inline;background: transparent;border:transparent;width:25%;height:4%;" type="button" name="logout">
                <img src="img/logout.ico"/></button>Log out
        </p>
    </div>
    <div>
    </div>
</div>

<div id="container">
<div id="nav" class="border">
    <div id="nav-header" style="text-align:center">
        <p style="position:absolute;left:12%;color:white;font-size:120%;text-align:center">MANAGEMENT</p>
    </div>
    <div id="nav-content">
        <div style="text-align: center;position:relative;top:3%">
            <input type="button" class="navbutton" id="add" name="add" value="ADD NEW USER"/>
            <br><br>
            <input onclick="location.href='administrator.php'" type="button" class="navbutton" id="userlist" name="userlist" value="USER LIST"/>
        </div>
            <div style="float:left; position:relative; top:6%;">
            <img style="width:13%;height:60%; vertical-align:middle;" src="img/search.ico">
            <input style="width:70%" id="input-search" type="text" name="search" placeholder="Search anything you want"/>
            </div>
        <div style="text-align:center;position:relative;top:9%;">
            <input id="button-search" style="font-size:150%" type="button" name="search" value="search"/>
        </div>
    </div>
</div>
<div id="manage">
    <div id="content" class="border">
        <div id="contenttitle">
            <img style="width:3%;height:70%; vertical-align:bottom;" src="img/info.ico">
            <span style="font-size:150%">USERS INFO</span>
        </div>
        <div id="content-table" style="text-align:center;font-size:150%; padding:1%;">
        <table>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Password</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>age</th>
                <th>User Type</th>
                <th>Pay</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
                <?php
                    $sql = "select * from allusers";
                $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
                        or die("unable to connect mysql");
                    $select = mysql_select_db('users',$con)
                        or die('Could not select users');
                    $res = mysql_query($sql)
                        or die('Invalid query');
                    while($row = mysql_fetch_array($res)){
                        echo '<tr>';
                        echo '<td>'.$row['userindex'].'</td>';
                        echo '<td>'.$row['username'].'</td>';
                        echo '<td>'.$row['password'].'</td>';
                        echo '<td>'.$row['firstname'].'</td>';
                        echo '<td>'.$row['lastname'].'</td>';
                        echo '<td>'.$row['age'].'</td>';
                        echo '<td>'.$row['usertype'].'</td>';
                        echo '<td>$'.$row['pay'].'</td>';
                        echo '<td><img style="width:70px;height:70px" src="' . $row['employeeimg'] . '"></td>';
                        echo '<td><img style="width:10%;height:40%; vertical-align:middle;" src="img/delete.ico">
                                    <a id="delete" href="deleteuser.php?delete='.$row['userindex'].'" style="font-size:100%">Delete</a>
                                  <img style="width:10%;height:50%; vertical-align:middle;" src="img/modify.ico">
                                    <a id="modify" href="javascript:changefunc('.$row['userindex'].');" style="font-size:100%">Modify</a>
                            </td></tr>';
                    }
                ?>
            </tr>
        </table>
        </div>
        <p id="text"></p>
    </div>
</div>
</div>
</body>
</html>
