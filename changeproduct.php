<?php
/**
 * Created by PhpStorm.
 * User: yiboji
 * Date: 6/18/15
 * Time: 9:52 PM
 */
$errmsg = "";
$productID = $_GET['change'];
$filepath = "";

if (isset($_POST['finishchange'])) {
    $productname = $_POST['productname'];
    $categoryid = $_POST['productcategory'];
    $description = $_POST['description'];
    $pricerange = $_POST['pricerange'];

    $discount = $_POST['discount'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $sql = "select * from product where productID='$productID'";
    $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
    or die("unable to connect mysql");
    $select = mysql_select_db('users', $con)
    or die('Could not select users');
    $res = mysql_query($sql)
    or die('Invalid query');
    $row = mysql_fetch_array($res);

//add file
    if ($_FILES["file"]["error"] > 0)
    {
        $filepath = $row['productimg'];
    }
    else{
        if (file_exists("productimg/" . $_FILES["file"]["name"]))
        {
            $filepath="productimg/".$_FILES["file"]["name"];
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "productimg/" . $_FILES["file"]["name"]);
            $filepath="productimg/".$_FILES["file"]["name"];
        }
    }

    if (strlen($productname) == 0) {
        $errmsg = 'Invalid Productname';
    } else if (strlen($description) == 0) {
        $errmsg = 'Invalid description';
    } else if (strlen($description) == 0) {
        $errmsg = 'Invalid Description';
    }

    //check typo
    //some code here
    if (strlen($errmsg) > 0) {
        require 'changeuser.html';
        echo $errmsg;
    } else {
        //good to change
        $sql = "update product set productcategoryID='$categoryid',
                productname='$productname', description='$description',
                pricerange='$pricerange', productimg='$filepath' where productID=$productID";
        $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
        or die("unable to connect mysql");
        $select = mysql_select_db('users', $con)
        or die('Could not select users');
        $res = mysql_query($sql)
        or die('Invalid query');

        if(strlen($discount)!=0&&strlen($startdate)!=0&&strlen($enddate)!=0){
            $sql = "select * from specialsale where productID='$productID'";
            $res = mysql_query($sql)
            or die("Invalid query for select from special");
            if(mysql_num_rows($res)){
                $sql = "update specialsale
                    set discount='$discount',
                    startdate='$startdate',
                    enddate='$enddate'
                    where productID=$productID";
            }
            else{
                $sql = "insert into specialsale (productID, discount, startdate, enddate)
                    value ('$productID','$discount','$startdate','$enddate')";
            }
            mysql_query($sql)
                or die("invalid query".$sql);
        }
        header('Location: salamanager.php');
    }
} else {
    $sql = "select * from product where productID='$productID'";
    $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
    or die("unable to connect mysql");
    $select = mysql_select_db('users', $con)
    or die('Could not select users');
    $res = mysql_query($sql)
    or die('Invalid query');
    $row = mysql_fetch_array($res);
    $productname = $row['productname'];
    $categoryid = $row['productcategoryID'];

    $description = $row['description'];
    $pricerange = $row['pricerange'];
    $filepath = $row['productimg'];

    $sql = "select * from specialsale where productID='$productID'";
    $res = mysql_query($sql)
        or die("Invalid query for select from special");
    $row = mysql_fetch_array($res);
    $discount = $row['discount'];
    $startdate = $row['startdate'];
    $enddate = $row['enddate'];

    require 'changeproduct.html';
}
?>