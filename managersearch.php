<?php
/**
 * Created by PhpStorm.
 * User: yiboji
 * Date: 6/22/15
 * Time: 6:07 PM
 */
$table = $_GET['page'];
$searchmsg = "";
$startdate = "";
$enddate = "";
$rangefrom = "";
$rangeto = "";
$category = "";
if(isset($_GET['text'])){
    $searchmsg = $_GET['text'];
}
else if(isset($_GET['startdate'])){
    $startdate = $_GET['startdate'];
}
else if(isset($_GET['enddate'])){
    $enddate = $_GET['enddate'];
}
else if(isset($_GET['category'])){
    $category = $_GET['category'];
}
else{
    $rangefrom = $_GET['rangefrom'];
    $rangeto = $_GET['rangeto'];
}
$con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
or die("unable to connect mysql");
$select = mysql_select_db('users', $con)
or die('Could not select users');

if($table=="'allusers'"){
    if(strlen($searchmsg)==0){
//pay range
        $sql= "select * from allusers where pay>$rangefrom and pay<$rangeto";
    }
    else{
        if (is_numeric($searchmsg))
            $sql = "select * from allusers where age=$searchmsg or userindex=$searchmsg";
        else
            $sql = "select * from allusers where username like '%$searchmsg%' or usertype like '%$searchmsg%' or firstname like '%$searchmsg' or lastname like '%$searchmsg'";
    }
    if(strlen($startdate)!=0||strlen($enddate)!=0){
        $sql = "select * from allusers";
    }
    $res = mysql_query($sql)
        or die('Invalid query' . $sql);

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
}
else if($table=="'product'"){
    if(strlen($rangefrom)!=0){
        $sql = "select * from product where pricerange>$rangefrom and pricerange<$rangeto";
    }
    else if(strlen($category)!=0){
        $sql = "select * from product where productcategoryID=$category";
    }
    else{
        if (is_numeric($searchmsg))
            $sql = "select * from product where productID=$searchmsg or productcategoryID=$searchmsg";
        else
            $sql = "select * from product where productname like '%$searchmsg%' or description like '%$searchmsg%'";
    }
    if(strlen($startdate)!=0||strlen($enddate)!=0){
        $sql = "select * from product";
    }
    $res = mysql_query($sql)
    or die('Invalid query' . $sql);
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
        echo "Price: ".$row['pricerange'].";<br>";
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

}
else if($table=="'specialsale'"){
    if(strlen($startdate)!=0){
        $sql = "select * from specialsale where startdate='$startdate'";
    }
    else if(strlen($enddate)!=0){
        $sql = "select * from specialsale where enddate='$startdate'";
    }
    else
        $sql = "select * from specialsale";
    $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
    or die("unable to connect mysql");
    $select = mysql_select_db('users', $con)
    or die('Could not select users');
    $res = mysql_query($sql)
    or die('Invalid query'.$sql);
    $startleft = 8;
    $starttop = 0;
    $shift = 1;
    $positionleft = $startleft;
    $positiontop = $starttop;
    $count = 0;
    while ($specialrow = mysql_fetch_array($res)) {

        if(strlen($searchmsg)!=0){
            if (is_numeric($searchmsg))
                $sql = "select * from product where productID=".$specialrow['productID']." and productcategoryID=$searchmsg";
            else
                $sql = "select * from product where productID=".$specialrow['productID'].
                    " and (productname like '%$searchmsg%' or description like '%$searchmsg%')";
        }
        else if(strlen($rangefrom)!=0){
            $sql = "select * from product where productID=".$specialrow['productID']." and price>$rangefrom and price<$rangeto";
        }
        else if(strlen($category)!=0){
            $sql = "select * from product where productID=".$specialrow['productID']." and productcategoryID=$category";
        }
        else {
            $sql = "select * from product where productID=".$specialrow['productID'];
        }
        $result = mysql_query($sql)
        or die("Invalid query for product".$sql);
        $row = mysql_fetch_array($result);
        if(mysql_num_rows($result)){
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
            echo "Price: ".$row['pricerange'].";<br>";
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
    }

}
