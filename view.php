<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("connect.php");
include("lhfclass.php");
$object=new lhf();

$table=$_GET['table'];
$phototable=$_GET['ptab'];
$agentid=$_GET['agent'];
$sr=$_GET['sr'];

//FETCH FROM Sale || Rent Table  ******************************************************************************
$fetch= $object->selectWhere($_GET['id'], $table);
while($row=mysql_fetch_array($fetch)){
$title=$row['title'];
$description=$row['description'];
$summary=$row['summary'];
$price=$row['price'];
$add=$row['add'];
$area=$row['area'];
$type=$row['type'];
$feature1=$row['feature1'] ;
$feature2=$row['feature2'] ;
$feature3=$row['feature3'] ;
$feature4=$row['feature4'] ;
$feature5=$row['feature5'] ;
$agentid=$row['agent_id'];
$min=$_GET['minprice'];
$max=$_GET['maxprice'];
$per=$row['per'];


//FETCH PHOTOS of property photo  table  ******************************************************************************
$getphotos=$object->getImageWhere($row['id'], $phototable);
while($ph=mysql_fetch_array($getphotos)){
	$mainpic1=$ph['mainpic1'];
	$pic2=$ph['pic2'];
	$pic3=$ph['pic3'];
		 if($mainpic1==""){$mainpic1='noimage.gif';}
	 if($pic2==""){$pic2='noimage.gif';}
	 if($pic3==""){$pic3='noimage.gif';}

	}
//****************************** ******************************************************************************
$agentinfo= $object->SelectWhere($row['agent_id'], 'agent');
 while($a=mysql_fetch_array($agentinfo)){
	 
	 
 $agentid=$a['id'];
 $agent=$a['name'];
 $agentadd=$a['add'];
 $tel=$a['tel'];
 }
//***************************************  ******************************************************************************
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<title><?php echo $title;?> ::..:: LagosHomeFinderSearch.com</title>
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
    
    <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
   	<style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	#gallery {
		background-color: #036;
		padding: 10px;
		width: 600px;
	}
	#gallery ul { list-style: none; margin-left:100px; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #FFF;
		border-width: 5px 5px 20px;
	}
	#gallery ul a:hover img {
		border: 5px solid #036;
		border-width: 5px 5px 20px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
	</style></head>
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
  <marquee>
  Advertise with LagosHomeFinder!
  </marquee>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="content">
      
<h1><img src="images/Home.png" width="64" height="64" />.:: <b><?php echo $title;?></b> ::.</h1>
<h2 style="font-family:'Times New Roman', Times, serif;"><b>N<?php echo number_format($price)." $per";?></b></h2>



<div id="gallery">
<p style=" text-align:center; color:#FFF;">Click thumbnail below to view picture of property in slide</p>
    <ul>
        <li>
            <a href="properties/<?php echo $mainpic1;?>" title="<?php echo "$title";?>">
                <img src="properties/<?php echo $mainpic1;?>" width="72" height="72" alt="" />
            </a>
        </li>
        <li>
            <a href="properties/<?php echo $pic2;?>" title="<?php echo "$title";?>">
                <img src="properties/<?php echo $pic2;?>" width="72" height="72" alt="" />
            </a>
        </li>
        <li>
            <a href="properties/<?php echo $pic3;?>" title="<?php echo "$title";?>"
            >
                <img src="properties/<?php echo $pic3;?>" width="72" height="72" alt="" />
            </a>
        </li>
    </ul>
</div>






<p><img src="images/call.JPG" width="67" height="64" />Interested in this property? Call Westernedge Consulting:  +234 - 8023310398</p>

<h2>Location:<?php echo $area;?></h2>


<div><b>Description</b>
<p><?php echo $description;?></p>
</div>


<div><b>Summary</b>
<p><?php echo $summary;?></p>
</div>



<div><b>Feature</b>
<ul>
<li><?php echo $feature1;?></li>
<li><?php echo $feature2;?></li>
<li><?php echo $feature3;?></li>
<li><?php echo $feature4;?></li>
<li><?php echo $feature5;?></li>
</ul>
</div>


<p>For more information on this property call, please contact Westernedge Integrated Consulting Limited on +234 - 80 - 23310398</p>



<div style="border-bottom:1px solid #CCC; padding-bottom:10px;">

<?php echo ".:: <a href='contact_agent.php?id={$_GET['id']}&agent=$agent&table=$table&ptab=$phototable&type=$type&sr=$table'>email Westernedge Integrated Consulting Limited about this property</a><br/>";?>


.:: see <?php
echo " <a href='other_property.php?table=sale&ptab=sale_photo&maxprice=$max&minprice=$min&type=$type&sr=sale'>other $type property on sale in diiferent locations arround Lagos</a><br/>";?>


.:: see <?php
echo "<a href='other_property.php?table=rent&ptab=rent_photo&maxprice=$max&minprice=$min&type=$type&sr=rent'>other $type property on rent in diiferent locations arround Lagos</a>";?>

</div>






      <div id="comments">
      
<img src="images/RSS.png" width="64" height="64" /><b style="position:relative; top:-30px;">Similar Properties : <?php echo " $type Property in $area on {$_GET['sr']}, of equal price";?></b>
<?php
$query="SELECT * FROM $table WHERE `id`!='{$_GET['id']}' AND `type`='$type' AND `area`='$area' AND `price` BETWEEN '$min' AND '$max'";
$execute=$object->query($query, $table);
if(mysql_num_rows($execute)==0){echo "<p> Sorry no Property found..</p>";}


//display all the result returned*************************************************************************************
while($row=mysql_fetch_array($execute)){
	?>
<table border="0">
<tr>
<td>
<?php
//GET the Main image from the image table for this result using the ID********************************************************
 $getimage= $object->getImageWhere($_GET['id'], $_GET['ptab']);
//****************************************************************************************************************************

//GET number of pictures available for the result  ********************************************************
 
 $numpictures=$object->numOfpic($row['id'], $_GET['ptab']);
 //**********************************************************************************************************
 
 //*************************DISPLAY min image thumbnail*********************************************************************************
 while($m=mysql_fetch_array($getimage)){
	 $mainpic1=$m['mainpic1'];
	 	 if($mainpic1==""){$mainpic1='noimage.gif';}

$main=getimagesize("properties/$mainpic1");
?>
<img  src="<?php echo "properties/$mainpic1";?>" class="images" <?php echo $object->imageResize($main[0], $main[1], 100);?> alt="<?php echo $row['title'];?>" />
<?php }
 //**********************************************************************************************************

?>
</td>
<td>

<b>N<?php echo number_format($row['price']); ?></b><br/>
<b>.:: <?php echo "<a href='view.php?id=$agentid&email=$email&agent=$agentname&agentid=$agentid&email=$email&table=$table&ptab=$phototable&maxprice=$max&minprice=$min&type=$type&sr=$sr'>{$row['title']}</a>"; ?> ::.</b><br/>
<b>Property Description</b>
<?php echo substr($row['description'], 0, 70) ?>...<br/>



<?php
 //*************************Link for user to view photo gallery of the property*********************************************************************
echo "<a href='view.php?id=$agentid&email=$email&agent=$agentname&agentid=$agentid&email=$email&table=$table&ptab=$phototable&maxprice=$max&minprice=$min&type=$type&sr=$sr' title='Full details in picture slide'>Full Details in $numpictures photos</a><br/>";
 //****************************************************************************************************************************************


 //*************************GET and display agent information from agent table  using agentID in the table***************************************************
$agentinfo= $object->SelectWhere($row['agent_id'], 'agent');
 while($a=mysql_fetch_array($agentinfo)){
	 
	 
 $simid=$a['id'];
 $agent=$a['name'];
 $agentadd=$a['add'];
 $tel=$a['tel'];
 
 echo"  <a  href='contact_agent.php?agentid=$agentid&agent=$agent&table=$table&ptab=$phototable&maxprice={$_GET['maxprice']} &minprice={$_GET['minprice']}&ty={$_GET['ty']}&sr={$_GET['sr']}' title='Contact $agent'>Contact Westernedge Integrated Consulting Limited about this property</a> ";


 }//END of WHILE for agen t info
?>

 <p>Marketed by Westernedge Integrated Consulting Limited  | Address: 255 More Call: +234 - 8023310398 | info@westernedgeconsulting.com | info@lagoshomefinder.com</p>
</td>
</tr>
</table>



<?php 
}//END of IF fsubmit
?>

 

      

      </div>
      
      <h2></h2>
      <div id="respond">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
      
      
      
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
    <p class="fl_right">LagosHomeFinderSearch.com</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
