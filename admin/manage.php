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
<title>Admin .::</title>
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

<h1><img src="../images/property.JPG" width="114" height="95" />Manage Properties</h1>
<?php
$fetch="SELECT `id`, `name`, `email` , `email`, `add`, MONTHNAME(`datetime`) AS `month`, DAYOFMONTH(`datetime`)AS `day`, YEAR(`datetime`) AS `year`FROM `agent` ORDER BY `name` ASC";
$exe=$object->query($fetch);
?>

<table width="800" border="1" style="text-align:center;">
<?php
while($row=mysql_fetch_array($exe)){
	?>
  <tr>
    <td><?php echo $row['name'];?></td>
 
    <td>Date Listed: <?php echo $row['month']. " ". $row['day']. ", " . $row['year'];?> </td>
    
    
    
    <td><?php	if($object->numOfAgentProp($row['id'], 'rent')>0){?>
<a href="<?php echo "manage_rent.php?agentid={$row['id']}&agent={$row['name']}";?>">
    Properties on Rent:  <?php echo $object->numOfAgentProp($row['id'], 'rent');?><img src="../images/pencil.JPG" width="23" height="29" />&nbsp;</a>    <?php }
	elseif($object->numOfAgentProp($row['id'], 'rent')==0){ echo "0 Properties";}
	?>
</td>
    
    <td>    <?php 
    if($object->numOfAgentProp($row['id'], 'sale')>0){?>
<a href="<?php echo "manage_sale.php?agentid={$row['id']}&agent={$row['name']}";?>">
    Properties on Sale:&nbsp;  <?php echo $object->numOfAgentProp($row['id'], 'sale');?><img src="../images/pencil.JPG" width="22" height="29" /></a>    <?php }
	elseif($object->numOfAgentProp($row['id'], 'sale')==0){ echo "0 Properties";}
	?>
</td>
  </tr>

	
	
<?php	}?>
</table>

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
