<?php
    session_start();
    if($_SESSION["usertype"]!='Sale Manager')
        header("Location:login.php");
    if(time()>$_SESSION['expiretime']){
        header("Location:logout.php?timeout='timeout'");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        html, body {
            display: block;
            width: 100%;
            height: 100%;
        }

        #header {
            background-image: url("img/header.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: left top;
            width: 100%;
            height: 15%;

        }

        #container {
            width: 100%;
            height: 85%;
        }

        #nav {
            background-color: #01579b;
            width: 15%;
            height: 100%;
            /*float:left;*/
            /*padding-bottom: 4px;*/
            /*padding-top: 0px;*/
            /*padding-left:64px;*/
            position: relative;
            left: 0%;
            top: 0%;
        }

        #nav-header {
            height: 8%;
            border: 1px solid;
            border-color: #ffe #aaab9c #ccc #fff;
            /*text-decoration: none;*/
            background: #00b0ff;
        }

        #nav-content {
            /*width:112%;*/
            height: 80%;
            background-color: transparent;
            /*margin-left:-19%;*/
            /*margin-top:3%;*/
        }

        .navbutton {
            background: #004d40;
            font-size: 120%;
            font-family: "Times New Roman";
            text-align: center;
            width: 95%;
        }

        #manage {
            width: 84.5%;
            height: 84.5%;
            margin: 0.1%;

            position: absolute;;
            left: 16%;
            top: 16.5%;
        }

        .border {
            border: 2px solid #fff;
            border-color: #def #678 #345 #cde;
        }

        #content {
            width: 100%;
            height: 100%;
            overflow: scroll;
        }

        #contenttitle {
            width: 100%;
            height: 7%;
            border: 1px solid;
            border-color: #ffe #aaab9c #ccc #fff;
            text-decoration: none;
            background: #e8eaf6;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align;
            center;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(doReady);
        function doReady() {
            $("#add").click(addfunc);
            $("#button-search").click(searchfunc);
        }
        function addfunc() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "addproduct.php", true);
            xmlhttp.send();
        }
        function changefunc(productID) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "changeproduct.php?change=" + productID, true);
            xmlhttp.send();
        }
        function searchfunc() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "searchproduct.php?search=" + document.getElementById("input-search").value, true);
            xmlhttp.send();
        }
        function categoryfunc(index){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "categoryproduct.php?category=" + index, true);
            xmlhttp.send();
        }
        function specialsalefunc(){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "specialsale.php", true);
            xmlhttp.send();
        }
        function removespecialfunc(index){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content-table").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "removespecial.php?remove="+index, true);
            xmlhttp.send();
        }
        function checkform(){
            var flag = true;
            var reg = new RegExp("^[0-9]*")
            if(reg.test(document.getElementsByName("pricerange")[0].value)==false){
                document.getElementById("price").style.color = "red";
                flag = false;
            }
            if(document.getElementsByName("productcategory")[0].value=="default"){
                document.getElementById("productcategory").style.color = "red";
                flag = false;
            }
            return flag;
        }
    </script>
</head>

<body>
<div id="header" class="border">
    <div style="float:left;width:50%;">
        <div style="position:absolute;left:2%;top:6%;color:white;font-size:250%">&nbsp&nbspPRODUCT MANAGEMENT SYSTEM</div>
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
            <button onclick="location.href='logout.php'"
                    style="cursor:pointer;vertical-align: middle;display:inline;background: transparent;border:transparent;width:25%;height:4%;"
                    type="button" name="logout">
                <img src="img/logout.ico"/></button>
            Log out
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
                <input type="button" class="navbutton" id="add" name="add" value="ADD NEW PRODUCT"/>
                <br><br>
                <input onclick="location.href='salamanager.php'" type="button" class="navbutton" id="userlist"
                       name="userlist" value="ALL PRODUCTS"/>

                <br><br>
                <input onclick="categoryfunc(1)" type="button" class="navbutton" id="category1" name="headphones" value="Headphones"/>
                <br><br>
                <input onclick="categoryfunc(2)" type="button" class="navbutton" id="category2" name="speakers" value="Speakers"/>
                <br><br>
                <input onclick="categoryfunc(3)" type="button" class="navbutton" id="category3" name="hometheater" value="Home Theater"/>
                <br><br>
                <input onclick="categoryfunc(4)" type="button" class="navbutton" id="category4" name="wavesystem" value="Wave System"/>
                <br><br>
                <input onclick="specialsalefunc()" type="button" class="navbutton" id="specialsale" name="specialsale" value="Special Sale"/>
            </div>
            <div style="float:left; position:relative; top:6%;">
                <img style="width:13%;height:60%; vertical-align:middle;" src="img/search.ico">
                <input style="width:70%" id="input-search" type="text" name="search"
                       placeholder="Search anything you want"/>
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
                <span style="font-size:150%">PRODUCT INFO</span>
            </div>
            <div id="content-table" style="text-align:center;font-size:110%; padding:1%;">
                <table>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "select * from product";
                    $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
                    or die("unable to connect mysql");
                    $select = mysql_select_db('users', $con)
                    or die('Could not select users');
                    $res = mysql_query($sql)
                    or die('Invalid query');
                    while ($row = mysql_fetch_array($res)) {
                        echo '<tr>';
                        echo '<td>' . $row['productID'] . '</td>';
                        echo '<td>' . $row['productname'] . '</td>';
                        $sql="select * from productcategory where productcategoryID=".$row['productcategoryID'];
                        $result=mysql_query($sql)
                            or die('Invalid query for productcategory');
                        $caterow = mysql_fetch_array($result);
                        echo '<td>' .$caterow['categoryname'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '<td>$' . $row['pricerange'] . '</td>';
                        echo '<td><img style="width:70px;height:70px" src="' . $row['productimg'] . '"></td>';
                        echo '<td><img style="width:20%;height:30%; vertical-align:middle;" src="img/delete.ico">
                                    <a id="delete" href="deleteproduct.php?delete=' . $row['productID'] . '" style="font-size:100%">Delete</a>
                                    <br>
                                  <img style="width:20%;height:30%; vertical-align:middle;" src="img/modify.ico">
                                    <a id="modify" href="javascript:changefunc(' . $row['productID'] . ');" style="font-size:100%">Modify</a>
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
