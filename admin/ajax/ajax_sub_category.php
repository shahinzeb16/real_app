<?php
include '../autoload/autoload.php';
$subcatobj=new Category();
if(isset($_REQUEST['category']))
{
	$category=$_REQUEST['category'];
	//echo $category;
	$result=$subcatobj->subcatdisplay($category);
	//print_r($result);
	$subcat="";
   while($res=mysqli_fetch_assoc($result))
   {
   	$subcat .= '<option value="'.$res['parent_id'].'">'.$res['name'].'</option>';
   }
   echo $subcat;

}


?>