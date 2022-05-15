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
<h1><img src="../images/blog.JPG" alt="" width="82" height="95" />Edit Agent</h1>
<?php 

if(isset($_POST['save'])){
	
	$agent=htmlspecialchars(addslashes($_POST['agent']));
	$agentemail=htmlspecialchars(addslashes($_POST['agentemail']));
	$agentadd=htmlspecialchars(addslashes($_POST['agentadd']));
	$agenttel=htmlspecialchars(addslashes($_POST['agenttel']));
	$agentid=$_POST['agentid'];
	
	///*************************VALIDATE*********************************************

	
	$update="UPDATE `agent` SET  `name`='$agent', `email`='$agentemail', `add`='$agentadd', `tel`='$agenttel' WHERE `id`='$agentid'";
	$update=@mysql_query($update) or die(mysql_error());
	
	echo "<h1>Edited!!!</h1>";
	
	
}





?>

<?php 
$get=$object->selectWhere($_GET['agentid'], 'agent');
while($row=mysql_fetch_array($get)){
?>


<form id="search" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="post">
<input type="hidden" name="agentid" value="<?php echo $_GET['agentid'];?>" />
  <table width="700" border="0">
    <tr>
      <td>Agent:</td>
      <td><label>
        <input type="text" name="agent" size="65" value="<?php echo $row['name'];?>" />
      </label></td>
    </tr>
    <tr>
      <td>email:</td>
      <td><input type="text" size="40" name="agentemail" value="<?php echo $row['email'];?>" /></td>
    </tr>
    <tr>
      <td>address:</td>
      <td><input type="text" size="65" name="agentadd" value="<?php echo $row['add'];?>" /></td>
    </tr>
    <tr>
      <td>Telepnone:</td>
      <td><input type="text"size="40" name="agenttel" value="<?php echo $row['tel'];?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="save" id="button"  onclick="return confirm('Update Agent Info?');" value="SAVE" />
      </label></td>
    </tr>
  </table>




</form>
<?php }   ?>
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
