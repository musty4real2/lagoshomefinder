<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../connect.php");
include("../lhfclass.php");
$object=new lhf();
if($_SESSION['admin']==1){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<script type="text/javascript" src="../js/tinybox.js"></script>

<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

</head>


<?php if($_GET['finish']=="complete"){
	?>
		<body id="top" oncload="TINY.box.show({html:'Property entry Sucessfully complete!',animate:false,close:false,mask:true,boxid:'success',autohide:2,top:-14,left:-17})">
<?php
	}
?>


<?php if($_GET['finish']=="okay"){
	?>
		<body id="top" oncload="TINY.box.show({html:'Property entry Sucessfully complete. But no Images uploaded!',animate:false,close:false,mask:true,boxid:'success',autohide:2,top:-14,left:-17})">
<?php
	}
?>


<body id="top">
<div class="wrapper col0">
  <div id="topbar">
  <p>lagoshomefinder.com</p>
    <ul>
      <li></li>
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
      
     <table border="0" width="100%" height="200" style="text-align:center;">
     <tr>
     <td> <a href="addstep1.php"><img src="../images/fly.JPG" width="111" height="95" /><br/>Add Property</a></td>
	<td><a href="view_agent.php"><img src="../images/agent.JPG" width="114" height="103" /><br/>View all Agent</a></td>
	<td><a href="manage.php"><img src="../images/property.JPG" width="114" height="95" /><br/>Manage Properties</a></td>
	<td><a href="#"></a><a href="manage_agent.php"><img src="../images/blog.JPG" width="82" height="95" /><br/>Manage Agent</a></td>
</tr>
<tr>
	<td><a href="agent_to_default.php"><img src="../images/trash.JPG" width="110" height="117" /><br/>Delete defaulting agent</a></td>
	<td><a href="enquiries.php"><img src="../images/enquiry.JPG" width="107" height="99" /><br/>View Property Enquiries</a></td>
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
<?php
}
else {header("location:admin_login.php?attempt=fail");
}
?>
