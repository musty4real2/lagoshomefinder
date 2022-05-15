<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("connect.php");
include("lhfclass.php");
$object=new lhf();

$type=$_GET['type'];
$min=$_GET['minprice'];
$max=$_GET['maxprice'];
$sr=$_GET['sr'];
$area=$_GET['area'];
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title><?php echo "$type for {$_GET['sr']} in $area between N".number_format($min)." to N". number_format($max);?></title>
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
      <li><a href="index.php">Home</a></li>
      <li><a href="contact.php">Contact US</a></li>
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
  <marquee>
  Advertise with LagosHomeFinder!
  </marquee>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="content">
      
      <h2>.::Search Result::.</h2>
<!----------------------------------------------------------THE SEARCH RESULT CODE!!---------------------------->
<?php 

//IF FORM was submited*************************************************************************************************************




//IF Search is for Rent******************************************orFOR Sale*************************************************
if($_GET['sr']=='Sale'){
	$table='sale';
	$phototable='sale_photo';
	}
if($_GET['sr']=='Rent'){
	$table='rent';
	$phototable='rent_photo';
	}
//IF Search is for Rent******************************************orFOR Sale*************************************************



$query="SELECT * FROM $table WHERE `type`='$type' AND `area` LIKE '%$area%' AND `price` BETWEEN '$min' AND '$max' ";
$execute=$object->query($query, $table);



?>
<?php 
//GET total number or rows returned- number of result under the search    ********************************************************

$total=mysql_num_rows($execute);
echo "<b> $total Result(s) for $area $type for {$_GET['sr']}, From N".number_format($min)." to N".number_format($max)."</b><br/>";

//GET total number or rows returned- number of result under the search  ********************************************************


//display all the result returned*************************************************************************************
if(mysql_num_rows($execute)==0){ echo "<p style='margin:30px 0 30px 0; text-align:center; border:1px solid #CCC;'><img src='images/info.JPG' width='56' height='50' />No Results found</p>";}


while($row=mysql_fetch_array($execute)){

 //*************************GET and display agent information from agent table  using agentID in the table***************************************************
$agentinfo= $object->selectWhere($row['agent_id'], 'agent');
 while($a=mysql_fetch_array($agentinfo)){
?>


<div style="border-top:1px solid #CCC; border-bottom:1px solid #CCC; margin:30px 0 30px 0;">
<table border="0">
<tr>
<td></td>
<td><b> &nbsp;<img src="images/Home.png" width="34" height="34"/>.::<?php

	echo "<a href='view.php?id={$row['id']}&agentid={$row['agent_id']}&table=$table&ptab=$phototable&agent={$a['name']}&sr={$_GET['sr']}&ty=$type&minprice=$min&maxprice=$max'>{$row['title']}</a>"; 
?>
&nbsp;::.</b></td>
</tr>
<tr>
<td>
<?php
//GET the Main image from the image table for this result using the ID********************************************************
 $getimage= $object->getImageWhere($row['id'], $phototable);
//****************************************************************************************************************************

//GET number of pictures available for the result  ********************************************************
 
 $numpictures=$object->numOfpic($row['id'], $phototable);
 //**********************************************************************************************************
 
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

<b>Property Description : </b>
<?php echo substr($row['description'], 0, 70); ?>...<br/>



<?php 

    
    
	
 //*************************Link for user to view photo gallery of the property*********************************************************************
echo "<a href='view.php?id={$row['id']}&table=$table&ptab=$phototable&agent={$a['name']}&sr={$_GET['sr']}&ty=$type&minprice=$min&maxprice=$max' title='Full details in picture slide'><img  src='images/photos.jpg' width='54' height='54' style='border=none;'/>Full Details in $numpictures photos ::.:: View </a><br/>";
 //****************************************************************************************************************************************
?></td>
</tr>
</table>
<?php
$agentinfo= $object->SelectWhere($row['agent_id'], 'agent');
 while($a=mysql_fetch_array($agentinfo)){
	 
	 
 $simid=$a['id'];
 $agent=$a['name'];
 $agentadd=$a['add'];
 $tel=$a['tel'];
 
 echo"  <a  href='contact_agent.php?id={$row['id']}&agentid=$agentid&agent=$agent&table=$table&ptab=$phototable&type={$_GET['type']}&sr={$_GET['sr']}&area=$area' title='Contact Westernedge'><img src='images/email.jpg' width='54' height='37' />Message Westernedge Integrated Consulting Limited about this property</a>";
 

 }}//END of WHILE for agen t info
 
?>

<p>Please contact Westernedge Integrated Consulting Limited  | Address: 255 More Call: +234 - 8023310398 | info@westernedgeconsulting.com | info@lagoshomefinder.com</p>

</div>









  <?php
}
 ?>
 
 <center><b>::.::<?php echo "<a href='other_property.php?table=$table&ptab=$phototable&type=$type'>View all $type property in other part of Lagos</a>";?>::.::</b></center>

 
 

      
      <div id="comments">
	  <b>Property of the Week</b>
	  <?php include("property_of_the_week.php");?> 
      </div>
      
      <h2>&nbsp;</h2>
      <div id="respond"></div>
    </div>
    <div id="column">
      <div class="subnav">
        <h2>New Properties</h2>
	<?php include("latest_sale_property.php");?>
    <br/>
       	<?php include("latest_rent_property.php");?>
      </div>
      
     
      
      <div id="featured">
        <h2>About LagosHomeFinder        </h2><br/>
        <ul id="latestnews">
        <li>
            <p>Lagoshomefinder  was born out of the need for homefinder any where In  the world to have an online access to  available home for letting lease in lagos... </p>
            <p class="readmore"><a href="contact.php">Continue Reading &raquo;</a></p>
          </li>
          <li class="last"><img src="images/Bullhorn.png" class="imgl" width="64" height="64" />
            <p><strong>Contact US : </strong></p>
            <p>255 Muri Okunola Street Victoria Island, Lagos - Nigeria.</p>
            <p>+2348023310398, +2348130938008</p>
            <p>info@westernedgeconsulting.com</p>
          </li>
        </ul>
        <p>&nbsp;</p>
</div>
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
    <p class="fl_right">LagosHomeFinder.com</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
