<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("connect.php");
include("lhfclass.php");
$object=new lhf();
$table=$_GET['table'];
$ptab=$_GET['ptab'];
 $id=$_GET['id'];
 $email=$_GET['email'];
 $ptab=$_GET['ptab'];
 $agentid=$_GET['agentid'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>

<body>
<fieldset>

<?php
  
//******************************************************************************************************************************************

$salequery="SELECT * FROM `$table` WHERE `type`='{$_GET['type']}' AND `area`='{$_GET['area']}'";
$saleexecute=$object->query($salequery);

$salenumprop=mysql_num_rows($saleexecute);



if($salenumprop==0){
	echo "<p style='margin:30px 0 30px 0; text-align:center; border:1px solid #CCC;'><img src='images/info.JPG' width='56' height='50' />No Result found for : {$_GET['type']} Properties on $table in <b>{$_GET['area']}</b></p>";
	}
	
if($salenumprop>0){
echo "<center>{$_GET['type']} Properties on Sale in <b>{$_GET['area']}: $salenumprop</b></center>";
}
?>

<?php
while($row=mysql_fetch_array($saleexecute)){

?>

<div style="border-top:1px solid #CCC; border-bottom:1px solid #CCC; margin:30px 0 30px 0;">


<b> &nbsp;<img src="images/Home.png" width="34" height="34"/>.::<?php echo "<a href='view.php?id={$row['id']}&table=$table&ptab=$ptab&agent={$row['agent']}&sr={$_GET['sr']}&minprice={$row['price']}&maxprice={$row['price']}'>{$row['title']}</a><br/>"; ?> ::.</b>


<?php

//GET the Main image from the image table for this result using the ID********************************************************
 $getimage= $object->getImageWhere($row['id'], $_GET['ptab']);
//****************************************************************************************************************************

//GET number of pictures available for the result  ********************************************************
 
 $numpictures=$object->numOfpic($row['id'], $_GET['ptab']);
 //**********************************************************************************************************
 
 //*************************DISPLAY min image thumbnail*********************************************************************************
 while($m=mysql_fetch_array($getimage)){
	 $mainpic1=$m['mainpic1'];
	 	 	 if($mainpic1==""){$mainpic1='noimage.gif';}

$main=getimagesize("properties/$mainpic1");
?>
<img class="images"  style="float:left;" src="<?php echo "properties/$mainpic1";?>"  <?php echo $object->imageResize($main[0], $main[1], 100);?> alt="<?php echo $row['title'];?>" />

<?php 
 }
//**********************************************************************************************************

?>

<b>N<?php echo number_format($row['price']); ?></b>
<p>Location:<?php echo $row['area'];?><br/>
<b>Property Description:</b><br/>
<?php echo substr($row['description'], 0, 70); ?>...<br/>



<?php
 //*************************Link for user to view photo gallery of the property*********************************************************************
echo "<a href='view.php?id={$row['id']}&table=$table&ptab=$ptab&agent={$row['agent']}&sr={$_GET['sr']}&minprice={$row['price']}&maxprice={$row['price']}' title='Full details in picture slide' ><img src='images/photos.jpg' width='54' height='37' />Full Details in $numpictures photos</a>";
 //****************************************************************************************************************************************


}

?>



</body>
</html>