<?php
include '../classes/api.php';
$userdelobj=new users();
if(isset($_REQUEST['user_id']))
{
	$del_id=$_REQUEST['user_id'];
	//echo $del_id;
	$result=$userdelobj->userdelete($del_id);
	//print_r($result);
   if($result)
   {
   	echo "deleted";
   }
   else
   {
   	echo "error";
   }

}


?>