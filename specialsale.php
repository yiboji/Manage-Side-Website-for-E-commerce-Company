<?php
/**
 * Created by PhpStorm.
 * User: yiboji
 * Date: 6/20/15
 * Time: 12:28 AM
 */
$sql = "select * from specialsale";

$con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
or die("unable to connect mysql");
$select = mysql_select_db('users', $con)
or die('Could not select users');
$res = mysql_query($sql)
or die('Invalid query' . $sql);
echo '<table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Product Image</th>
            <th>Action</th>
        </tr>';
while ($row = mysql_fetch_array($res)) {

    $sql="select * from product where productID=".$row['productID'];
    $result=mysql_query($sql)
    or die('Invalid query for productcategory');
    $productrow = mysql_fetch_array($result);

    $sql="select * from productcategory where productcategoryID=".$productrow['productcategoryID'];
    $result=mysql_query($sql)
    or die('Invalid query for productcategory');
    $caterow = mysql_fetch_array($result);

    echo '<tr>';
    echo '<td>' . $productrow['productID'] . '</td>';
    echo '<td>' . $productrow['productname'] . '</td>';
    echo '<td>' .$caterow['categoryname'] . '</td>';
    echo '<td>' . $productrow['description'] . '</td>';
    echo '<td>$' . $productrow['pricerange'] . '</td>';
    echo '<td>' . $row['discount'] . '</td>';
    echo '<td>' . $row['startdate'] . '</td>';
    echo '<td>' . $row['enddate'] . '</td>';
    echo '<td><img style="width:70px;height:70px" src="' . $productrow['productimg'] . '"></td>';
    echo '<td>
            <img style="width:10%;height:20%; vertical-align:middle;" src="img/remove.ico">
            <a id="remove" href="javascript:removespecialfunc(' . $productrow['productID'] . ');" style="font-size:100%">Remove</a>
            <br>
            <img style="width:10%;height:30%; vertical-align:middle;" src="img/delete.ico">
            <a id="delete" href="deleteproduct.php?delete=' . $productrow['productID'] . '" style="font-size:100%">Delete</a>
            <br>
            <img style="width:10%;height:30%; vertical-align:middle;" src="img/modify.ico">
            <a id="modify" href="javascript:changefunc(' . $productrow['productID'] . ');" style="font-size:100%">Modify</a>
        </td></tr>';

}
echo '</table>';