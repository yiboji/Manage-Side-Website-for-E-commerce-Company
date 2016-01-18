<?php
/**
 * Created by PhpStorm.
 * User: yiboji
 * Date: 6/20/15
 * Time: 12:28 AM
 */
$searchmsg = $_GET['search'];
if (is_numeric($searchmsg))
    $sql = "select * from allusers where age=$searchmsg or userindex=$searchmsg";
else
    $sql = "select * from allusers where username like '%$searchmsg%' or usertype like '%$searchmsg%' or firstname like '%$searchmsg' or lastname like '%$searchmsg'";
$con = mysql_connect('cs-server.usc.edu:8317', 'root', '')
or die("unable to connect mysql");
$select = mysql_select_db('users', $con)
or die('Could not select users');
$res = mysql_query($sql)
or die('Invalid query' . $sql);
echo '<table>
        <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Password</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>age</th>
        <th>User Type</th>
        <th>Action</th>
      </tr>';
while ($row = mysql_fetch_array($res)) {
    echo '<tr>';
    echo '<td>' . $row['userindex'] . '</td>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . $row['password'] . '</td>';
    echo '<td>' . $row['firstname'] . '</td>';
    echo '<td>' . $row['lastname'] . '</td>';
    echo '<td>' . $row['age'] . '</td>';
    echo '<td>' . $row['usertype'] . '</td>';
    echo '<td><img style="width:10%;height:50%; vertical-align:middle;" src="img/delete.ico">
                                    <a id="delete" href="deleteuser.php?delete=' . $row['userindex'] . '" style="font-size:100%">Delete</a>
                                  <img style="width:10%;height:80%; vertical-align:middle;" src="img/modify.ico">
                                    <a id="modify" href="javascript:changefunc(' . $row['userindex'] . ');" style="font-size:100%">Modify</a>
                            </td></tr>';
}
echo '</table>';
?>
