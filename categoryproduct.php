<?php
/**
 * Created by PhpStorm.
 * User: yiboji
 * Date: 6/20/15
 * Time: 12:28 AM
 */
$categoryID = $_GET['category'];
$sql = "select * from product where productcategoryID=$categoryID";

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
            <th>Product Image</th>
            <th>Action</th>
        </tr>';
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
                                    <a id="delete" href="deleteuser.php?delete=' . $row['productID'] . '" style="font-size:100%">Delete</a>
                                    </br></br>
                                  <img style="width:20%;height:30%; vertical-align:middle;" src="img/modify.ico">
                                    <a id="modify" href="javascript:changefunc(' . $row['productID'] . ');" style="font-size:100%">Modify</a>
                            </td></tr>';
}
echo '</table>';
?>
