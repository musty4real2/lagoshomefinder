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
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

</head>
<body id="top">
<div class="wrapper col0">
  <div id="topbar">
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
  Advertise with LagoshomeFinder!
  </marquee>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="admincontent" style="">

<h1><img src="../images/fly.JPG" width="111" height="95" />Step One ::.::</h1>
<table width="100%" style="text-align:center;">
<tr>
<td>
<h1><?php echo "<a href='addstep2.php?ex=1'> <img src='../images/user.JPG' width='47' height='50' />Exisiting Agent</a>";?></h1>
</td>
<td>
<h1><?php echo "<a href='addstep2.php?ex=0'><img src='../images/adduser.JPG' width='55' height='55' />New Agent</a>";?></h1>
</td>
</tr>
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
