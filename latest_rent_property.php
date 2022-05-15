<b>Latest on Rent</b>

<?php
$query="SELECT * FROM `rent` ORDER BY `date_added` LIMIT 2";
$execute=$object->query($query);



//display all the result returned*************************************************************************************
while($row=mysql_fetch_array($execute)){
	?>

<?php
//GET the Main image from the image table for this result using the ID********************************************************
 $getimage= $object->getImageWhere($row['id'], 'rent_photo');
//****************************************************************************************************************************
?>
<?php echo "<a href='view.php?id={$row['id']}&table=rent&ptab=rent_photo&agent={$row['agent_id']}&
sr=rent&ty={$row['type']}&min={$row['price']}&max={$row['price']}&agentid={$row['agent_id']}
&&maxprice={$row['price']}&minprice={$row['price']}&sr=rent'>::{$row['title']}::</a>"; ?>


<?php
//GET number of pictures available for the result  ********************************************************
 
 $numpictures=$object->numOfpic($row['id'], 'rent_photo');
 //**********************************************************************************************************
 
 //*************************DISPLAY min image thumbnail*********************************************************************************
 while($m=mysql_fetch_array($getimage)){
	 $mainpic1=$m['mainpic1'];
	 	 if($mainpic1==""){$mainpic1='noimage.gif';}

$main=getimagesize("properties/$mainpic1");
?>
<img  style="border:none; position:absolute; right:0px;" src="images/new.jpg" width="62" height="30"/>
<img  style="float:left;" class="images"  src="<?php echo "properties/$mainpic1";?>"  <?php echo $object->imageResize($main[0], $main[1], 100);?> alt="<?php echo $row['title'];?>" />
<?php }
 //**********************************************************************************************************

?>


<b class="price">N<?php echo number_format($row['price']); ?></b>

<p style="font-size:9px;"><?php echo substr($row['description'], 0, 70); ?>...<p>


<?php
 //*************************Link for user to view photo gallery of the property*********************************************************************
echo "<a href='view.php?id={$row['id']}&table=rent&ptab=rent_photo&agent={$row['agent']}&sr=rent&ty={$row['type']}
&min={$row['price']}&max={$row['price']}&agentid={$row['agent_id']}&&maxprice={$row['price']}&
minprice={$row['price']}&ty={$row['type']}&sr=rent' title='Full details and picture slide'>view >>></a>";
 //****************************************************************************************************************************************


?>
<div style="margin-bottom:2px;"><p>&nbsp;</p></div>
<?php 
}//END of IF fsubmit
?>


