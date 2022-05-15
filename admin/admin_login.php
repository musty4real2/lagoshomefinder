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
<title>Admin Panel login</title>
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
    <h1><img src="../images/Lock.png" width="64" height="64" />Admin Login</h1>
    <?php if($_GET['attempt']=='fail'){echo "<p style='color:#F00'><img src='../images/info.JPG' width='56' height='50' />You have to be logged in to view page. Please Login</p>";}?>
    <?php if($_GET['logout']==1){echo "<p style='color:#F00'><img src='../images/info.JPG' width='56' height='50' />You have been logged out</p>";}?>


    <?php
	if(isset($_POST['login'])){
		
		$uname=addslashes(htmlspecialchars($_POST['uname']));
		$pass=addslashes(htmlspecialchars($_POST['pword']));
		
		if($uname==""){$error[]="Please enter Username.";}
		if($pass==""){$error[]="Please enter Password.";}
		
		if(!empty($error)){
			foreach($error as $err){
				echo "$err<br/>";
				}
			}
		if($uname=="anthonyleish1;" and $pass=="password54321"){
			$_SESSION['admin']=1;
			header("location:admin_home.php");
			}
		elseif( $uname!="anthonyleish1;" and  $pass!="password54321"){
			echo "<p style='color:#F00'><img src='../images/info.JPG' width='56' height='50' />Invalid Username or Password. Please check and try again</p>";
			}
		
		}
	?>
    <form  id="search" action="<?php echo $_SERVER['PATH_SELF'];?>" method="post">
<table width="200" border="0">
  <tr>
    <td>Username:</td>
    <td><label>
      <input type="text" name="uname" id="uname" size="60" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Passoword:</td>
    <td><input type="password" name="pword" id="pword"  size="60"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="login" id="login" value="LOGIN" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

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
