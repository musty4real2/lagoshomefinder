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
 <SCRIPT LANGUAGE="JavaScript" src="../js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="../js/script.js"></SCRIPT>
<script type="text/javascript" src="tinybox.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

</head>
	<body id="top" oncload="TINY.box.show({html:'Prceed to enter Property Info',animate:false,close:false,mask:true,boxid:'success',autohide:2,top:-14,left:-17})">
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
  <marquee>Your best homeFinder!</marquee>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="admincontent" style="">

<h1><img src="../images/fly.JPG" width="111" height="95" />Step Four ::.::</h1>
<b><img src="../images/alert.JPG" width="63" height="59" />You are adding this Property to <?php 
echo $_GET['agent'];

?></b>

<?php
if($_POST['submit']){
	
	
	
	
	
	$summary=htmlspecialchars(addslashes($_POST['summary']));
	$description=htmlspecialchars(addslashes($_POST['description']));
	$add=htmlspecialchars(addslashes($_POST['add']));
	$area=htmlspecialchars(addslashes($_POST['area']));
	$id=htmlspecialchars(addslashes($_POST['agentid']));
	$feature1=htmlspecialchars(addslashes($_POST['feature1']));
	$feature2=htmlspecialchars(addslashes($_POST['feature2']));
	$feature3=htmlspecialchars(addslashes($_POST['feature3']));
	$feature4=htmlspecialchars(addslashes($_POST['feature4']));
	$feature5=htmlspecialchars(addslashes($_POST['feature5']));
	
	$type=htmlspecialchars(addslashes($_POST['type']));
	$price=htmlspecialchars(addslashes($_POST['price']));
	$per=htmlspecialchars(addslashes($_POST['per']));
	$title=htmlspecialchars(addslashes($_POST['title']));
	$agid=htmlspecialchars(addslashes($_POST['agentid']));
	
	
	$agentemail=$object->selectItemWithId($agid, 'agent', 'email');

	if(empty($summary)){$error[]="<p>Please enter property summary</p>";}
	if(empty($area)){$error[]="<p>Please enter property area</p>";}
	if(empty($description)){$error[]="<p>Please enter property description</p>";}
	if(empty($add)){$error[]="<p>Please enter property address</p>";}
	if(empty($feature1)){$error[]="<p>Please enter feature </p>";}
	if(empty($feature2)){$error[]="<p>Please enter feature 2</p>";}
	if(empty($feature3)){$error[]="<p>Please enter feature 3</p>";}
	if(empty($feature4)){$error[]="<p>Please enter feature 4</p>";}
	if(empty($feature5)){$error[]="<p>Please enter feature 5</p>";}
	if(empty($type)){$error[]="<p>Please enter type of property</p>";}
	if(empty($price)){$error[]="<p>Please enter property price</p>";}
	if(empty($title)){$error[]="<p>Please enter property title</p>";}
	if(!empty($error)){?>
		 <div id="errorMsg">
        <h3>Ooops! Some Fields are missing</h3>
         <ol>
		<?php foreach($error as $err){
		
            echo "<li>$err</li>";

		}//foreach?>
		          </ol>
      </div>
<?php }//if !empty

	elseif(empty($error)){
		
	

	
	//EMAIL AGENT THEY HAVE BEEN LISTED ON lagoshomefinder.com******************************************************************************************
	$body="Dear $agent, \n This is to inform you that your property has been listed on site on". date(" h:gA")."\n
	Property Deatils:\n
	$title &nbsp;$price\n
	Location: $area\n
	Property Type: $type\n
	Feature: $feature1 | $feature2 | $feature3 | $feature4 |$feature5\n
	Thank you for patronising lagoshomefinder.com
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


	//********************************************************************************************************************************
	
	
	
	
	$insert="INSERT INTO `sale` (`description`, `summary`, `date_added`, `agent_id`, `price`, `add`, `area`, `feature1`, `feature2`, `feature3`, `feature4`, `feature5`, `type`, `title`) VALUES ('$description', '$summary', NOW(), '$agid',  '$price', '$add', '$area', '$feature1', '$feature2', '$feature3', '$feature4', '$feature5', '$type', '$title')";
		$exe=$object->query($insert);

	
	$entryid=mysql_insert_id($connection);
	$pictable="INSERT INTO `sale_photo` (`entry_id`, `agentid`, `mainpic1`, `pic2`, `pic3`) VALUES ('$entryid', '$agid', '', '', '');";
	$exepic=$object->query($pictable);
	
	header("location:addfoto.php?id=$entryid&table=sale_photo");
	}}
?>




<form id="search" action="<?php echo $_SERVER['../admin/wizecho_upload/PHP_SELF'];?>" method="post" enctype="multipart/form-data" autocomplete="off"  name="form">
<input type="hidden" name="agentid" value="<?php echo $_GET['id'];?>" />

  <table width="700" border="0">
  <tr>
      <td>Title:</td>
      <td><label>
        <input name="title" type="text" id="title" size="65"  value="<?php if(isset($_POST['title'])){echo "{$_POST['title']}"; }?>"/>
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><label>
        <textarea name="description" id="textarea" cols="45" rows="5"> <?php if(isset($_POST['description'])){echo "{$_POST['description']}"; }?></textarea>
      </label></td>
      <td>Summary:</td>
      <td><textarea name="summary" id="textarea2" cols="45" rows="5"> <?php if(isset($_POST['summary'])){echo "{$_POST['summary']}"; }?></textarea></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="add" id="textfield5" size="65"  value="<?php if(isset($_POST['add'])){echo "{$_POST['add']}"; }?>"/></td>
      <td>Area:</td>
      <td><input type="text" name="area" id="area" size="60"  value="<?php if(isset($_POST['area'])){echo "{$_POST['area']}"; }?>"/><img src="../images/loading.gif" id="loading"> 
        <div id="ajax_response"></div></td>
    </tr>
    <tr>
      <td>Feature 1</td>
      <td><input type="text" name="feature1" size="65" id="textfield7" value="<?php if(isset($_POST['feature1'])){echo "{$_POST['feature1']}"; }?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Feature 2</td>
      <td><input type="text" name="feature2" size="65" id="textfield8" value="<?php if(isset($_POST['feature2'])){echo "{$_POST['feature2']}"; }?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Feature 3</td>
      <td><input type="text" name="feature3" size="65" id="textfield9" value="<?php if(isset($_POST['feature3'])){echo "{$_POST['feature3']}"; }?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Feature 4</td>
      <td><input type="text" name="feature4" size="65" id="textfield10" value="<?php if(isset($_POST['feature4'])){echo "{$_POST['feature4']}"; }?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Feature 5</td>
      <td><input type="text" name="feature5" size="65" id="textfield11" value="<?php if(isset($_POST['feature5'])){echo "{$_POST['feature5']}"; }?>"/></td>
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
           <?php if(isset($_GET['type'])){echo "<option selected='selected' value='{$_GET['area']}'>{$_GET['area']}</option>"; }?>

        </select>
      </label></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Price:</td>
      <td><input type="text" name="price" id="textfield12" value="<?php if(isset($_POST['price'])){echo "{$_POST['price']}"; }?>"/></td>
      <td>&nbsp;</td>
      <td><p><br />
      </p></td>
    </tr>
            <tr>
      <td></td>
      <td><input type="submit" name="submit" value="submit" /></td>
      <td>&nbsp;</td>
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
