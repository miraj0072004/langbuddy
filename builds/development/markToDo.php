<?php
require('includes/utilities.inc.php');

$id=$_GET['goalId'];
$q="UPDATE to_do_tab SET status=1 where id='".$id."'";
$r=$pdo->query($q);

if ($r)
{
   echo "success"; 
}

?>
