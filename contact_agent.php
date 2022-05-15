<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("connect.php");
include("lhfclass.php");
$object=new lhf();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Contact  ::..:: Westernedge</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

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
    <div id="logo" >
    <img src="images/logo.gif" style="float:left;" width="116" height="71" />
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
    <div id="content" >
      
<h2>Contact Westernedge Integrated Consulting Limited</h2>
<?php 
if($_GET['contact']=='true'){echo "<p style='color:#9c0;'><img src='images/mark.JPG' width='57' height='47' />Email has been sent sucessfully!</p>";}
?>
<fieldset>

<b>You are emailing Westernedge about the property below: </b> 


<?php 
if(isset($_POST['submit'])){
	$name=htmlspecialchars(addslashes($_POST['name']));
	$message=htmlspecialchars(addslashes($_POST['message']));
	$tel=htmlspecialchars(addslashes($_POST['tel']));
	$datetime=date("F, d Y h:i A");
	$enq=htmlspecialchars(addslashes($_POST['enquiry']));
	
	$agent=$_POST['agent'];
	$propertyid=$_POST['propertyid'];
	$sr=$_POST['sr'];
	$ptab=$_POST['ptab'];
	$agent=$_POST['agent'];
	$type=$_POST['type'];
	$sr=$_POST['sr'];
	$table=$_POST['table'];
	$useremail=htmlspecialchars(addslashes($_POST['email']));
	
	/************************************check for errors with javascript************************************************//////////////////

	if(empty($name)){$error[]="<p>Please enter your name</p>";}
	if(empty($enq)){$error[]="<p>Please enter your enquiry</p>";}
	if(empty($message)){$error[]="<p>Please enter your message</p>";}
	if(empty($tel)){$error[]="<p>Please enter tel number</p>";}
	


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
		
	
	/************************************END************************************************//////////////////
	

	/************************************send email to client's email box************************************************//////////////////
	$body=" An enquiry was made about your property.\n 
	<b>NAME:</b> $name.\n 
	<b>Enquiry Type:</b> $enq. \n 
	<b>Message:</b> $message. \n 
	<b>Tel:</b> $tel. \n
	<b>email:</b> $email. \n
	<b>Date:</b> $date. \n
	<b>Agent:</b> $agent.  \n
	<p>This Message was sent from properties@lagoshomefinder.com&reg;";

	$body=wordwrap($body, 70);

  $headers .= "Reply-To: LagoshomeFinderSearch.com <properties@lagoshomefinder.com>\r\n"; 
  $headers .= "Return-Path: LagoshomeFinderSearch.com <properties@lagoshomefinder.com>\r\n"; 
  $headers .= "From: LagoshomeFinderSearch.com <properties@lagoshomefinder.com>\r\n";
  $headers .= "Organization: Lagoshomefinder.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  $headers .= "X-Priority: 3\r\n";
  $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
  
  $subject="$name made enquiry on property from Lagoshomefinder.com!!!";
 
	mail("acubed2000@yahoo.co.uk", "$subject", "$body", $headers); 
	

	/************************************send email to client's email box************************************************//////////////////



	//insert into dbase
	
	$insert="INSERT INTO `lhf`.`contact` (`agent`, `name`, `message`, `tel`, `email`, `type`, `datetime`, `propertyid`,  `sr` ) VALUES ('$agent', '$name', '$message', '$tel', '$useremail', '$enq', NOW(), '$propertyid','$sr')";
	$query=$object->query($insert);
	
	header("location:contact_agent.php?id=$propertyid&agent=$agent&table=$table&type=$type&sr=$sr&ptab=$ptab&contact=true");
			}//elseif emoty error
}

?>

<form id="search" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="hidden" value="<?php echo $_GET['agent'] ;?>" name="agent"   />
<input type="hidden" value="<?php echo $_GET['id'] ;?>" name="propertyid"   />
<input type="hidden" value="<?php echo $_GET['table'] ;?>" name="table"   />
<input type="hidden" value="<?php echo $_GET['type'] ;?>" name="type"   />
<input type="hidden" value="<?php echo $_GET['agent'] ;?>" name="agent"   />
<input type="hidden" value="<?php echo $_GET['sr'] ;?>" name="sr"   />
<input type="hidden" value="<?php echo $_GET['ptab'] ;?>" name="ptab"   />

  <table width="700" border="0">
    <tr>
      <td>Your name:</td>
      <td><label>
        <input type="text" name="name" id="textfield" size="50" />
      </label></td>
    </tr>
    <tr>
      <td>Type of enquiry:</td>
      <td><p>
        <label>
          <input type="radio" name="enquiry" value="Request Details" id="RadioGroup1_0" />
          Request Details</label>
        <br />
        <label>
          <input type="radio" name="enquiry" value="Arrange Meeting" id="RadioGroup1_1" />
          Arrange Meeting</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>Message</td>
      <td><label>
        <textarea name="message" id="textarea" cols="45" rows="5"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>Telephone</td>
      <td><label>
        <input type="text" name="tel" id="textfield2"  size="40"/>
      </label></td>
    </tr>
    <tr>
      <td>Your email:</td>
      <td><input type="text" name="email" id="textfield3" size="40" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="submit" id="button" value="Send Message" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

</fieldset>
      
<?php

$query="SELECT * FROM `{$_GET['table']}` WHERE `id`='{$_GET['id']}'";
$execute=$object->query($query, $table);



?>
<?php 


while($row=mysql_fetch_array($execute)){

 //*************************GET and display agent information from agent table  using agentID in the table***************************************************
$agentinfo= $object->selectWhere($row['agent_id'], 'agent');
?>


<div style="border-top:1px solid #CCC; border-bottom:1px solid #CCC; margin:30px 0 30px 0;">
<table border="0">
<tr>
<td></td>
<td><b> &nbsp;<img src="images/Home.png" width="34" height="34"/>.::<?php

	echo $row['title']; 
?>
&nbsp;::.</b></td>
</tr>
<tr>
<td>
<?php
//GET the Main image from the image table for this result using the ID********************************************************
 $getimage= $object->getImageWhere($_GET['id'], $_GET['ptab']);
//****************************************************************************************************************************

 
 //*************************DISPLAY min image thumbnail*********************************************************************************
 while($m=mysql_fetch_array($getimage)){
	 $mainpic1=$m['mainpic1'];
	 	 if($mainpic1==""){$mainpic1='noimage.gif';}

$main=getimagesize("properties/$mainpic1");
?>
<img class="images"  src="<?php echo "properties/$mainpic1";?>"  <?php echo $object->imageResize($main[0], $main[1], 200);?> alt="<?php echo $row['title'];?>" />
<?php }
 //**********************************************************************************************************

?>
</td>
<td>
<b>N<?php echo number_format($row['price']); ?></b>
<p>Location:<?php echo $row['area'];?></p>

<p><?php echo  $row['add']; ?></p>
<b>Property Description : </b>
<?php echo substr($row['description'], 0, 70); ?>...<br/>
</td></tr></table>
<?php } ?>

</div>

      
    </div>
    <div id="column">
      <div class="subnav">
        <h2>New Properties</h2>
	<?php include("latest_sale_property.php");?>
    <br/>
       	<?php include("latest_rent_property.php");?>
      </div>
      
     
      
      <div id="featured"></div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="footer">
    <div id="newsletter">
      <h2>Subscribe for our Newsletter</h2>
      <p>Please enter your email to join our mailing list</p>
      <form action="#" method="post">
        <fieldset>
          <legend>News Letter</legend>
          <input type="text" value="Enter Email Here&hellip;"  onfocus="this.value=(this.value=='Enter Email Here&hellip;')? '' : this.value ;" />
          <input type="submit" name="news_go" id="news_go" value="GO" />
        </fieldset>
      </form>
    </div>
    <div class="footbox">
      <h2>Target Market</h2>
      <ul>
        <li>Cooperate homefinders</li>
        <li>Property advertisers</li>
        <li></li>
        <li>Property Owners</li>
        <li class="last">Individual Homefinder</li>
        <li class="last"></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Partners</h2>
      <ul>
        <li><a href="#">Legal Consultants</a></li>
        <li><a href="#">Estate Valuers</a></li>
        <li><a href="#">Mortgage Houses</a></li>
        <li><a href="#">Estate Agents</a></li>
        <li class="last"><a href="#">Facility and Property Consultants </a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Services</h2>
      <ul>
        <li><a href="#">Property Management/Search</a></li>
        <li><a href="#">Relocation Services</a></li>
        <li><a href="#">Move Management</a></li>
        <li><a href="#">Facility Management</a></li>
        <li class="last"><a href="#">Consulting</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">Westernedge Integrated Consult</a></p>
    <p class="fl_right">LagosHomeFinderSearch.com</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
