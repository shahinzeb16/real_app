<?php

include_once '../autoload/autoload.php';

$countobj=new Cartadd();
$cart=$countobj->countcart();
$cartcount=mysqli_fetch_assoc($cart);
echo implode("",$cartcount);

?>