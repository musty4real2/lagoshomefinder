<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("connect.php");
include("lhfclass.php");
$object=new lhf();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..::lagoshomefinder.com |  search</title>
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

 <SCRIPT LANGUAGE="JavaScript" src="js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="js/script.js"></SCRIPT>
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.roundabout.1.0.js"></script>
<script type="text/javascript" src="js/jquery.roundabout-shapes.1.1.js"></script>
<script type="text/javascript" src="js/jquery.roundabout.setup.js"></script>
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

<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <!-- ####################################################################################################### -->

<div class="wrapper col2">
  <div id="featured_slide">
    <ul class="roundabout-holder">
      <li><img src="propertyadvert/1.jpg" alt="" /></li>
      <li><img src="propertyadvert/2.jpg" alt="" /></li>
      <li><img src="propertyadvert/3.jpg" alt="" /></li>
      <li><img src="propertyadvert/4.jpg" alt="" /></li>
      <li><img src="propertyadvert/5.jpg" alt="" /></li>
            <li><img src="propertyadvert/6.jpg" alt="" /></li>

    </ul>
  </div>
</div>
  <div id="container">
    <div id="searchcontent">
    
<div id="search">
  <h1 style="color:#036; margin-left:300px;">Property Search</h1>

<?php
if(isset($_GET['search'])){
	if(empty($_GET['sr'])){$error[]="<p>Please check the Sale/Rent checkbox</p>";}
	if(empty($_GET['minprice'])){$error[]="<p>Please enter minimum price of property</p>";}
	if(empty($_GET['maxprice'])){$error[]="<p>Please enter maximum price</p>";}
	if(empty($_GET['type'])){$error[]="<p>Please enter property type</p>";}
	if(empty($_GET['area'])){$error[]="<p>Please enter property location</p>";}
	
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
		
		header("location:search_result.php?sr={$_GET['sr']}&area={$_GET['area']}&minprice={$_GET['minprice']}&maxprice={$_GET['maxprice']}&type={$_GET['type']}");
		}//elseif emoty error
	}//if submit

?>


<form  method="get"  action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off" style="font-family:Verdana, Geneva, sans-serif; font-size:10px;">
<legend></legend>
<table width="90%" border="0" style="margin:-17px auto 0 auto;"  cellspacing="0" height="100">


</tr>
  <tr>
    <td valign="middle" align="right">Location:</td>
    <td>
    <label>
      <input value="<?php if(isset($_GET['area'])){echo "{$_GET['area']}"; }?>" style="height:30px; color:#999; font-family:Verdana, Geneva, sans-serif; font-size:16px;" name="area" type="text" id="area" size="70" />
      
   <div id="ajax_response"></div> </label>	    
	 

</td>
<td><img src="images/loading2.gif" id="loading" style="margin:0;"/></td>
    <td width="18%" align="left" valign="bottom"><input  style="height:30px; color:#999; font-family:Verdana, Geneva, sans-serif; font-size:16px;" name="search" type="submit" value="search" id="submit" size="50"/></td>
  </tr>
  <tr>
    <td valign="middle" align="right">Minimum Price:</td>
    <td><label><input  style="height:30px; color:#999; font-family:Verdana, Geneva, sans-serif; font-size:16px;" type="text" value="<?php if(isset($_GET['minprice'])){echo "{$_GET['minprice']}"; }?>" name="minprice" />
          </label>
    Maximum Price:
    <input  style="height:30px; color:#999; font-family:Verdana, Geneva, sans-serif; font-size:16px;" type="text" name="maxprice" value="<?php if(isset($_GET['minprice'])){echo "{$_GET['maxprice']}"; }?>" /></td>
</tr>
<tr>
<td align="right">
     Property type:</td>
    <td><select  style="height:30px; color:#999; font-family:Verdana, Geneva, sans-serif; font-size:16px;" name="type" id="select4">
      <option value="">select</option>
      <option value="">...............</option>
      <option value="Studio">Studio</option>
      <option value="2 bedroom">2 bedroom</option>
      <option value="3 bedroom">3 bedroom</option>
      <option value="Duplex (4 bed)">Duplex (4 bed)</option>
      <option value="Duplex (5 bed)">Duplex (5 bed)</option>
      <option value="Office Space">Office Space</option>
      <option value="Land">Land</option>
      <option value="other">Other</option>
      
     <?php if(isset($_GET['type'])){echo "<option selected='selected' value='{$_GET['type']}'>{$_GET['type']}</option>"; }?>
    </select> 
 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
    <input type="radio" name="sr" value="Rent" id="sr_0" />
    Rent</label>
  <label>
    <input type="radio" name="sr" value="Sale" id="sr_1" />
    Sale</label>
 </td>
  </tr>

</table>
</form>
</div>


      <h2> </div>
    <div id="searchcolumn"></div>
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
