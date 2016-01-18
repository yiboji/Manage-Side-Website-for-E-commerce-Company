<?php
$con=mysql_connect('cs-server.usc.edu:8317','root','');
if(!$con){
    die('Unable to connect');
}
else echo "Connected successfully<br/>";
mysql_select_db('users');

//users table;
$sql = "CREATE TABLE allusers(".
    "userindex INT NOT NULL AUTO_INCREMENT PRIMARY KEY,".
    "username text,".
    "Password VARCHAR(18),".
    "Pay INT(18),".
    "Firstname VARCHAR(18),".
    "Lastname VARCHAR(18),".
    "Age INT(3));";
$res = mysql_query($sql,$con);
if(! $res){
    die("Unable to create table:".mysql_error());
}
echo "Table created successfully\n";
$insertsql1 = "INSERT INTO users
				  VALUES
				  (null,'Administrator','1','1111',5000,'ab','cd',30)";
$insertsql2 = "INSERT INTO users
				  VALUES
				  (null,'Manager','2','2222',10000,'abc','def',35)";
$insertsql3 = "INSERT INTO users
				  VALUES
				  (null,'Salesman','3','3333',6000,'12','34',31)";
mysql_select_db('sgou');
$res1 = mysql_query($insertsql1);
$res2 = mysql_query($insertsql2);
$res3 = mysql_query($insertsql3);
if(! $res1){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";
if(! $res2){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";
if(! $res3){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";



//ProductCategory tables;

$sql1 = "CREATE TABLE cate(".
    "ProductcategoryId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,".
    "Productcategoryname VARCHAR(18),".
    "Productcategorydescription VARCHAR(30))";
mysql_select_db('sgou');
$res1 = mysql_query($sql1,$con);
if(! $res1){
    die("Unable to create table:".mysql_error());
}
echo "Table created successfully\n";
$insertcatesql1 = "INSERT INTO cate
				  VALUES
				  (null,'fragrance','fresh and spirited ')";
$insertcatesql2 = "INSERT INTO cate
				  VALUES
				  (null,'makeup','to be a better you')";
$insertcatesql3 = "INSERT INTO cate
				  VALUES
				  (null,'skincare','ultimate recovery')";
$insertcatesql4 = "INSERT INTO cate
                   VALUES
                   (null,'handbag','fashion is from here')";
mysql_select_db('sgou');
$rescate1 = mysql_query($insertcatesql1);
$rescate2 = mysql_query($insertcatesql2);
$rescate3 = mysql_query($insertcatesql3);
$rescate4 = mysql_query($insertcatesql4);
if(! $rescate1){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";
if(! $rescate2){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";
if(! $rescate3){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";
if(! $rescate4){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";

//Product table;
$sql2 = "CREATE TABLE product(".
    "ProductId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,".
    "ProductcategoryId INT(18),".
    "Productname VARCHAR(30),".
    "Productdescription VARCHAR(100),".
    "Productimg VARCHAR(50),".
    "Productprice INT(18))";

mysql_select_db('sgou');
$res2 = mysql_query($sql2,$con);
if(! $res2){
    die("Unable to create table: product".mysql_error());
}
echo "Table created successfully\n";
$insertprosql1 = "INSERT INTO product
				  VALUES
				  (null,1,'No.5',' a silky-smooth harmony of notes that reveals the delicate facet of forever fragrance','image/No.5.jpg',100)";
$insertprosql2 = "INSERT INTO product
				  VALUES
				  (null,1,'COCO','Sexy, fresh Oriental fragrance','image/COCO.jpg',118)";
$insertprosql3 = "INSERT INTO product
				  VALUES
				  (null,1,'CHANCE EAU VIVE','A lively fragrance, radiant with energy','image/EAU VIVE.jpg',97)";
$insertprosql4 = "INSERT INTO product
                   VALUES
                   (null,1,'CHANCE EAU TENDER','CHANEL Master Perfumer Jacques Polge reimagines the decidedly young scent','image/EAU TENDER.jpg',97)";

$insertprosql5 = "INSERT INTO product
				  VALUES
				  (null,2,'LE BLANC DE CHANEL','Ingenious multi-tasking oil- free fluid skin perfectly for makeup','image/LE BLANC DE CHANEL.jpg',45)";
$insertprosql6 = "INSERT INTO product
				  VALUES
				  (null,2,'CRAYON SOURCILS','The ideal way to groom your eyebrows','image/RAYON SOURCILS.jpg',29)";
$insertprosql7 = "INSERT INTO product
				  VALUES
				  (null,2,'ROUGE COCO','In a new formula and vibrant colour spectrum','image/ROUGE COCO.jpg',36)";
$insertprosql8 = "INSERT INTO product
                   VALUES
                   (null,2,'LE VERNIS','Classic and trend-defining shades in an exclusive formula that strengthens and moisturizes nails','image/LE VERNIS.jpg',27)";

$insertprosql9 = "INSERT INTO product
				  VALUES
				  (null,3,'SUBLIMAGE CLEANSER','The ultimate in daily cleansin','image/SUBLIMAGE CLEANSER.jpg',100)";
$insertprosql10 = "INSERT INTO product
				  VALUES
				  (null,3,'SUBLIMAGE MASQUE','Richly textured, anti-aging mask','image/SUBLIMAGE MASQUE.jpg',200)";
$insertprosql11 = "INSERT INTO product
				  VALUES
				  (null,3,'SUBLIMAGE LE FLUIDE','Empowered with ultra-pure natural ingredients','image/SUBLIMAGE MASQUE.jpg',310)";
$insertprosql12 = "INSERT INTO product
                   VALUES
                   (null,3,'BODY EXCELLENCE','This multi-tasking, revitalizing formula contains a power-play of ingredients','image/BODY EXCELLENCE.jpg',48)";

$insertprosql13 = "INSERT INTO product
				  VALUES
				  (null,4,'BOY FLAP BAG','Wonderful','image/BOY FLAP BAG.jpg',4300)";
$insertprosql14 = "INSERT INTO product
				  VALUES
				  (null,4,'2.55 FLAP BAG','Pure and beautiful','image/2.55 FLAP BAG.jpg',4900)";
$insertprosql15 = "INSERT INTO product
				  VALUES
				  (null,4,'SHOPPING BAG','Cool','image/SHOPPING BAG.jpg',5000)";
$insertprosql16 = "INSERT INTO product
                   VALUES
                   (null,4,'BACKPACK','Beautiful and convenient','image/BACKPACK.jpg',3800)";
mysql_select_db('sgou');
$respro1 = mysql_query($insertprosql1);
$respro2 = mysql_query($insertprosql2);
$respro3 = mysql_query($insertprosql3);
$respro4 = mysql_query($insertprosql4);
$respro5 = mysql_query($insertprosql5);
$respro6 = mysql_query($insertprosql6);
$respro7 = mysql_query($insertprosql7);
$respro8 = mysql_query($insertprosql8);
$respro9 = mysql_query($insertprosql9);
$respro10 = mysql_query($insertprosql10);
$respro11 = mysql_query($insertprosql11);
$respro12 = mysql_query($insertprosql12);
$respro13 = mysql_query($insertprosql13);
$respro14 = mysql_query($insertprosql14);
$respro15 = mysql_query($insertprosql15);
$respro16 = mysql_query($insertprosql16);

if(! $respro1){
    die("Unable to insert table:respro1".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro2){
    die("Unable to insert table:respro2".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro3){
    die("Unable to insert table:respro3".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro4){
    die("Unable to insert table:respro4".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro5){
    die("Unable to insert table:respro5".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro6){
    die("Unable to insert table:respro6".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro7){
    die("Unable to insert table:respro7".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro8){
    die("Unable to insert table:respro8".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro9){
    die("Unable to insert table:respro9".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro10){
    die("Unable to insert table:respro10".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro11){
//    echo $insertprosql11;
    die("Unable to insert table:respro11".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro12){
    die("Unable to insert table:respro12".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro13){
    die("Unable to insert table:respro13".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro14){
    die("Unable to insert table:respro14".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro15){
    die("Unable to insert table:respro15".mysql_error());
}
echo "Table inserted successfully\n";
if(! $respro16){
    die("Unable to insert table:respro16".mysql_error());
}

//Special sales
$sql3 = "CREATE TABLE specialsales(".
    "SpecialsalesId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,".
    "ProductcategoryId INT,".
    "Discount INT,".
    "Startdate DATE,".
    "Enddate DATE)";
mysql_select_db('sgou');
$res3 = mysql_query($sql3,$con);
if(! $res3){
    die("Unable to create table:".mysql_error());
}
echo "Table created successfully\n";
$insertspesql1 = "INSERT INTO specialsales
				  VALUES
				  (null,1,20,'2015-06-13','2015-07-10')";
$insertspesql2 = "INSERT INTO specialsales
				  VALUES
				  (null,2,30,'2015-03-10','2015-08-10')";
$insertspesql3 = "INSERT INTO specialsales
				  VALUES
				  (null,3,40,'2015-04-10','2015-10-10')";
$insertspesql4 = "INSERT INTO specialsales
				  VALUES
				  (null,4,50,'2015-10-05','2015-11-11')";

mysql_select_db('sgou');
$resspe1 = mysql_query($insertspesql1);
$resspe2 = mysql_query($insertspesql2);
$resspe3 = mysql_query($insertspesql3);
$resspe4 = mysql_query($insertspesql4);


if(! $resspe1){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";
if(! $resspe2){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";
if(! $resspe3){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";
if(! $resspe4){
    die("Unable to insert table:".mysql_error());
}
echo "Table inserted successfully\n";



mysql_close($con);