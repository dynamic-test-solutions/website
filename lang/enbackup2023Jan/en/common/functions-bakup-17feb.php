<?php
function getProducts($id=null, $condtion=null){
$db=new database;
$types_tablename="products";
$products=$db->findAll($types_tablename);
return $products;
	
}
function getProduct($id=null, $condtion=null){
	
$db=new database;
if(!$id){
	return;
}

$filterproduct=array("product_id='".$id."'");
$products=$db->findOne('products',$filterproduct);
$product_images=$db->findAll('product_images',$filterproduct);
$products['images']=$product_images;

return $products;	
	
}
function getGalleries(){
$db=new database;
$gallery=$db->findAll("gallery");
$i=0;
foreach ($gallery as $value) {
	$gallery[$i]['gallery_id']=$value['gallery_id'];
	$gallery[$i]['description']=$value['description'];
	$gallery[$i]['images']=$value['images'];
	$i++;
}

return $products;
	
}
function getGallery($id=null, $condtion=null){
	
$db=new database;
if(!$id){
	return;
}

$filterproduct=array("gallery_id='".$id."'");
$products=$db->findOne('gallery',$filterproduct);
$product_images=$db->findAll('product_images',$filterproduct);
$products['images']=$product_images;

return $products;	
	
}

function getProductTypes($id=null, $condtion=null){
	
$db=new database;

$types_tablename="product_types";
$product_types=$db->findAll($types_tablename);
return $product_types;
}
function getProductType($id=null, $condtion=null){
	
$db=new database;
if(!$id){
	return;
}
		
$product_type="select type_id, type from product_types where type_id=$id";
$pro_type=$db->find($product_type);
return $pro_type;
	
}
function getCategories($id=null, $condtion=null){
	
$db=new database; 
$cagegory_tablename="select category_id, category_name from product_categories where parent ='0'";
$pro_categories=$db->find($cagegory_tablename);
return 	$pro_categories;
}
function getCategory($id=null, $conditons=null){
	
$db=new database;
if(!$id){
	return;
}
		
$cagegory_tablename="select category_id, category_name from product_categories where parent ='0' and category_id=$id";
$pro_categories=$db->find($cagegory_tablename);
return $pro_categories;
}
function getMappedcategory($id=null, $conditons=null){
	
$db=new database;
if(!$id){
	return;
}
$categoryquery="SELECT product_categories.* FROM product_categories inner join category_product_map on  product_categories.category_id=category_product_map.category_id where category_product_map.product_id=$id";
$pro_categories=$db->find($categoryquery);

  foreach($pro_categories as $val){
  	$category_id[]=$val[category_id];
  }  
 $category_id=implode(",", $category_id);
return $category_id;
}
		
function getCatProducts($id=null){
$db=new database;
if(!id){
	return;
}
$types_tablename=" category_product_map";
$condtion= array('category_id='.$id);
$products=$db->findAll($types_tablename,$condtion);
return $products;
}
function getCategoryProducttypes($id=null, $condtion=null){
	$db=new database;
	
if($id){
	$filtercategory=$id?"join products where products.product_type=product_types.type_id and products.category_id='".$id."'":'';
}
	
$cagegory_tablename="select product_types.type_id, product_types.type, product_types.product_type_image from product_types  $filtercategory group by product_types.type_id";

$pro_categories=$db->find($cagegory_tablename);
return 	$pro_categories;
}

function getCategoryProductsizes($id=null, $condtion=null){
	$db=new database;
	
	
	
if($id){
	$filtercategory=$id?"join products where products.product_size=product_size.id and products.product_type='".$id."'":'';
}

	
$cagegory_tablename="select product_size.id, product_size.size from product_size  $filtercategory $filterproducttype group by product_size.id";
$pro_categories=$db->find($cagegory_tablename);
return 	$pro_categories;
}

function getContact($state,$district){
	$db=new database;
	
if($state && $district){
	$filter="where state='".$state."' and district='".$district."'";
	$query="select * from contact $filter";
	$service=$db->find($query);
return 	$service;
}else{
	return;
}
	
}
function getContactus(){
	$db=new database;
	$query="select * from contactus";
	$contactus=$db->find($query);	
	return 	$contactus;	
}
function getProductSizes($id=null, $condtion=null){
	
$db=new database;

$types_tablename="product_size";
$product_sizes=$db->findAll($types_tablename);
return $product_sizes;
}
function getProductSize($id=null, $condtion=null){
	
$db=new database;
if(!$id){
	return;
}
		
$product_size="select id, size from product_size where id=$id";
$pro_size=$db->find($product_size);
return $pro_size;
	
}
function getMainMenu(){
	$db=new database;
	$query="select * from main_menu";
	$data=$db->find($query);	
	return 	$data;	
}
function getMainMenuName($id){
	
	if(id==''){
		return;
	}
	$db=new database;
	$query="select title from main_menu where id=".$id;
	$data=$db->find($query);
		
	return 	$data[0][title];	
}
function getSubmenus(){
	$db=new database;
	$query="select * from submenu";
	$data=$db->find($query);	
	return 	$data;	
}
function getSubMenuName($id){
	
	if(id==''){
		return;
	}
	$db=new database;
	$query="select title from submenu where id=".$id;
	$data=$db->find($query);
		
	return 	$data[0][title];	
}
function getsubMenu($id){
	if(id==''){
		return;
	}
	$db=new database;
	$query="select * from submenu where mainmenu=".$id;
	$data=$db->find($query);	
	return 	$data;	
}
function getInnerPageMenu($id){
	if(id==''){
		return;
	}
	$db=new database;
	$query="select id,page_title from inner_pages where sub_menu=".$id;
	$data=$db->find($query);	
	return 	$data;	
}

function getInnerPage($id){
	$data= "gdsf";
	
	$db=new database;
	$query="select * from inner_pages inner join inner_page_boxes on inner_page_boxes.inner_page_id=inner_pages.id where inner_pages.id=".$id;
	$data=$db->find($query);	
	return 	$data;	
}
function getinnerbox($id){
	if($id==''){
		return;
	}
	$db=new database;
	$query="select * from inner_page_boxes where id=".$id;
	$data=$db->find($query);	
	return 	$data;	
}
function getFileExtension($str)
{
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}
function Read($file)
{
	$kk="";
	$fp=fopen($file,"r");
	while(!feof($fp))
	{ $kk.=fgets($fp,4096); }
	fclose($fp);
	$kk=ereg_replace("[\]","",$kk);
	return $kk;
}
function Write($file,$contents)
{
	$fp=fopen($file,"w+");
	fputs($fp,$contents);
	fclose($fp);
}
function Append($file,$contents)
{
	$fp=fopen($file,"a+");
	fputs($fp,$contents);
	fclose($fp);
}
function gethistories(){

	

$db=new database; 

$cagegory_tablename="select id, start_year, end_year from history";

$pro_categories=$db->find($cagegory_tablename);

return 	$pro_categories;

}

function gethistory($id=null, $conditons=null){

	

$db=new database;

if(!$id){

	return;

}

		

$cagegory_tablename="select id, title, start_year, end_year, content from history where id=$id";

$pro_categories=$db->find($cagegory_tablename);

return $pro_categories;

}


function make_thumb($file_path, $width='', $height='', $prefix='', $target_dir=''){
	global $SITE_FS_PATH;
	if($width=='' && $height==''){
		$width=80;
	}
//	echo "<br>file_path---------/$file_path<br>";
	$ext = strtolower(substr(strrchr($file_path,"."),1));
//	echo "ext------------$ext";
	if($ext=="jpg" || $ext=="jpeg"){
		$src_im = @imagecreatefromjpeg ("$file_path"); /* Attempt to open */
//		echo "<br>sdfsfsad<br>";
//		echo "<br>src_im----$src_im<br>";
	}
	if($ext=="gif"){
		$src_im = @imagecreatefromgif ("$file_path"); /* Attempt to open */
	}
	if($ext=="png"){
		$src_im = @imagecreatefrompng ("$file_path"); /* Attempt to open */
	}
	if($ext=="png"){
		$src_im = @imagecreatefrompng ("$file_path"); /* Attempt to open */
	}
//	echo "<br>src_im----$src_im<br>";
	if($src_im==''){
		return false;
	}
	$main_width =imagesx($src_im);
	$main_height =imagesy($src_im);

//	echo "<br>main_width ----------- $main_width<br>";
//	echo "<br>main_height ----------- $main_height<br>";

	if($width!=''){
		$ratio	= $main_width/$width;
		$height	= $main_height/$ratio;
	}
	if($height!=''){
		$ratio = $main_height/$height;
		$width	= $main_width/$ratio;
	}

	$path_parts = pathinfo($file_path);
	//$path_parts["dirname"];
	//$path_parts["basename"];
	if($target_dir==''){
		$target_dir = $path_parts["dirname"];
	}
	if($prefix==''){
		$prefix = '';
	}
	$width=intval($width);
	$height=intval($height);

//	echo "<br>w ----------- $width<br>";
//	echo "<br>h ----------- $height<br>";
	$thumb_path="$target_dir/".$prefix.$path_parts["basename"];
	$th_path=$prefix.$path_parts["basename"];
//	echo("<br>Thumb-->$thumb_path");
	//echo("convert -sample ".$width."x".$height." -quality 60 \"$SITE_FS_PATH/$file_path\" \"$SITE_FS_PATH/$thumb_path\"");
	$dst_im= imagecreateTrueColor($width, $height);
	imagecopyresized( $dst_im, $src_im, 0, 0, 0, 0, $width, $height, $main_width , $main_height );
	//imagecopyresampled( $dst_im, $src_im, 0, 0, 0, 0, 200, 200, $width , $height );
	imagejpeg ( $dst_im, "$thumb_path" );
	return $th_path;
}
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
