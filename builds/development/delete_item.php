<?php
require('includes/utilities.inc.php');
include('includes/functions.inc.php');
if (empty($_GET['deleteItemId']) || !filter_var($_GET['deleteItemId'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{


// Set the page title and include the header:
$page_title = 'Delete a Word';
include('includes/header.inc.php');
    
    echo "<h4>This page has been accessed in error! </h4>";
    
include('includes/footer.inc.php');  
    
}
else 
{
if ($_GET['itemType']=='word')
{
    $q="delete from words_tab where id='".$_GET['deleteItemId']."'";
    $r=$pdo->query($q);

        if ($r) {
            $url = '/words.php'; // Define the URL.	
            header("Location: $url");
            exit();
        }
}

if ($_GET['itemType']=='media')
{
    $q="delete from media_tab where id='".$_GET['deleteItemId']."'";
    $r=$pdo->query($q);

        if ($r) {
            $url = '/media.php'; // Define the URL.	
            header("Location: $url");
            exit();
        }
}  
    
if ($_GET['itemType']=='link')
{
    $q="delete from links_tab where id='".$_GET['deleteItemId']."'";
    $r=$pdo->query($q);

        if ($r) {
            $url = '/links.php'; // Define the URL.	
            header("Location: $url");
            exit();
        }
}      
    
}
?>
