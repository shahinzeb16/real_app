<?php
include_once '../autoload/autoload.php';
$subcatobj=new Product();
if(isset($_REQUEST['category']))
{
	$category=$_REQUEST['category'];
	$result=$subcatobj->subcatdisplay($category);
	$subcat="";
   while($res=mysqli_fetch_assoc($result))
   {
   	$subcat .= '<option value="'.$res['parent_id'].'">'.$res['name'].'</option>';
   }
   echo $subcat;

}


?>