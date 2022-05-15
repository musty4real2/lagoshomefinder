<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("connect.php");
include("lhfclass.php");
$object=new lhf();
$table=$_GET['table'];
$ptab=$_GET['ptab'];
 $id=$_GET['id'];
 $email=$_GET['email'];
 $ptab=$_GET['ptab'];
 $agentid=$_GET['agentid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>LagosHomeFinderSearch.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<script type="text/javascript">
var xmlhttp= false;

try{
	var xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
	alert("You are using Internet Explorer");
	}
	
	catch(e){
		try{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			} catch(E){
				xmlhttp=false;
		}
		}
		if(!xmlhttp && XMLHttpRequest!='undefined'){
			xmlhttp=new XMLHttpRequest();
			}
			function makerequest(serverpage, objID){
				var obj=document.getElementById(objID);
				xmlhttp.open("GET", serverpage);
				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState==1){
						obj.innerHTML="<img src='images/loading.gif'  width='50' height='50'/>loading...";
						}
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
				obj.innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.send(null);
			}
</script>

</head>
<body id="top" onload="makerequest('Click location to view properties', 'caleb')">

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
      
<b> Other <?php echo $_GET['type'];?> Properties on <?php echo $_GET['table'];?> arround Lagos </b>
<p>Click on the preferred location, for easy property search</p>
      <table border="1" style="border:1px solid #CCC;">
      <tr>
      <td width="28%">


<!------------------------------------------------------------------------------------------------------------------------------------------------------------>


<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
<?php

//***********************************GET AND DISPLAY ALL REAS FIRST!!!!**************************************************************


$locations="SELECT DISTINCT(`name`) AS `area` FROM `area` ORDER BY `area` ASC";
$loc=$object->query($locations);
?>

<ol>
<?php
while($row=mysql_fetch_array($loc)){
$area=strtolower($row['area']);
					  ?>
	 <li><a onclick="makerequest('<?php echo "view_by_loc.php?type={$_GET['type']}&area=$area&table=$table&ptab=$ptab";?>', 'caleb'); return false;" href="<?php echo "view_by_loc.php?type={$_GET['type']}&area={$row['area']}&table=$table";?>"><?php echo $row['area'];?></a></li>
	<?php }


?>
</ol>
</td>
<td width="72%">
<div id="caleb" style="border:1px solid #CCC; padding:5px;"></div>
</td>
</tr>
</table>

      
      
    </div>
    <div id="column">
      <div class="subnav">
        <h2>New Properties</h2>
	<?php include("latest_sale_property.php");?>
    <br/>
       	<?php include("latest_rent_property.php");?>
      </div>
      
     
      
      <div id="featured"> </div>
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
