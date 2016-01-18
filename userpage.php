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