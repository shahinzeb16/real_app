<?php
include_once '../autoload/autoload.php';
$wishobj=new Wishadd();
$wish=$wishobj->countwish();
$wishcount=mysqli_fetch_assoc($wish);
echo implode("",$wishcount);

?>