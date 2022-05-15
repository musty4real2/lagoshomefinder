<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../connect.php");
include("../lhfclass.php");
$object=new lhf();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Admin .:: Add new Property</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

</head>
<body id="top">
<div class="wrapper col0">
  <div id="topbar">
  <p>lagoshomefinder.com</p>
    <ul>
    </ul>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
        <div id="topnav">
      <ul>
        <li class="last"><a href="logout.php">Logout</a><img src="../images/logout.JPG" width="50" height="49" /><br/></li>
        <li><a href="admin_home.php">home<br/><img src="../images/home.JPG" width="52" height="54" /><br/>
        </a></li>
      </ul>
    </div>

    <div id="logo" >
    <img src="../images/logo.gif" style="float:left;" width="116" height="71" />
      <h1 style="margin-top:22px;"><a href="#">LagosHomeFinder</a></h1>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
  <marquee>
  Advertise with LagosHomeFinder!
  </marquee>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="admincontent" style="">

<?php 
$all="SELECT * FROM `rent`  WHERE `agent_id`='{$_GET['agentid']}' ORDER BY `date_added` DESC";
$all=@mysql_query($all) or die(mysql_error());
?>
<h1><?php echo $_GET['agent'];?> Properties on rent: <?php echo mysql_num_rows($all); ?></h1>
<?php
if(mysql_num_rows($all)>0){?>
<table width="90%" border="1"  style="text-align:center;">
<tr>
<td>ID</td>
<td></td>
<td>Date Listed</td>
<td>Price</td>
<td>Area:</td>
<td>Type:</td>
<td>Title:</td>
<td></td>
<td></td>
</tr>
<?php
while($row=mysql_fetch_array($all)){?>
	<tr>
	<td>#<?php echo $row['id'];?></td>
    <td>
    <?php 
	//GET the Main image from the image table for this result using the ID********************************************************
 $getimage= $object->getImageWhere($row['id'], 'rent_photo');
//****************************************************************************************************************************
	//*************************DISPLAY min image thumbnail*********************************************************************************
 while($m=mysql_fetch_array($getimage)){
	 $mainpic1=$m['mainpic1'];
$main=getimagesize("../properties/$mainpic1");
?>
<img  src="<?php echo "../properties/$mainpic1";?>"  <?php echo $object->imageResize($main[0], $main[1], 70);?> alt="<?php echo $row['title'];?>" />
<?php }
 //**********************************************************************************************************

?>
</td>
	<td><?php echo $row['date_added'];?></td>
	<td><?php echo $row['price'];?></td>
	<td><?php echo $row['area'];?></td>
	<td><?php echo $row['type'];?></td>
		<td><?php echo $row['title'];?></td>
        <td><a href="<?php echo "edit_rent.php?agentid={$_GET['agentid']}&agent={$_GET['agent']}&propid={$row['id']}";?>" title="delete this property"><img src="../images/pencil.JPG" width="30" height="37" /></a></td>
        <td><a onclick="return confirm('Remove this property from database');"  href="<?php echo "delete_property.php?agentid={$_GET['agentid']}&agent={$_GET['agent']}&propid={$row['id']}&table=rent&phototab=rent_photo&page=manage_rent.php";?>" title="delete this property"><img src="../images/cut.JPG" width="39" height="50" /></a></td>
</tr>
    <?php
	}//while $row
?>
</table>
<?php
}//IF num_rows>0
?>


      <div id="respond"></div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="footer"><br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">Westernedge Integrated Consult</a></p>
    <p class="fl_right">LagosHomeFinder.com</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
