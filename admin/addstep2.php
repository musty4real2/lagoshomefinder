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
      <li><a href="#">Home</a></li>
      <li><a href="#">Contact US</a></li>
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
  <marquee>Advertise with LagosHomeFinder!</marquee>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="admincontent" style="">

<h1><img src="../images/fly.JPG" width="111" height="95" />Step Two ::.::</h1>

<?php 

if($_GET['ex']==0){
?>
<?php 
if(isset($_POST['save'])){
	
	$agent=htmlspecialchars(addslashes($_POST['agent']));
	$agentemail=htmlspecialchars(addslashes($_POST['agentemail']));
	$agentadd=htmlspecialchars(addslashes($_POST['agentadd']));
	$agenttel=htmlspecialchars(addslashes($_POST['agenttel']));
	
	
		if(empty($agent)){$error[]="<p>Please enter agent name</p>";}
	if(empty($agentemail)){$error[]="<p>Please enter agent email</p>";}
	if(empty($agentadd)){$error[]="<p>Please enter agent address</p>";}
	if(empty($agenttel)){$error[]="<p>Please enter Agent tel</p>";}
	
	if(!empty($error)){?>
		 <div id="errorMsg">
        <h3>Ooops! Missing fields</h3>
         <ol>
		<?php foreach($error as $err){
		
            echo "<li>$err</li>";

		}//foreach?>
		          </ol>
      </div>
<?php }//if !empty

	elseif(empty($error)){

	
	
	
	//EMAIL AGENT THEY HAVE BEEN LISTED ON lagoshomefinder.com******************************************************************************************
	$body="Dear $agent, \n This is to inform you that your company has been listed on site on". date(" h:gA")." Thank you for patronising lagoshomefinder.com
	<p>This Message was sent from lagoshomefinder.com&reg;";

	$body=wordwrap($body, 70);

  $headers .= "Reply-To: The Sender <admin@lagoshomefinder.com>\r\n"; 
  $headers .= "Return-Path: The Sender <admin@lagoshomefinder.com>\r\n"; 
  $headers .= "From: The Sender <admin@lagoshomefinder.com>\r\n";
  $headers .= "Organization: Lagoshomefinder.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  $headers .= "X-Priority: 3\r\n";
  $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
  
  $subject="$name made enquiry on aproprty from Lagoshomefinder.com!!!";
 
	mail("$agentemail", "$subject", "$body", $headers); 

	/************************************send email to client's email box************************************************//////////////////
	
	$insert="INSERT INTO `agent` (`name`, `email`, `add`, `tel`, `datetime`) VALUES('$agent', '$agentemail', '$agentadd', '$agenttel', NOW())";
	$insert=$object->query($insert);
	
	$agid=mysql_insert_id($connection);
	header("location:addstep3.php?id=$agid&agent=$agent");
	
	
}}




?>
<h1><img src="../images/agent.JPG" width="114" height="103" />Enter new Aget</h1>
<form id="search" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" autocomplete="off" method="post">
  <table width="700" border="0">
    <tr>
      <td>Agent:</td>
      <td><label>
        <input type="text" name="agent" size="65" id="textfield" />
      </label></td>
    </tr>
    <tr>
      <td>email:</td>
      <td><input type="text" size="40" name="agentemail" id="textfield2" /></td>
    </tr>
    <tr>
      <td>address:</td>
      <td><input type="text" size="65" name="agentadd" id="textfield3" /></td>
    </tr>
    <tr>
      <td>Telepnone:</td>
      <td><input type="text"size="40" name="agenttel" id="textfield4" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="save" id="button"  onclick="return confirm('ADD this agent?')"value="SAVE" />
      </label></td>
    </tr>
  </table>




</form>
<?php
}
elseif($_GET['ex']==1){


$fetch="SELECT `id`, `name`, `email` , `email`, `add`, MONTHNAME(`datetime`) AS `month`, DAYOFMONTH(`datetime`)AS `day`, YEAR(`datetime`) AS `year`FROM `agent` ORDER BY `name` ASC";
$exe=$object->query($fetch);
if(mysql_num_rows($exe)==0){echo "<p>No agent available</p>";}
?>

<table width="800" border="1" style="text-align:center;">
<?php
while($row=mysql_fetch_array($exe)){
	?>
  <tr>
    <td><b><?php echo $row['name'];?></b></td>
    <td>Date Listed: <?php echo $row['month']. " ". $row['day']. ", " . $row['year'];?> </td>
    <td>Properties on Rent: &nbsp; <?php echo $object->numOfAgentProp($row['id'], 'rent');?></td>
    <td>Properties on Sale:&nbsp;  <?php echo $object->numOfAgentProp($row['id'], 'sale');?></td>
  
    <td><?php echo "<a href='../rent/entry_rent.php?id={$row['id']}&agent={$row['name']}'><img src='../images/addd.JPG' width='54' height='34' />add property for rent</a>";?></td>
    <td><?php echo "<a href='../sale/entry_sale.php?id={$row['id']}&agent={$row['name']}'><img src='../images/addd.JPG' width='54' height='34' />add property for sale</a>";?></td>
  </tr>

	
	
<?php	}?>
</table>
<?php
}
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
