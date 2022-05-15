<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../connect.php");
include("../lhfclass.php");
$object=new lhf();
$path = "../properties/";



	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name1 = $_FILES['photoimg1']['name'];
			$size1 = $_FILES['photoimg1']['size'];
			
	
	
	
			if(strlen($name1))
				{
					list($txt, $ext) = explode(".", $name1);
					if(in_array($ext,$valid_formats))
					{
					if($size1<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg1']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									$query="UPDATE `rent_photo` SET `mainpic1`='$actual_image_name' WHERE `entry_id`='{$_POST['id']}'";
									$query=$object->query($query);
									header("location:addfoto.php?id={$_POST['id']}&table={$_POST['table']}");
									//echo "<img src='../uploads/".$actual_image_name."'  class='preview'>";
								}
							else
								header("location:addfoto.php?id={$_POST['id']}&table={$_POST['table']}&status=Failed to Upload Image");
						}
						else
						header("location:addfoto.php?id={$_POST['id']}&table={$_POST['table']}&status=Image file size too large:  maximum size 1 MB");					
						}
						else
						header("location:addfoto.php?id={$_POST['id']}&table={$_POST['table']}&status=Invalid file format. Please Upload a jpg, gif or png image");	
				}
				
			else
				header("location:addfoto.php?id={$_POST['id']}&table={$_POST['table']}&status=Please select image to upload!");
			exit;
		}
		
?>