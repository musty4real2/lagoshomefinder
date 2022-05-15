<?php
 class lhf{
	 
	 public $type;
	 public $sr;
	 public $area;
	 public $mini;
	 public $maxi;
	 public $string;
	 public $bed;
	 public $id;
	 public $phototable;
	 public $agent;
	 public $table;
	 
	 public $width;
	 public $height;
	 public $target;
	 
	 
/******************************sortbyHighest MEthod*********************************************************************/
	 public function sortbyHighest(){
	 }
/******************************sortbyHighest MEthod*********************************************************************/
	 
	 public function allagent(){
		 $all="SELECT * FROM `agent` ORDER BY `name`";
	 $execute=@mysql_query($all) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
	 return $execute;
		 }
	 
	 public function all($table){
		 $this->table=$table;
		 $all="SELECT * FROM {$this->table}";
	 $execute=@mysql_query($all) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
	 return $execute;
		 }
	 
	 
/******************************sortbyLowest MEthod*********************************************************************/
	 public function sortbyLowest(){
	 }
/******************************sortbyLowest MEthod*********************************************************************

/******************************query MEthod*********************************************************************/
	 public function query($string){
	 $this->string=$string;
	 $execute=@mysql_query($this->string) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
	 return $execute;
	 }
/******************************query MEthod*********************************************************************/

/******************************query getImageWhere*********************************************************************/
	public function getImageWhere($entryid, $phototable){
		$this->entryid=$entryid;
		$this->phototable=$phototable;
		$query="SELECT * FROM `{$this->phototable}` WHERE `entry_id`='{$this->entryid}'";
		$exe=@mysql_query($query) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		return $exe;
		}
/******************************END*************************************************************************************/


/******************************query getImageWhere*********************************************************************/
	public function getAgentlogo($id){
		$this->id=$id;
		$query="SELECT `logo` FROM `agent` WHERE `id`='{$this->id}'";
		$exe=@mysql_query($query) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		while($row=mysql_fetch_array($exe)){
		return $row['logo'];
		}
	}
/******************************END*************************************************************************************/

/******************************selectWhere*********************************************************************/
	public function selectWhere($id, $table){
		$this->id=$id;
		$this->table=$table;
		$select="SELECT * FROM `{$this->table}` WHERE `id`='{$this->id}'";
		$exec=@mysql_query($select) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		return $exec;
		}
/***************************************************************************************************/


/******************************selectWhere*********************************************************************/
	public function selectWhereAgentId($id, $table){
		$this->id=$id;
		$this->table=$table;
		$select="SELECT * FROM `{$this->table}` WHERE `agent_id`='{$this->id}'";
		$exec=@mysql_query($select) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		return $exec;
		}
/***************************************************************************************************/




/******************************selectWhere*********************************************************************/
	public function selectItemWithId($id, $table, $field){
		$this->id=$id;
		$this->table=$table;
		$this->field=$field;
		$field=$this->field;
		$select="SELECT `{$field}` FROM `{$this->table}` WHERE `id`='{$id}'";
		$exec=@mysql_query($select) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		while($row=mysql_fetch_array($exec)){
			return $row['{$field}'];
			}
		}
/***************************************************************************************************/




/******************************num of pic*********************************************************************/
	public function numOfpic($id, $table){
		$this->id=$id;
		$this->table=$table;
		$select="SELECT * FROM `{$this->table}` WHERE `entry_id`='{$this->id}'";
		$exec=@mysql_query($select) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		$count=0;
		while($row=mysql_fetch_array($exec)){
			if($row['mainpic1']!=""){  $count +=1;}
			if($row['pic2']!=""){  $count +=1;}
			if($row['pic3']!=""){  $count +=1;}
			if($row['pic4']!=""){ $count +=1;}
			if($row['pic5']!=""){  $count +=1;}
			if($row['pic6']!=""){ $count +=1;}
			if($row['pic7']!=""){  $count +=1;}
			if($row['pic8']!=""){  $count +=1;}
			
			}
			return $count;
		}
/******************************selectWhere*********************************************************************/


/******************************imageResize*********************************************************************/

		
	public function imageResize($width, $height, $target){
		
		//takes the larger size of the width and height and applies the formular accordingly.. this is so this script will work dynamically with any size
		
		if($width>$height){
			$percentage = ($target/$width);
			}else {
				$percentage=($target / $height);
			}
			//gets the new value and applies the percentage, then rounds the values
			$width=round($width*$percentage);
			$height=round($height*$percentage);
			//returns the new sizes in html tag format... this is so you can plug this function inside an image tag and just get the 
			return "width=\"$width\" height=\"$height\"";
		
		}
	/******************************END*********************************************************************/
	
/******************************num of property by agent*********************************************************************/
	public function numOfAgentProp($id, $table){
		$this->id=$id;
		$this->table=$table;
		$query="SELECT COUNT(`agent_id`) AS `num` FROM `{$table}` WHERE `agent_id`='{$this->id}'";
		$exe=@mysql_query($query) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		while($row=mysql_fetch_array($exe)){
		return $row['num'];
		}
	}
	
/***************************************************************************************************/

/******************************Total number of property on sale*********************************************************************/

	public function totalsale(){
		$query="SELECT COUNT(`id`) AS `num` FROM `sale`";
		$exe=@mysql_query($query) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		while($row=mysql_fetch_array($exe)){
		return $row['num']."Properties for sale on Lagoshomefinder.com<br/>";
		}
		}

/***************************************************************************************************/

/******************************Total number of property on Rent*********************************************************************/
	public function totalrent(){
		$query="SELECT COUNT(`id`) AS `num` FROM `rent`";
		$exe=@mysql_query($query) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		while($row=mysql_fetch_array($exe)){
		return $row['num']."Properties for rent on Lagoshomefinder.com<br/>";
		}
		}
/***************************************************************************************************/
public function checkIFupload($id, $table, $field){
		$this->id=$id;
		$this->table=$table;
		$this->field=$field;
		$query="SELECT `{$this->field}`, `mainpic1` FROM `{$this->table}` WHERE `entry_id`='{$this->id}'";
		$exe=@mysql_query($query) or die("SYSTEM ERROR: Server cannot execute query.".mysql_error());
		while($row=mysql_fetch_array($exe)){
		if(($row['$this->field'] !="") and ($row['mainpic1']!="")){ return false; }
		}
	}

}



?>