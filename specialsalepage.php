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