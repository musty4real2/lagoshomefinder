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
  </marquee></div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="admincontent" style="">


<h1>Property ID : #<?php echo $_GET['propid'];?></h1>

<?php 
if($_POST['submit']){

	
	
	
	
	$summary=htmlspecialchars(addslashes($_POST['summary']));
	$description=htmlspecialchars(addslashes($_POST['description']));
	$add=htmlspecialchars(addslashes($_POST['add']));
	$area=htmlspecialchars(addslashes($_POST['area']));
	
	$feature1=htmlspecialchars(addslashes($_POST['feature1']));
	$feature2=htmlspecialchars(addslashes($_POST['feature2']));
	$feature3=htmlspecialchars(addslashes($_POST['feature3']));
	$feature4=htmlspecialchars(addslashes($_POST['feature4']));
	$feature5=htmlspecialchars(addslashes($_POST['feature5']));
	$type=htmlspecialchars(addslashes($_POST['type']));
	$price=htmlspecialchars(addslashes($_POST['price']));
	$per=htmlspecialchars(addslashes($_POST['per']));
	$title=htmlspecialchars(addslashes($_POST['title']));
	
	$agent=htmlspecialchars(addslashes($_POST['agent']));
		$agid=htmlspecialchars(addslashes($_POST['agentid']));
		$propid=htmlspecialchars(addslashes($_POST['propid']));
	
	//********************************************************************************************************************************
	
	$update="UPDATE `rent` SET  `description`='$description', `summary`='$summary', `price`='$price', `add`='$add', `area`='$area', `feature1`='$feature1', `feature2`='$feature2', `feature3`='$feature3', `feature4`='$feature4', `feature5`='$feature5', `type`='$type', `title`='$title' WHERE `id`='$propid' AND `agent_id`='$agid'";

		$exe=$object->query($update);

	

	header("location:manage_rent.php?id=$entryid&table=rent_photo&agentid=$agid&agent=$agent");
}	
?>


<?php
$getrecord="SELECT * FROM `rent` WHERE `id`='{$_GET['propid']}'";

$get=@mysql_query($getrecord) or die(mysql_error());
while($row=mysql_fetch_array($get)){
?>
<form id="search" action="<?php echo $_SERVER['../rent/PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="propid" value="<?php echo $_GET['propid'];?>" />
<input type="hidden" name="agentid" value="<?php echo $_GET['agentid'];?>" />
<input type="hidden" name="agent" value="<?php echo $_GET['agent'];?>" />
  <table width="700" border="0">
  <tr>
      <td>Title:</td>
      <td><label>
        <input type="text" name="title" id="title" size="65" value="<?php echo $row['title'];?>" />
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><label>
        <textarea name="description" id="textarea" cols="45" rows="5">value="<?php echo $row['description'];?></textarea>
      </label></td>
      <td>Summary:</td>
      <td><textarea name="summary" id="textarea2" cols="45" rows="5"><?php echo $row['summary'];?></textarea></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="add"  size="65" id="textfield5" value="<?php echo $row['add'];?>"/></td>
      <td>Area:</td>
      <td><input type="text" name="area" id="textfield6" size="60" value="<?php echo $row['area'];?>"/></td>
    </tr>
    <tr>
      <td>Feature 1</td>
      <td><input type="text" name="feature1" size="65" id="textfield7"value="<?php echo $row['feature1'];?>" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Feature 2</td>
      <td><input type="text" name="feature2" size="65" id="textfield8" value="<?php echo $row['feature2'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Feature 3</td>
      <td><input type="text" name="feature3" size="65" id="textfield9" value="<?php echo $row['feature3'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Feature 4</td>
      <td><input type="text" name="feature4" size="65" id="textfield10" value="<?php echo $row['feature4'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Feature 5</td>
      <td><input type="text" name="feature5" size="65" id="textfield11" value="<?php echo $row['feature5'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Type:</td>
      <td><label>
        <select name="type" size="1" id="select">
          <option>type</option>
          <option>................</option>
      <option value="Studio">Studio</option>
      <option value="2 bedroom">2 bedroom</option>
      <option value="3 bedroom">3 bedroom</option>
      <option value="Duplex (4 bed)">Duplex (4 bed)</option>
      <option value="Duplex (5 bed)">Duplex (5 bed)</option>
      <option value="Office Space">Office Space</option>
      <option value="Land">Land</option>
      <option value="other">Other</option>
            <option selected="selected"  value="<?php echo $row['type'];?>"><?php echo $row['type'];?></option>

        </select>
      </label></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Price:</td>
      <td><input type="text" name="price" id="textfield12"  value="<?php echo $row['price'];?>"/></td>
      <td>&nbsp;</td>
      <td><p>
        <label>
          <input type="radio" name="per" value="per Week" id="RadioGroup1_0" />
          per Week</label>
        <br />
        <label>
          <input type="radio" name="per" value="per Month" id="RadioGroup1_1" />
          per Month</label>
        <br />
        <label>
          <input type="radio" name="per" value="per Anum" id="RadioGroup1_2" />
          per Anum</label>
        <br />
      </p></td>
    </tr>
    
        <tr>
      <td></td>
      <td><input type="submit" name="submit"  value="edit"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

  </table>
</form>

<?php } ?>


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
