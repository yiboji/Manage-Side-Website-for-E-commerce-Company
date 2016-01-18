<?php
    session_start();
    if($_SESSION["usertype"]!='Manager')
        header("Location:login.php");
    if(time()>$_SESSION['expiretime']){
        header("Location:logout.php?timeout='timeout'");
    }
?>

<html>
<head>
    <style>
        html, body{
            width:100%;
            height:100%;
            background-image: url('img/wallbackground.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .frame{
            overflow:hidden;
        }
        .item{
            background-size:cover;
            background-repeat: no-repeat;
            overflow:hidden;
        }
        .item div{
            display:none;
            width:100%;
            height:100%;
        }
        .item:hover{
            cursor:pointer;
        }
        .item:hover div{
            display:block;
            color:#FFF;
            background:#000;
            filter:alpha(opacity=60);
            opacity: 0.5;
        }
        .frame{
            background-image:url('img/picframe.png');
            background-size:cover;
            background-repeat:no-repeat;
            width:335px;
            height:234px;
        }
        .container{
            background:transparent;
            overflow:scroll;
            width:95%;
            height:70%;
            position:absolute;
            top:30%;
            left:2%;
        }
        #downarrow{
            background:transparent;
            position:absolute;
            left:3%;
            bottom:5%;
            animation:downmove 2s ease-in-out infinite;
            visibility:visible;
        }
        @keyframes downmove {
            from {bottom:5%;}
            to {bottom:2%;}
        }
    </style>
    <script>
        function isScrollToEnd(){
            if(document.getElementById('productpage').style.visibility=='visible')
                var divObj = document.getElementById('productpage');
            else if(document.getElementById('userpage').style.visibility=='visible')
                var divObj = document.getElementById('userpage');
            else
                var divObj = document.getElementById('specialsalepage');

            if(divObj.scrollTop<divObj.scrollHeight/2){
                document.getElementById('downarrow').style.visibility = 'visible';
            }
            else
                document.getElementById('downarrow').style.visibility = 'hidden';
        }

        function showPage(page){
            switch (page){
                case 'product':
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("productpage").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "productpage.php", true);
                    xmlhttp.send();

                    document.getElementById("productpage").style.visibility='visible';
                    document.getElementById("userpage").style.visibility='hidden';
                    document.getElementById("specialsalepage").style.visibility='hidden';
                    break;
                case 'employee':
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("userpage").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "userpage.php", true);
                    xmlhttp.send();

                    document.getElementById("productpage").style.visibility='hidden';
                    document.getElementById("userpage").style.visibility='visible';
                    document.getElementById("specialsalepage").style.visibility='hidden';
                    break;
                case 'specialsale':
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("specialsalepage").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "specialsalepage.php", true);
                    xmlhttp.send();

                    document.getElementById("productpage").style.visibility='hidden';
                    document.getElementById("userpage").style.visibility='hidden';
                    document.getElementById("specialsalepage").style.visibility='visible';
                    break;
            }
        }
        function searchTypeChange() {
            switch (document.getElementById("searchtype").value) {
                case "text":
                    document.getElementById("text").style.display = 'block';
                    document.getElementById("pricerange").style.display = 'none';
                    document.getElementById("startdate").style.display = 'none';
                    document.getElementById("enddate").style.display = 'none';
                    document.getElementById("category").style.display = 'none';
                    break;
                case "pricerange":
                    document.getElementById("text").style.display = 'none';
                    document.getElementById("pricerange").style.display = 'block';
                    document.getElementById("startdate").style.display = 'none';
                    document.getElementById("enddate").style.display = 'none';
                    document.getElementById("category").style.display = 'none';
                    break;
                case "startdate":
                    document.getElementById("text").style.display = 'none';
                    document.getElementById("pricerange").style.display = 'none';
                    document.getElementById("startdate").style.display = 'block';
                    document.getElementById("enddate").style.display = 'none';
                    document.getElementById("category").style.display = 'none';
                    break;
                case "enddate":
                    document.getElementById("text").style.display = 'none';
                    document.getElementById("pricerange").style.display = 'none';
                    document.getElementById("startdate").style.display = 'none';
                    document.getElementById("enddate").style.display = 'block';
                    document.getElementById("category").style.display = 'none';
                    break;
                case "category":
                    document.getElementById("text").style.display = 'none';
                    document.getElementById("pricerange").style.display = 'none';
                    document.getElementById("startdate").style.display = 'none';
                    document.getElementById("enddate").style.display = 'none';
                    document.getElementById("category").style.display = 'block';
                    break;
            }
        }
            function managersearch(){
                var searchtype = document.getElementById("searchtype").value;
                var productpage = false;
                var userpage = false;
                var specialsalepage = false;
                if(document.getElementById("productpage").style.visibility=='visible'){
                    productpage = true;
                }
                else if(document.getElementById("userpage").style.visibility=='visible'){
                    userpage = true;
                }
                else if(document.getElementById("specialsalepage").style.visibility=='visible'){
                    specialsalepage = true;
                }

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(productpage)
                            document.getElementById("productpage").innerHTML = xmlhttp.responseText;
                        else if(userpage)
                            document.getElementById("userpage").innerHTML = xmlhttp.responseText;
                        else if(specialsalepage)
                            document.getElementById("specialsalepage").innerHTML = xmlhttp.responseText;
                    }
                }
                switch(searchtype){
                    case "text":
                        if(productpage)
                            xmlhttp.open("GET", "managersearch.php?page='product'&text=" + document.getElementsByName("text")[0].value, true);
                        else if(userpage)
                            xmlhttp.open("GET", "managersearch.php?page='allusers'&text=" + document.getElementsByName("text")[0].value, true);
                        else if(specialsalepage)
                            xmlhttp.open("GET", "managersearch.php?page='specialsale'&text=" + document.getElementsByName("text")[0].value, true);
                        break;
                    case "pricerange":
                        if(productpage)
                            xmlhttp.open("GET",
                            "managersearch.php?page='product'&rangefrom=" +
                            document.getElementsByName("rangefrom")[0].value+
                            "&rangeto="+
                            document.getElementsByName("rangeto")[0].value,
                            true);
                        else if(userpage)
                            xmlhttp.open("GET",
                                "managersearch.php?page='allusers'&rangefrom=" +
                                document.getElementsByName("rangefrom")[0].value+
                                "&rangeto="+
                                document.getElementsByName("rangeto")[0].value,
                                true);
                        else if(specialsalepage)
                            xmlhttp.open("GET",
                                "managersearch.php?page='specialsale'&rangefrom=" +
                                document.getElementsByName("rangefrom")[0].value+
                                "&rangeto="+
                                document.getElementsByName("rangeto")[0].value,
                                true);
                        break;
                    case "startdate":
                        if(productpage)
                            xmlhttp.open("GET", "managersearch.php?page='product'&startdate=" + document.getElementsByName("startdate")[0].value, true);
                        else if(userpage)
                            xmlhttp.open("GET", "managersearch.php?page='allusers'&startdate=" + document.getElementsByName("startdate")[0].value, true);
                        else if(specialsalepage)
                            xmlhttp.open("GET", "managersearch.php?page='specialsale'&startdate=" + document.getElementsByName("startdate")[0].value, true);
                        break;
                    case "enddate":
                        if(productpage)
                            xmlhttp.open("GET", "managersearch.php?page='product'&enddate=" + document.getElementsByName("enddate")[0].value, true);
                        else if(userpage)
                            xmlhttp.open("GET", "managersearch.php?page='allusers'&enddate=" + document.getElementsByName("enddate")[0].value, true);
                        else if(specialsalepage)
                            xmlhttp.open("GET", "managersearch.php?page='specialsale'&enddate=" + document.getElementsByName("enddate")[0].value, true);
                        break;
                    case "category":
                        if(productpage)
                            xmlhttp.open("GET", "managersearch.php?page='product'&category=" + document.getElementsByName("category")[0].value, true);
                        else if(specialsalepage)
                            xmlhttp.open("GET", "managersearch.php?page='specialsale'&category=" + document.getElementsByName("category")[0].value, true);
                        break;
                }
                xmlhttp.send();
            }
    </script>
</head>

<body>
<div id="loginfo" style="font-family:Comic Sans MS; color:white;position:absolute;left:2%;top:2%;">
    USER ID:&nbsp<?php echo $_SESSION["userid"] ?><br>
    USER TYPE:&nbsp<?php echo $_SESSION["usertype"] ?><br>
    <a style="color:white;" href="logout.php">Log Out</a>
</div>

<div id="search" style="font-family:Comic Sans MS; color:white;position:absolute;right:2%;top:2%;">
    SEARCH:<br/>
    <select id="searchtype" name="seachtype" onchange="searchTypeChange()">
        <option value="text" selected>Search any text you want</option>
        <option value="pricerange">Search by price or pay range</option>
        <option value="category">Search by category</option>
        <option value="startdate">Search by start date</option>
        <option value="enddate">Search by end date</option>
    </select>
    <br/>
    <span id="text"><input style="display:block" type="text" name="text" placeholder="Search anything you want"/></span>
    <span id="pricerange" style="display: none">
        from
        <input type="number" name="rangefrom" step="10" min="0" max="100000"/><br>
        to
        <input type="number" name="rangeto" step="10" min="0" max="100000"/>
    </span>
    <span id="startdate" style="display:none">Start Date<br/><input type="date" name="startdate"/></span>
    <span id="enddate" style="display:none">End Date<br/><input type="date" name="enddate"/></span>
    <span id="category" style="display:none">
        <select name="category">
            <option value="1">Headphones</option>
            <option value="2">Speakers</option>
            <option value="3">Home Theater</option>
            <option value="4">Wave System</option>
        </select>
    </span>
    <input type="button" onclick="managersearch()" name="search" value="search"/>
</div>

<div style="position:absolute;left:17%;top:20%; ">
    <a style="color:white;" href="javascript:showPage('product')">Products</a>
</div>
<div style="position:absolute;left:47.5%;top:20%;">
    <a style="color:white;" href="javascript:showPage('employee')">Employees</a>
</div>
<div style="position:absolute;left:79.5%;top:20%;">
    <a style="color:white;" href="javascript:showPage('specialsale')">Special Sale</a>
</div>

<div class="container" id="productpage" style=" visibility:visible;font-family: Times New Roman" onscroll="isScrollToEnd()">
<?php
    $sql = "select * from product";
    $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
    or die("unable to connect mysql");
    $select = mysql_select_db('users', $con)
    or die('Could not select users');
    $res = mysql_query($sql)
    or die('Invalid query');
    $startleft = 8;
    $starttop = 0;
    $shift = 1;
    $positionleft = $startleft;
    $positiontop = $starttop;
    $count = 0;
    while ($row = mysql_fetch_array($res)) {
        echo "<div class='frame' style='position:absolute;left:$positionleft%;top:$positiontop'>
        <div class='item' style='background-image: url(\"".$row['productimg']."\");position:relative;left:10%;top:15%;width:266px;height:165px'>
            <div>";
        echo "Product ID: ".$row['productID'].";<br>";
        echo "Product Name: ".$row['productname'].";<br>";
        $sql="select * from productcategory where productcategoryID=".$row['productcategoryID'];
        $result=mysql_query($sql)
        or die('Invalid query for productcategory');
        $caterow = mysql_fetch_array($result);
        echo "Product Category: ".$caterow['categoryname'].";<br>";
        echo "Description: ".$row['description'].";<br>";
        echo "Price: $".$row['pricerange'].";<br>";
        echo "</div>
        </div>
        </div>";
        $count++;
        if($count==3) {
            $positionleft = $startleft;
            $positiontop += 250;
            $count = 0;
        }
        else{
            $positionleft += ($shift+30);
        }
    }
?>
</div>
<div class="container" id="userpage" style="visibility:hidden; font-family: Times New Roman" onscroll="isScrollToEnd()">
    <?php
    $sql = "select * from allusers";
    $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
    or die("unable to connect mysql");
    $select = mysql_select_db('users', $con)
    or die('Could not select users');
    $res = mysql_query($sql)
    or die('Invalid query');
    $startleft = 8;
    $starttop = 0;
    $shift = 1;
    $positionleft = $startleft;
    $positiontop = $starttop;
    $count = 0;
    while ($row = mysql_fetch_array($res)) {
        echo "<div class='frame' style='position:absolute;left:$positionleft%;top:$positiontop'>
        <div class='item' style='background-image: url(\"".$row['employeeimg']."\");position:relative;left:10%;top:15%;width:266px;height:165px'>
            <div>";
        echo "User ID: ".$row['userindex'].";<br>";
        echo "User Name: ".$row['username'].";<br>";
        echo "First Name: ".$row['firstname'].";<br>";
        echo "Last Name: ".$row['lastname'].";<br>";
        echo "User Type: ".$row['usertype'].";<br>";
        echo "Age: ".$row['age'].";<br>";
        echo "Pay: $".$row['pay'].";<br>";
        echo "</div>
        </div>
        </div>";
        $count++;
        if($count==3) {
            $positionleft = $startleft;
            $positiontop += 250;
            $count = 0;
        }
        else{
            $positionleft += ($shift+30);
        }
    }
    ?>
</div>
<div class="container" id="specialsalepage" style="visibility:hidden; font-family: Times New Roman" onscroll="isScrollToEnd()">
    <?php
    $sql = "select * from specialsale";
    $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
    or die("unable to connect mysql");
    $select = mysql_select_db('users', $con)
    or die('Could not select users');
    $res = mysql_query($sql)
    or die('Invalid query');
    $startleft = 8;
    $starttop = 0;
    $shift = 1;
    $positionleft = $startleft;
    $positiontop = $starttop;
    $count = 0;
    while ($specialrow = mysql_fetch_array($res)) {

        $sql = "select * from product where productID=".$specialrow['productID'];
        $result = mysql_query($sql)
            or die("Invalid query for product");
        $row = mysql_fetch_array($result);

        echo "<div class='frame' style='position:absolute;left:$positionleft%;top:$positiontop'>
        <div class='item' style='background-image: url(\"".$row['productimg']."\");position:relative;left:10%;top:15%;width:266px;height:165px'>
            <div>";
        echo "Product ID: ".$row['productID'].";<br>";
        echo "Product Name: ".$row['productname'].";<br>";
        $sql="select * from productcategory where productcategoryID=".$row['productcategoryID'];
        $result=mysql_query($sql)
        or die('Invalid query for productcategory');
        $caterow = mysql_fetch_array($result);
        echo "Product Category: ".$caterow['categoryname'].";<br>";
        echo "Description: ".$row['description'].";<br>";
        echo "Price: $".$row['pricerange'].";<br>";
        echo "Discount: ".$specialrow['discount']."%;<br>";
        echo "Start Date: ".$specialrow['startdate'].";<br>";
        echo "End Date: ".$specialrow['enddate'].";<br>";
        echo "</div>
        </div>
        </div>";
        $count++;
        if($count==3) {
            $positionleft = $startleft;
            $positiontop += 250;
            $count = 0;
        }
        else{
            $positionleft += ($shift+30);
        }
    }
    ?>
</div>
<div id="downarrow">
    <img src="img/down.ico">
</div>
</body>

</html>
