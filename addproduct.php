<?php
$errmsg = "";

if (isset($_POST['finishadd'])) {
    $productname = $_POST['productname'];
    $categoryid = $_POST['productcategory'];
    $description = $_POST['description'];
    $pricerange = $_POST['pricerange'];
    $filepath = "";

//    special sale
    $discount = $_POST['discount'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

//add file
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
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
        require 'addproduct.html';
        echo $errmsg;
    } else {
        //good to add
        $sql = "insert into product (productcategoryID, productname, description, pricerange, productimg)
                value ('$categoryid','$productname','$description','$pricerange','$filepath')";
        $con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
        or die("unable to connect mysql");
        $select = mysql_select_db('users', $con)
        or die('Could not select users');
        $res = mysql_query($sql)
        or die('Invalid query');
        $sql = "select last_insert_id()"
        or die("Incalid query: get last id");
        $res = mysql_query($sql);
        $productID = mysql_fetch_array($res)[0];
        if(strlen($discount)!=0&&strlen($startdate)!=0&&strlen($enddate)!=0){
            $sql = "insert into specialsale (productID, discount, startdate, enddate)
                    value ('$productID','$discount','$startdate','$enddate')";
            $res = mysql_query($sql)
                or die('Invalid query add special sale');
        }
        header('Location: salamanager.php');
    }
} else if (isset($_POST['cancel'])) {
    header('Location:salamanager.php');
} else {
    require 'addproduct.html';
}
?>
