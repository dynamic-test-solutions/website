<?php
class database{
	public $HOST='';
	public $USERNAME='';
	public $PASSWORD='';
	public $DBNAME='';
	public $CON='';
	function __construct(){
		
		$doc=$_SERVER['DOCUMENT_ROOT'];
		
		//echo $doc;
		
		//exit;
		
		include $doc."/lang/en/common/config.php";
		
		$this->HOST=$host;
		$this->USERNAME=$username;
		$this->PASSWORD=$password;
		$this->DBNAME=$dbname;
		$this->CON=mysqli_connect($this->HOST,$this->USERNAME,$this->PASSWORD);
		if(!$this->CON){
			die(mysql_error());
		}
		$selectdb=mysqli_select_db($this->CON,$this->DBNAME);
		if(!$selectdb){
			die(mysqli_error($this->CON));
		}
	}
	function disconnect(){
		mysql_close();
	}

	function insert($tablename,$arguments){
		$i=0;
 while(list($key,$val)=each($arguments)){
	 $set[$i]=$key."='".mysqli_real_escape_string($this->CON,$val)."'";
	 $i++;
 }
//echo $arguments=implode(",",$set);

//exit;
	$arguments=implode(",",$set);
		$query="INSERT INTO $tablename SET $arguments";
		if(!$result=mysqli_query($this->CON,$query)){
			$error=mysqli_error($this->CON);
			$errorno=mysqli_errno($this->CON);
			return $error.$errorno;
		}else{
			return mysqli_insert_id();
		}
	}
	function update($tablename,$arguments,$conditons){
			$i=0;
 while(list($key,$val)=each($arguments)){
	 $set[$i]=$key."='".mysqli_real_escape_string($this->CON,$val)."'";
	 $i++;
 }
		$arguments=implode(",",$set);
		$set='';
		if($conditons){
			$set.=" where ";
			$set.=implode(" and ",$conditons);

		}

		 $query="UPDATE $tablename SET $arguments $set";

		if(!$result=mysqli_query($this->CON,$query)){
			$error=mysqli_error($this->CON);
			$errorno=mysqli_errno($this->CON);
			return $error.$errorno;
		}
	}
	function deleteRow($tablename,$conditons){
		$set='';
		if($conditons){
			$set.=" where ";
			$set.=implode(" and ",$conditons);

		}
		$query="DELETE FROM $tablename $set";
		if(!$result=mysqli_query($this->CON,$query)){
			$error=mysqli_error($this->CON);
			$errorno=mysqli_errno($this->CON);
			return $error.$errorno;
		}else{
			return true;
		}
	}
	function findAll($tablename,$conditons=null){
		$set='';
		if($conditons){
			$set.=" where ";
			$set.=implode(" and ",$conditons);

		}

		$query="select * from $tablename $set";
		if(!$result=mysqli_query($this->CON,$query)){
			$error=mysqli_error($this->CON);
			$errorno=mysqli_errno($this->CON);
			return $error.$errorno;
		}
		else{
			$i=0;
			while($row=mysqli_fetch_assoc($result))
			{
				$rows[$i]=$row;
				$i++;
			}
			return $rows;
		}
	}
	function findOne($tablename,$conditons){
		$set='';
		if($conditons){
			$set.=" where ";
			$set.=implode(" and ",$conditons);

		}
		$query="select * from $tablename $set";
		//echo "Qry=".$query;
		if(!$result=mysqli_query($this->CON,$query)){
			$error=mysql_error();
			$errorno=mysql_errno();
			return $error.$errorno;
		}else{
			return mysqli_fetch_assoc($result);
		}
	}
	function find($query){
		if(!$result=mysqli_query($this->CON,$query)){
			$error=mysqli_error($this->CON);
			$errorno=mysqli_errno($this->CON);
			return $error.$errorno;
		}
		else{
			$i=0;
			while($row=mysqli_fetch_assoc($result))
			{
				$rows[$i]=$row;
				$i++;
			}
			return $rows;
		}
	}
	
	################ pagination function #########################################
function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<div class="bottom-list clearfix"><ul class="paginations">';
        
        $right_links    = $current_page + 1; 
        $previous       = $current_page - 1; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
			$previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-1); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
				$next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul></div>'; 
    }
    return $pagination; //return pagination links
}
	

}
           
?>